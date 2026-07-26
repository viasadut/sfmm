<?php
require('db.php');

$badge = array('In OT' => 'st-ot', 'In Observation' => 'st-obs', 'Move to Bed' => 'st-bed', 'Move to ICU' => 'st-icu');
$result = mysqli_query($con, "SELECT pname, mrn, old_status, new_status, changed_at FROM ot_board_log ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>OT Board - Status Log</title>
<style>
    * { box-sizing: border-box; }
    body { margin: 0; font-family: "Segoe UI", Arial, sans-serif; background: #eef2f6; color: #12263a; }
    .bar { background: #0d3b66; color: #fff; padding: 16px 24px; font-size: 22px; font-weight: 700; }
    .bar a { color: #cfe0f0; font-size: 15px; float: right; text-decoration: none; margin-left: 16px; }
    .wrap { max-width: 1000px; margin: 24px auto; padding: 0 16px; }
    .card { background: #fff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,.08); padding: 20px; }
    table { border-collapse: collapse; width: 100%; }
    th, td { padding: 12px 14px; text-align: left; border-bottom: 1px solid #e4eaef; font-size: 15px; }
    th { background: #f4f7fa; font-size: 13px; text-transform: uppercase; letter-spacing: .5px; color: #55636f; }
    .badge { display: inline-block; padding: 4px 12px; border-radius: 999px; font-size: 13px; font-weight: 700; color: #fff; }
    .st-ot { background: #1971c2; }
    .st-obs { background: #e8850c; }
    .st-bed { background: #2f9e44; }
    .st-icu { background: #b02a37; }
    .arrow { color: #8090a0; padding: 0 8px; }
    .muted { color: #8090a0; font-size: 13px; }
</style>
</head>
<body>

<div class="bar">OT Board - Status Log <a href="form.php">&laquo; Manage Patients</a></div>

<div class="wrap">
    <div class="card">
        <table>
            <thead>
                <tr><th>#</th><th>Patient Name</th><th>MRN</th><th>Change</th><th>Time</th></tr>
            </thead>
            <tbody>
            <?php
            $n = 1;
            if ($result && mysqli_num_rows($result) > 0):
                while ($row = mysqli_fetch_assoc($result)):
                    $oc = isset($badge[$row['old_status']]) ? $badge[$row['old_status']] : 'st-ot';
                    $nc = isset($badge[$row['new_status']]) ? $badge[$row['new_status']] : 'st-ot';
            ?>
                <tr>
                    <td><?php echo $n++; ?></td>
                    <td><?php echo htmlspecialchars($row['pname']); ?></td>
                    <td><?php echo htmlspecialchars($row['mrn']); ?></td>
                    <td>
                        <span class="badge <?php echo $oc; ?>"><?php echo htmlspecialchars($row['old_status']); ?></span>
                        <span class="arrow">&rarr;</span>
                        <span class="badge <?php echo $nc; ?>"><?php echo htmlspecialchars($row['new_status']); ?></span>
                    </td>
                    <td class="muted"><?php echo htmlspecialchars($row['changed_at']); ?></td>
                </tr>
            <?php
                endwhile;
            else:
            ?>
                <tr><td colspan="5" class="muted">No status changes logged yet.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
<?php mysqli_close($con); ?>
