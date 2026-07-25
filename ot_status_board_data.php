<?php
$SHIFTED_KEEP_MINUTES = 30;

function mask_name($name) {
    $name = trim((string)$name);
    if ($name === '') { return '&mdash;'; }
    $parts = preg_split('/\s+/', $name);
    $out = array();
    foreach ($parts as $i => $p) {
        $len = mb_strlen($p);
        if ($i === 0) {
            $keep = min(3, $len);
            $out[] = htmlspecialchars(mb_substr($p, 0, $keep)) . str_repeat('*', max(0, $len - $keep));
        } else {
            $out[] = htmlspecialchars(mb_strtoupper(mb_substr($p, 0, 1))) . '.';
        }
    }
    return implode(' ', $out);
}

function derive_stage($row, $keepMinutes) {
    $status   = strtoupper(trim((string)$row['status']));
    $recovery = trim((string)$row['recovery']);
    $room2    = trim((string)$row['room2']);
    $room3    = trim((string)$row['room3']);
    $stime    = trim((string)$row['stime']);

    if ($room2 !== '' && $room3 !== '') {
        $sstime = trim((string)$row['sstime']);
        if ($sstime !== '') {
            $ts = strtotime($sstime);
            if ($ts !== false && (time() - $ts) > $keepMinutes * 60) {
                return null;
            }
        }
        return array('Shifted to Ward', 'st-shifted');
    }

    if ($recovery === '1') {
        return array('In Recovery', 'st-recovery');
    }

    if ($status === 'RECEIVED' || $status === 'DONE') {
        return array('In Surgery', 'st-surgery');
    }

    if ($stime !== '') {
        return array('Scheduled', 'st-scheduled');
    }

    return array('Waiting', 'st-waiting');
}

if (defined('OT_BOARD_TEST')) { return; }

require('db1.php');

$today     = date('Y-m-d');
$viewDate  = $today;
$isPreview = false;
if (isset($_GET['date']) && preg_match('/^\d{4}-\d{2}-\d{2}$/', $_GET['date'])) {
    $viewDate  = $_GET['date'];
    $isPreview = ($viewDate !== $today);
}
$keepMinutes = $isPreview ? (60 * 24 * 3650) : $SHIFTED_KEEP_MINUTES;

$sql = "SELECT pname, dname, duration, stime, etime, status, recovery, room2, room3, sstime
        FROM ot
        WHERE date5 = '$viewDate' AND UPPER(TRIM(status)) <> 'CANCEL'
        ORDER BY stime ASC, id ASC";
$result = mysqli_query($con, $sql);

$rows = array();
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $stage = derive_stage($row, $keepMinutes);
        if ($stage === null) { continue; }
        $rows[] = array('row' => $row, 'stage' => $stage);
    }
}
?>
<?php if ($isPreview): ?>
    <div class="preview-flag">PREVIEW &mdash; showing <?php echo htmlspecialchars($viewDate); ?> (not live)</div>
<?php endif; ?>
<table class="board">
    <thead>
        <tr>
            <th class="col-no">#</th>
            <th class="col-name">Patient</th>
            <th class="col-stage">Status</th>
            <th class="col-surgeon">Surgeon</th>
            <th class="col-ot">OT Room</th>
            <th class="col-time">Scheduled</th>
        </tr>
    </thead>
    <tbody>
    <?php if (empty($rows)): ?>
        <tr>
            <td colspan="6" class="empty">No scheduled surgeries at the moment.</td>
        </tr>
    <?php else: $n = 1; foreach ($rows as $item):
            $row   = $item['row'];
            $stage = $item['stage'];
            $surgeon = trim((string)$row['dname']);
            $otroom  = trim((string)$row['duration']);
            $stime   = trim((string)$row['stime']);
            $etime   = trim((string)$row['etime']);
            $when = $stime === '' ? '&mdash;'
                    : htmlspecialchars($stime) . ($etime !== '' ? ' &ndash; ' . htmlspecialchars($etime) : '');
    ?>
        <tr>
            <td class="col-no"><?php echo $n++; ?></td>
            <td class="col-name"><?php echo mask_name($row['pname']); ?></td>
            <td class="col-stage"><span class="badge <?php echo $stage[1]; ?>"><?php echo htmlspecialchars($stage[0]); ?></span></td>
            <td class="col-surgeon"><?php echo $surgeon === '' ? '&mdash;' : htmlspecialchars($surgeon); ?></td>
            <td class="col-ot"><?php echo $otroom === '' ? '&mdash;' : htmlspecialchars($otroom); ?></td>
            <td class="col-time"><?php echo $when; ?></td>
        </tr>
    <?php endforeach; endif; ?>
    </tbody>
</table>
<?php
mysqli_close($con);
?>
