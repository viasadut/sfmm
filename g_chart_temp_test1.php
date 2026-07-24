<?php
require('db1.php');

$pmrn = $_REQUEST['pmrn'] ?? '';
$eid  = $_REQUEST['eid'] ?? '';

if ($pmrn === '' || $eid === '') {
    die("Missing pmrn or eid");
}

$pmrnEsc = mysqli_real_escape_string($con, $pmrn);
$eidEsc  = mysqli_real_escape_string($con, $eid);

/* =========================
   PATIENT INFO
========================= */
$pname = '';
$resP = mysqli_query($con, "SELECT pname FROM inpatient WHERE pmrn='$pmrnEsc' AND eid='$eidEsc' LIMIT 1") or die(mysqli_error($con));
if ($rowP = mysqli_fetch_assoc($resP)) {
    $pname = $rowP['pname'] ?? '';
}

/* =========================
   HELPERS
========================= */
function fetchSeries($con, $sql, $timeCol, $valCols) {
    $out = [];
    $q = mysqli_query($con, $sql) or die(mysqli_error($con));
    while ($r = mysqli_fetch_assoc($q)) {
        $t = trim((string)($r[$timeCol] ?? ''));
        if ($t === '') continue;

        if (!isset($out[$t])) $out[$t] = [];
        foreach ($valCols as $col) {
            $out[$t][$col] = ($r[$col] === '' || $r[$col] === null) ? null : (float)$r[$col];
        }
    }
    return $out;
}

/* =========================
   LOAD DATA (recent)
========================= */
$temp  = fetchSeries($con, "SELECT date2, score1 FROM vitalstemp WHERE pmrn='$pmrnEsc' AND eid='$eidEsc' ORDER BY id DESC LIMIT 60", 'date2', ['score1']);

$bp    = fetchSeries($con, "SELECT date2, score1, score2 FROM vitalsbp WHERE pmrn='$pmrnEsc' AND eid='$eidEsc' ORDER BY id DESC LIMIT 60", 'date2', ['score1','score2']);

$pulse = fetchSeries($con, "SELECT date2, score1 FROM vitalspulse WHERE pmrn='$pmrnEsc' AND eid='$eidEsc' ORDER BY id DESC LIMIT 60", 'date2', ['score1']);

$spo2  = fetchSeries($con, "SELECT date2, score1 FROM vitalsspo2 WHERE pmrn='$pmrnEsc' AND eid='$eidEsc' ORDER BY id DESC LIMIT 60", 'date2', ['score1']);

$rr    = fetchSeries($con, "SELECT date2, score1 FROM vitalsrr WHERE pmrn='$pmrnEsc' AND eid='$eidEsc' ORDER BY id DESC LIMIT 60", 'date2', ['score1']);

$pain  = fetchSeries($con, "SELECT date2, score1 FROM vitalspscore WHERE pmrn='$pmrnEsc' AND eid='$eidEsc' ORDER BY id DESC LIMIT 60", 'date2', ['score1']);

/* Diabetic: your time label is rr1 rr2 rr4 and value is rr3 */
$dia = [];
$qDia = mysqli_query($con, "SELECT rr1, rr2, rr4, rr3 FROM indm WHERE pmrn='$pmrnEsc' AND eid='$eidEsc' ORDER BY id DESC LIMIT 100") or die(mysqli_error($con));
while ($r = mysqli_fetch_assoc($qDia)) {
    $t = trim((string)($r['rr1'] ?? '').' '.(string)($r['rr2'] ?? '').' '.(string)($r['rr4'] ?? ''));
    if ($t === '') continue;
    $dia[$t]['rr3'] = ($r['rr3'] === '' || $r['rr3'] === null) ? null : (float)$r['rr3'];
}

