<?php
require('db.php');

$statuses = array('In OT', 'In Observation', 'Move to Bed', 'Move to ICU');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    if ($action === 'add') {
        $pname  = trim($_POST['pname']);
        $mrn    = trim($_POST['mrn']);
        $status = in_array($_POST['status'], $statuses, true) ? $_POST['status'] : 'In OT';
        if ($pname !== '' && $mrn !== '') {
            $stmt = mysqli_prepare($con, "INSERT INTO ot_board_status (pname, mrn, status) VALUES (?, ?, ?)");
            mysqli_stmt_bind_param($stmt, 'sss', $pname, $mrn, $status);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    } elseif ($action === 'update') {
        $id     = (int)$_POST['id'];
        $status = in_array($_POST['status'], $statuses, true) ? $_POST['status'] : 'In OT';

        $cur = mysqli_prepare($con, "SELECT pname, mrn, status FROM ot_board_status WHERE id = ?");
        mysqli_stmt_bind_param($cur, 'i', $id);
        mysqli_stmt_execute($cur);
        $curRes = mysqli_stmt_get_result($cur);
        $curRow = mysqli_fetch_assoc($curRes);
        mysqli_stmt_close($cur);

        if ($curRow && $curRow['status'] !== $status) {
            $log = mysqli_prepare($con, "INSERT INTO ot_board_log (board_id, pname, mrn, old_status, new_status) VALUES (?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($log, 'issss', $id, $curRow['pname'], $curRow['mrn'], $curRow['status'], $status);
            mysqli_stmt_execute($log);
            mysqli_stmt_close($log);

            $stmt = mysqli_prepare($con, "UPDATE ot_board_status SET status = ? WHERE id = ?");
            mysqli_stmt_bind_param($stmt, 'si', $status, $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    } elseif ($action === 'delete') {
        $id = (int)$_POST['id'];
        $stmt = mysqli_prepare($con, "DELETE FROM ot_board_status WHERE id = ?");
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    header('Location: form.php');
    exit;
}

$result = mysqli_query($con, "SELECT id, pname, mrn, status, updated_at FROM ot_board_status ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>OT Board - Manage Patients</title>
<style>
    * { box-sizing: border-box; }
    body { margin: 0; font-family: "Segoe UI", Arial, sans-serif; background: #eef2f6; color: #12263a; }
    .bar { background: #0d3b66; color: #fff; padding: 16px 24px; font-size: 22px; font-weight: 700; }
    .bar a { color: #cfe0f0; font-size: 15px; float: right; text-decoration: none; }
    .wrap { max-width: 1000px; margin: 24px auto; padding: 0 16px; }
    .card { background: #fff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,.08); padding: 20px; margin-bottom: 24px; }
    .card h2 { margin: 0 0 16px; font-size: 18px; }
    .row { display: flex; flex-wrap: wrap; gap: 12px; align-items: flex-end; }
    .field { display: flex; flex-direction: column; gap: 6px; }
    .field label { font-size: 13px; color: #55636f; font-weight: 600; }
    input, select { padding: 10px 12px; font-size: 15px; border: 1px solid #c3cdd6; border-radius: 6px; }
    input[type="text"] { min-width: 220px; }
    button { padding: 10px 18px; font-size: 15px; font-weight: 600; border: none; border-radius: 6px; cursor: pointer; }
    .btn-add { background: #1971c2; color: #fff; }
    .btn-del { background: #b02a37; color: #fff; }
    table { border-collapse: collapse; width: 100%; }
    th, td { padding: 12px 14px; text-align: left; border-bottom: 1px solid #e4eaef; font-size: 15px; }
    th { background: #f4f7fa; font-size: 13px; text-transform: uppercase; letter-spacing: .5px; color: #55636f; }
    .badge { display: inline-block; padding: 4px 12px; border-radius: 999px; font-size: 13px; font-weight: 700; color: #fff; }
    .st-ot { background: #1971c2; }
    .st-obs { background: #e8850c; }
    .st-bed { background: #2f9e44; }
    .st-icu { background: #b02a37; }
    .inline { display: inline; }
    .muted { color: #8090a0; font-size: 13px; }
</style>
</head>
<body>

<div class="bar">OT Board - Manage Patients <a href="board.php" target="_blank">Open Display Board &raquo;</a><a href="log.php" target="_blank" style="margin-right:16px;">Status Log &raquo;</a></div>

<div class="wrap">

    <div class="card">
        <h2>Add Patient</h2>
        <form method="post" action="form.php">
            <input type="hidden" name="action" value="add">
            <div class="row">
                <div class="field">
                    <label>Patient Name</label>
                    <input type="text" name="pname" required>
                </div>
                <div class="field">
                    <label>MRN</label>
                    <input type="text" name="mrn" required>
                </div>
                <div class="field">
                    <label>Status</label>
                    <select name="status">
                        <?php foreach ($statuses as $s): ?>
                        <option value="<?php echo htmlspecialchars($s); ?>"><?php echo htmlspecialchars($s); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="field">
                    <button type="submit" class="btn-add">Add to Board</button>
                </div>
            </div>
        </form>
    </div>

    <div class="card">
        <h2>Current Patients</h2>
        <table>
            <thead>
                <tr><th>#</th><th>Patient Name</th><th>MRN</th><th>Status</th><th>Change Status</th><th>Updated</th><th></th></tr>
            </thead>
            <tbody>
            <?php
            $n = 1;
            $badge = array('In OT' => 'st-ot', 'In Observation' => 'st-obs', 'Move to Bed' => 'st-bed', 'Move to ICU' => 'st-icu');
            if ($result && mysqli_num_rows($result) > 0):
                while ($row = mysqli_fetch_assoc($result)):
                    $cls = isset($badge[$row['status']]) ? $badge[$row['status']] : 'st-ot';
            ?>
                <tr>
                    <td><?php echo $n++; ?></td>
                    <td><?php echo htmlspecialchars($row['pname']); ?></td>
                    <td><?php echo htmlspecialchars($row['mrn']); ?></td>
                    <td><span class="badge <?php echo $cls; ?>"><?php echo htmlspecialchars($row['status']); ?></span></td>
                    <td>
                        <form method="post" action="form.php" class="inline">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="id" value="<?php echo (int)$row['id']; ?>">
                            <select name="status" onchange="this.form.submit()">
                                <?php foreach ($statuses as $s): ?>
                                <option value="<?php echo htmlspecialchars($s); ?>" <?php echo $s === $row['status'] ? 'selected' : ''; ?>><?php echo htmlspecialchars($s); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </form>
                    </td>
                    <td class="muted"><?php echo htmlspecialchars($row['updated_at']); ?></td>
                    <td>
                        <form method="post" action="form.php" class="inline" onsubmit="return confirm('Remove this patient from the board?');">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo (int)$row['id']; ?>">
                            <button type="submit" class="btn-del">Remove</button>
                        </form>
                    </td>
                </tr>
            <?php
                endwhile;
            else:
            ?>
                <tr><td colspan="7" class="muted">No patients on the board yet.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>
<?php mysqli_close($con); ?>
