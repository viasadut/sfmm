<?php
require('db.php');
header('Content-Type: text/html; charset=utf-8');

$lang = (isset($_GET['lang']) && $_GET['lang'] === 'en') ? 'en' : 'bn';

$badge = array('In OT' => 'st-ot', 'In Observation' => 'st-obs', 'Move to Bed' => 'st-bed', 'Move to ICU' => 'st-icu');

$statusText = array(
    'bn' => array('In OT' => 'ওটিতে', 'In Observation' => 'পর্যবেক্ষণে', 'Move to Bed' => 'বেডে স্থানান্তর', 'Move to ICU' => 'আইসিইউতে স্থানান্তর'),
    'en' => array('In OT' => 'In OT', 'In Observation' => 'In Observation', 'Move to Bed' => 'Move to Bed', 'Move to ICU' => 'Move to ICU'),
);

$labels = array(
    'bn' => array('no' => 'ক্রমিক', 'name' => 'রোগীর নাম', 'mrn' => 'এমআরএন', 'status' => 'অবস্থা', 'empty' => 'বোর্ডে কোনো রোগী নেই।'),
    'en' => array('no' => '#', 'name' => 'Patient Name', 'mrn' => 'MRN', 'status' => 'Status', 'empty' => 'No patients on the board.'),
);

$L = $labels[$lang];
$S = $statusText[$lang];

$result = mysqli_query($con, "SELECT pname, mrn, status FROM ot_board_status ORDER BY id DESC");
$rows = array();
if ($result) {
    while ($r = mysqli_fetch_assoc($result)) { $rows[] = $r; }
}
?>
<table class="board">
    <thead>
        <tr>
            <th class="col-no"><?php echo htmlspecialchars($L['no']); ?></th>
            <th class="col-name"><?php echo htmlspecialchars($L['name']); ?></th>
            <th class="col-mrn"><?php echo htmlspecialchars($L['mrn']); ?></th>
            <th class="col-status"><?php echo htmlspecialchars($L['status']); ?></th>
        </tr>
    </thead>
    <tbody>
    <?php if (empty($rows)): ?>
        <tr><td colspan="4" class="empty"><?php echo htmlspecialchars($L['empty']); ?></td></tr>
    <?php else: $n = 1; foreach ($rows as $r):
            $cls = isset($badge[$r['status']]) ? $badge[$r['status']] : 'st-ot';
            $st  = isset($S[$r['status']]) ? $S[$r['status']] : $r['status'];
    ?>
        <tr>
            <td class="col-no"><?php echo $n++; ?></td>
            <td class="col-name"><?php echo htmlspecialchars($r['pname']); ?></td>
            <td class="col-mrn"><?php echo htmlspecialchars($r['mrn']); ?></td>
            <td class="col-status"><span class="badge <?php echo $cls; ?>"><?php echo htmlspecialchars($st); ?></span></td>
        </tr>
    <?php endforeach; endif; ?>
    </tbody>
</table>
<?php mysqli_close($con); ?>
