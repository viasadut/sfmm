<?php
session_start();
require('db1.php'); // must provide $con (mysqli)

require __DIR__ . '/vendor/autoload.php';
use Mpdf\Mpdf;

/* ===== ROLE CHECK ===== */
$role = $_SESSION['sess_userrole'] ?? '';
$queryc = "SELECT COUNT(utype) AS c FROM user WHERE '$role' IN ('mng','ddf','staff')";
$resultc = mysqli_query($con, $queryc) or die(mysqli_error($con));
$rowc    = mysqli_fetch_assoc($resultc);
$c1      = (int)($rowc['c'] ?? 0);

if (!isset($_SESSION['sess_username']) || $c1 === 0) {
  header('Location: login2?err=2');
  exit;
}

/* ===== HELPERS ===== */
function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

function fetchAllAssoc(mysqli $con, string $sql, string $types = '', array $params = []): array {
  $stmt = $con->prepare($sql);
  if (!$stmt) { die("Prepare failed: ".$con->error); }
  if ($types !== '') { $stmt->bind_param($types, ...$params); }
  if (!$stmt->execute()) { die("Execute failed: ".$stmt->error); }
  $res = $stmt->get_result();
  $rows = [];
  while ($r = $res->fetch_assoc()) { $rows[] = $r; }
  $stmt->close();
  return $rows;
}

/* ===== INPUTS ===== */
$today = date('Y-m-d');
$st_in = $_POST['stdate'] ?? $today;
$en_in = $_POST['endate'] ?? $today;

$st = date('Y-m-d', strtotime($st_in));
$en = date('Y-m-d', strtotime($en_in));

/* DATETIME-safe range */
$stDT = $st . " 00:00:00";
$enDT = date('Y-m-d', strtotime($en . ' +1 day')) . " 00:00:00";

