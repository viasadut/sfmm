<?php
require('db.php');

$badge = array('In OT' => 'st-ot', 'In Observation' => 'st-obs', 'Move to Bed' => 'st-bed', 'Move to ICU' => 'st-icu');

$result = mysqli_query($con, "SELECT pname, mrn, status FROM ot_board_status ORDER BY id DESC");
$rows = array();
if ($result) {
    while ($r = mysqli_fetch_assoc($result)) { $rows[] = $r; }
}
?>
<table class="board">
    <thead>
        <tr>
            <th class="col-no">#</th>
            <th class="col-name">Patient Name</th>
            <th class="col-mrn">MRN</th>
            <th class="col-status">Status</th>
        </tr>
    </thead>
    <tbody>
    <?php if (empty($rows)): ?>
        <tr><td colspan="4" class="empty">No patients on the board.</td></tr>
    <?php else: $n = 1; foreach ($rows as $r):
            $cls = isset($badge[$r['status']]) ? $badge[$r['status']] : 'st-ot';
    ?>
        <tr>
            <td class="col-no"><?php echo $n++; ?></td>
            <td class="col-name"><?php echo htmlspecialchars($r['pname']); ?></td>
            <td class="col-mrn"><?php echo htmlspecialchars($r['mrn']); ?></td>
            <td class="col-status"><span class="badge <?php echo $cls; ?>"><?php echo htmlspecialchars($r['status']); ?></span></td>
        </tr>
    <?php endforeach; endif; ?>
    </tbody>
</table>
<?php mysqli_close($con); ?>