/* Fluid daily: date1 grouped */
$flu = [];
$qFlu = mysqli_query($con, "SELECT date1, SUM(qty) AS fin, SUM(qty1) AS fout
                            FROM influid
                            WHERE pmrn='$pmrnEsc' AND eid='$eidEsc'
                            GROUP BY date1
                            ORDER BY date1 DESC
                            LIMIT 120") or die(mysqli_error($con));
while ($r = mysqli_fetch_assoc($qFlu)) {
    $t = trim((string)($r['date1'] ?? ''));
    if ($t === '') continue;
    $flu[$t]['fin']  = ($r['fin']  === '' || $r['fin']  === null) ? null : (float)$r['fin'];
    $flu[$t]['fout'] = ($r['fout'] === '' || $r['fout'] === null) ? null : (float)$r['fout'];
}

/* =========================
   MASTER TIME KEYS
========================= */
$allTimes = [];
foreach ([$temp,$bp,$pulse,$spo2,$rr,$pain,$dia,$flu] as $arr) {
    foreach ($arr as $t => $_) $allTimes[$t] = true;
}
$times = array_keys($allTimes);

/* Sort by strtotime if possible, else string */
usort($times, function($a, $b){
    $ta = strtotime($a);
    $tb = strtotime($b);
    if ($ta !== false && $tb !== false) return $ta <=> $tb;
    return strcmp($a, $b);
});

/* Build merged rows */
$rows = [];
foreach ($times as $t) {
    $rows[] = [
        't'     => $t,
        'sbp'   => $bp[$t]['score1']    ?? null,
        'dbp'   => $bp[$t]['score2']    ?? null,
        'pulse' => $pulse[$t]['score1'] ?? null,
        'temp'  => $temp[$t]['score1']  ?? null,
        'spo2'  => $spo2[$t]['score1']  ?? null,
        'rr'    => $rr[$t]['score1']    ?? null,
        'pain'  => $pain[$t]['score1']  ?? null,
        'dia'   => $dia[$t]['rr3']      ?? null,
        'fin'   => $flu[$t]['fin']      ?? null,
        'fout'  => $flu[$t]['fout']     ?? null,
    ];
}

/* Limit final output if too many points */
$MAX_POINTS = 120;
if (count($rows) > $MAX_POINTS) {
    $rows = array_slice($rows, -$MAX_POINTS);
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>All Vitals Single Graph</title>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', {packages:['corechart']});
        google.charts.setOnLoadCallback(drawAll);

        function drawAll() {
            var data = google.visualization.arrayToDataTable([
                ['Time','SBP','DBP','Pulse','Temp','SpO2','RR','Pain','Diabetic','Fluid In','Fluid Out'],
                <?php
                foreach ($rows as $r) {
                    $t = addslashes((string)$r['t']);

                    $sbp   = ($r['sbp']   === null) ? 'null' : (float)$r['sbp'];
                    $dbp   = ($r['dbp']   === null) ? 'null' : (float)$r['dbp'];
                    $pulse = ($r['pulse'] === null) ? 'null' : (float)$r['pulse'];
                    $tempV = ($r['temp']  === null) ? 'null' : (float)$r['temp'];
                    $spo2V = ($r['spo2']  === null) ? 'null' : (float)$r['spo2'];
                    $rrV   = ($r['rr']    === null) ? 'null' : (float)$r['rr'];
                    $painV = ($r['pain']  === null) ? 'null' : (float)$r['pain'];
                    $diaV  = ($r['dia']   === null) ? 'null' : (float)$r['dia'];
                    $finV  = ($r['fin']   === null) ? 'null' : (float)$r['fin'];
                    $foutV = ($r['fout']  === null) ? 'null' : (float)$r['fout'];

                    echo "['{$t}', {$sbp}, {$dbp}, {$pulse}, {$tempV}, {$spo2V}, {$rrV}, {$painV}, {$diaV}, {$finV}, {$foutV}],\n";
                }
                ?>
            ]);

            var options = {
                title: 'All Vitals (Single Graph)',
                width: 1600,
                height: 650,
                pointSize: 5,
                chartArea: {left:90, right:140, top:60, bottom:110},
                legend: { position: 'bottom' },
                hAxis: {
                    title: 'Time',
                    slantedText: true,
                    slantedTextAngle: 45
                },
                vAxes: {
                    0: { title: 'Vitals (BP/Pulse/Temp/SpO2/RR/Pain)' },
                    1: { title: 'Fluid (ml)' },
                    2: { title: 'Diabetic' }
                },
                series: {
                    0: { targetAxisIndex: 0 }, // SBP
                    1: { targetAxisIndex: 0 }, // DBP
                    2: { targetAxisIndex: 0 }, // Pulse
                    3: { targetAxisIndex: 0 }, // Temp
                    4: { targetAxisIndex: 0 }, // SpO2
                    5: { targetAxisIndex: 0 }, // RR
                    6: { targetAxisIndex: 0 }, // Pain
                    7: { targetAxisIndex: 2 }, // Diabetic
                    8: { targetAxisIndex: 1 }, // Fluid In
                    9: { targetAxisIndex: 1 }  // Fluid Out
                }
            };

            var chart = new google.visualization.ComboChart(document.getElementById('one_chart'));
            chart.draw(data, options);
        }
    </script>
</head>
<body style="font-family:Arial;">
    <div style="text-align:center;font-size:36px;color:red;margin:10px 0;">
        <b>Patient Name- <?php echo htmlspecialchars($pname); ?>
        &nbsp;&nbsp; MRN-<?php echo htmlspecialchars($pmrn); ?></b>
    </div>

    <div id="one_chart" style="width:1600px;height:650px;margin:10px auto;"></div>

    <!-- Debug (optional): show number of rows -->
    <div style="text-align:center;color:#666;margin-top:8px;">
        Points: <?php echo (int)count($rows); ?>
    </div>
</body>
</html>