/* ===== DOCTORS (include dcode) ===== */
$doctors = fetchAllAssoc($con, "
  SELECT dcode, dname, COALESCE(v1,0) AS v1
  FROM doctor
  WHERE status='Active'
  ORDER BY dname ASC
");

$doctorNames = [];
$doctorByCode = []; // dcode => dname
foreach ($doctors as $d) {
  $doctorNames[] = (string)$d['dname'];
  $doctorByCode[(string)$d['dcode']] = (string)$d['dname'];
}

/* ===== user fullname->uname map (SPD/ecg_test con_by) ===== */
$userUnameByFullname = [];
if (!empty($doctorNames)) {
  $placeholders = implode(',', array_fill(0, count($doctorNames), '?'));
  $types = str_repeat('s', count($doctorNames));
  $rows = fetchAllAssoc(
    $con,
    "SELECT fullname, uname FROM user WHERE fullname IN ($placeholders)",
    $types,
    $doctorNames
  );
  foreach ($rows as $r) {
    $userUnameByFullname[(string)$r['fullname']] = (string)$r['uname'];
  }
}
$fullnameByUname = [];
foreach ($userUnameByFullname as $full => $un) { $fullnameByUname[$un] = $full; }

/* ===== REPORT BASE (keyed by dname) ===== */
$report = [];
foreach ($doctorNames as $dn) {
  $report[$dn] = [
    'doctor' => $dn,
    'opd_income' => 0.0,
    'ipd_income' => 0.0,
    'ae_income' => 0.0,
    'ot_income' => 0.0,
    'procedure_income' => 0.0,
    'endo_income' => 0.0,
    'cath_income' => 0.0,
    'spd_income' => 0.0,
    'manual_charge' => 0.0,
    'ot_discount' => 0.0,
    'ipd_discount' => 0.0,
    'manual_discount' => 0.0,
  ];
}

/* ===== QUERIES (same logic) ===== */

/* OPD */
$opd = fetchAllAssoc($con, "
  SELECT p.dname,
         COALESCE(SUM(CASE WHEN p.payment > d.v1 THEN (p.payment - 110) ELSE p.payment END),0) AS income
  FROM pappnew p
  JOIN doctor d ON d.dname = p.dname
  WHERE p.status='SEEN'
    AND p.adate1 BETWEEN ? AND ?
    AND d.status='Active'
  GROUP BY p.dname
", "ss", [$st, $en]);

foreach ($opd as $r) {
  $dn = (string)$r['dname'];
  if (isset($report[$dn])) $report[$dn]['opd_income'] = (float)$r['income'];
}

/* IPD + discount */
$ipd = fetchAllAssoc($con, "
  SELECT user AS dname,
         COALESCE(SUM(charge),0) AS income,
         COALESCE(SUM(discount),0) AS discount_sum
  FROM icnote
  WHERE ugroup='Doctor'
    AND dis_date BETWEEN ? AND ?
  GROUP BY user
", "ss", [$st, $en]);

foreach ($ipd as $r) {
  $dn = (string)$r['dname'];
  if (!isset($report[$dn])) continue;
  $report[$dn]['ipd_income'] = (float)$r['income'];
  $report[$dn]['ipd_discount'] = (float)$r['discount_sum'];
}

/* A&E */
$ae = fetchAllAssoc($con, "
  SELECT dname, COALESCE(SUM(visit),0) AS income
  FROM ecnote
  WHERE type='Doctor'
    AND daten BETWEEN ? AND ?
  GROUP BY dname
", "ss", [$st, $en]);

foreach ($ae as $r) {
  $dn = (string)$r['dname'];
  if (isset($report[$dn])) $report[$dn]['ae_income'] = (float)$r['income'];
}

/* OT */
$ot = fetchAllAssoc($con, "
  SELECT infusion AS dname, COALESCE(SUM(room),0) AS income
  FROM otivisitendo
  WHERE dis_date BETWEEN ? AND ?
  GROUP BY infusion
", "ss", [$st, $en]);

foreach ($ot as $r) {
  $dn = (string)$r['dname'];
  if (isset($report[$dn])) $report[$dn]['ot_income'] = (float)$r['income'];
}

/* OT Discount */
$otd = fetchAllAssoc($con, "
  SELECT dname, COALESCE(SUM(discount),0) AS discount_sum
  FROM doc_dis
  WHERE edate BETWEEN ? AND ?
  GROUP BY dname
", "ss", [$st, $en]);

foreach ($otd as $r) {
  $dn = (string)$r['dname'];
  if (isset($report[$dn])) $report[$dn]['ot_discount'] = (float)$r['discount_sum'];
}

/* Procedure */
$proc = fetchAllAssoc($con, "
  SELECT dname,
         COALESCE(SUM(CASE WHEN type='Inpatient' AND dis_date BETWEEN ? AND ? THEN procharge ELSE 0 END),0) AS in_income,
         COALESCE(SUM(CASE WHEN type='OPD' AND date1 BETWEEN ? AND ? THEN procharge ELSE 0 END),0) AS opd_income
  FROM procedure1
  GROUP BY dname
", "ssss", [$st, $en, $st, $en]);

foreach ($proc as $r) {
  $dn = (string)$r['dname'];
  if (isset($report[$dn])) $report[$dn]['procedure_income'] = (float)$r['in_income'] + (float)$r['opd_income'];
}

/* Endoscopy */
$endo = fetchAllAssoc($con, "
  SELECT infusion AS dname,
         COALESCE(SUM(CASE WHEN ieid='0' AND cdate BETWEEN ? AND ? THEN room ELSE 0 END),0) AS emer_income,
         COALESCE(SUM(CASE WHEN ieid>0 AND dis_date BETWEEN ? AND ? THEN room ELSE 0 END),0) AS ipd_income
  FROM ivisitendo
  GROUP BY infusion
", "ssss", [$st, $en, $st, $en]);

foreach ($endo as $r) {
  $dn = (string)$r['dname'];
  if (isset($report[$dn])) $report[$dn]['endo_income'] = (float)$r['emer_income'] + (float)$r['ipd_income'];
}

/* Cathlab */
$cath = fetchAllAssoc($con, "
  SELECT sname AS dname, COALESCE(SUM(charge),0) AS income
  FROM cath_charge
  WHERE dis_date BETWEEN ? AND ?
    AND c_status!='Cancelled'
  GROUP BY sname
", "ss", [$st, $en]);

foreach ($cath as $r) {
  $dn = (string)$r['dname'];
  if (isset($report[$dn])) $report[$dn]['cath_income'] = (float)$r['income'];
}

/* SPD */
$spd = fetchAllAssoc($con, "
  SELECT con_by,
         COALESCE(SUM(
           CASE
             WHEN ron='ECG' THEN 100
             WHEN ron='ECHO-2D' THEN 1000
             WHEN ron='ECHO-COLOR DOPPLER' THEN 1500
             ELSE 0
           END
         ),0) AS income
  FROM ecg_test
  WHERE datenew BETWEEN ? AND ?
  GROUP BY con_by
", "ss", [$st, $en]);

foreach ($spd as $r) {
  $uname = (string)$r['con_by'];
  $full = $fullnameByUname[$uname] ?? null;
  if ($full && isset($report[$full])) $report[$full]['spd_income'] = (float)$r['income'];
}

/* Manual (ipd_extra_charge) using doc_code -> dcode */
$manual = fetchAllAssoc($con, "
  SELECT d.dcode,
         COALESCE(SUM(CASE WHEN UPPER(TRIM(x.medi1)) IN ('ANAESTHETIST','PROCEDURE','WARD REVIEW','SURGERY') THEN x.pdos ELSE 0 END),0) AS manual_charge,
         COALESCE(SUM(CASE WHEN UPPER(TRIM(x.medi1))='DISCOUNT' THEN x.pdos ELSE 0 END),0) AS manual_discount
  FROM ipd_extra_charge x
  JOIN doctor d
    ON TRIM(CAST(x.doc_code AS CHAR)) = TRIM(CAST(d.dcode AS CHAR))
  WHERE x.date1 >= ? AND x.date1 < ?
    AND (x.delete_status IS NULL OR x.delete_status <> '1')
  GROUP BY d.dcode
", "ss", [$stDT, $enDT]);

foreach ($manual as $r) {
  $dcode = (string)$r['dcode'];
  $dn = $doctorByCode[$dcode] ?? null;
  if (!$dn || !isset($report[$dn])) continue;
  $report[$dn]['manual_charge']   = (float)$r['manual_charge'];
  $report[$dn]['manual_discount'] = (float)$r['manual_discount'];
}

/* ===== TOTALS ===== */
$rowsOut = [];
$grandIncome = 0.0;
$grandDiscount = 0.0;
$grandNet = 0.0;

foreach ($report as $m) {
  $income_total = $m['opd_income'] + $m['ipd_income'] + $m['ae_income'] + $m['ot_income']
                + $m['procedure_income'] + $m['endo_income'] + $m['cath_income']
                + $m['spd_income'] + $m['manual_charge'];

  $discount_total = $m['ot_discount'] + $m['manual_discount'] + $m['ipd_discount'];
  $net = $income_total - $discount_total;

  $m['income_total'] = $income_total;
  $m['discount_total'] = $discount_total;
  $m['net'] = $net;

  $rowsOut[] = $m;

  $grandIncome += $income_total;
  $grandDiscount += $discount_total;
  $grandNet += $net;
}

usort($rowsOut, fn($a,$b) => ($b['net'] <=> $a['net']));

/* ===== HTML for PDF ===== */
$css = "

  body { font-family: dejavusans;
    font-size: 10px;

}
  h2 { margin: 0 0 6px 0; font-size: 14px; }
  .muted { color:#666; margin-bottom:10px; }
  .kpi { display:inline-block; border:1px solid #ddd; padding:6px 8px; margin-right:8px; border-radius:6px; }
  .kpi b { display:block; font-size:12px; margin-top:2px; }
  table { width:100%; border-collapse: collapse; margin-top:10px; }
  th, td { border:1px solid #ddd; padding:4px; }
  th { background:#111827; color:#fff; font-size:10px; }
  td.r { text-align:right; }
  .pos { color:#047857; font-weight:700; }
  .neg { color:#b91c1c; font-weight:700; }
";

$html = '
  <h2>All Consultant Income & Discount Report</h2>
  <div class="muted">Date Range: '.h($st).' to '.h($en).'</div>

  <div class="kpi">Total Income<b>'.number_format($grandIncome,2).'</b></div>
  <div class="kpi">Total Discount<b>'.number_format($grandDiscount,2).'</b></div>
  <div class="kpi">Net<b>'.number_format($grandNet,2).'</b></div>
  <div class="kpi">Consultants<b>'.count($rowsOut).'</b></div>

  <table>
    <thead>
      <tr>
        <th>Consultant</th>
        <th>OPD</th><th>IPD</th><th>A&amp;E</th><th>OT</th><th>Procedure</th>
        <th>Endoscopy</th><th>Cathlab</th><th>SPD</th><th>Manual</th>
        <th>Discount</th><th>Total</th><th>Net</th>
      </tr>
    </thead>
    <tbody>
';

foreach ($rowsOut as $r) {
  $netClass = ($r['net'] < 0) ? 'neg' : 'pos';
  $html .= '
    <tr>
      <td><b>'.h($r['doctor']).'</b></td>
      <td class="r">'.number_format($r['opd_income'],2).'</td>
      <td class="r">'.number_format($r['ipd_income'],2).'</td>
      <td class="r">'.number_format($r['ae_income'],2).'</td>
      <td class="r">'.number_format($r['ot_income'],2).'</td>
      <td class="r">'.number_format($r['procedure_income'],2).'</td>
      <td class="r">'.number_format($r['endo_income'],2).'</td>
      <td class="r">'.number_format($r['cath_income'],2).'</td>
      <td class="r">'.number_format($r['spd_income'],2).'</td>
      <td class="r">'.number_format($r['manual_charge'],2).'</td>
      <td class="r">'.number_format($r['discount_total'],2).'</td>
      <td class="r"><b>'.number_format($r['income_total'],2).'</b></td>
      <td class="r '.$netClass.'">'.number_format($r['net'],2).'</td>
    </tr>
  ';
}

$html .= '</tbody></table>';

/* ===== Generate PDF (A4 landscape) ===== */
$mpdf = new Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4-L',
    'default_font' => 'dejavusans',
  'margin_left' => 6,
  'margin_right' => 6,
  'margin_top' => 10,
  'margin_bottom' => 10,
]);

$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);

$filename = "consultant_report_{$st}_to_{$en}.pdf";
$mpdf->Output($filename, 'D'); // D = download
exit;