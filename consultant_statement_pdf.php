<?php
/* =========================================================
   CONSULTANT WISE STATEMENT PDF (mPDF)
   - Takes bt, stdate, endate by POST
   - Runs SAME logic (OPD extra -110, income parts, totals)
   - Outputs a clean PDF (A4 Landscape)
========================================================= */

session_start();
require('db1.php'); // must create $con = mysqli connection

// mPDF autoload (composer)
require __DIR__ . '/vendor/autoload.php';

use Mpdf\Mpdf;

/* =========================
   ROLE CHECK
========================= */
$role = $_SESSION['sess_userrole'] ?? '';
$sqlRole = "SELECT COUNT(utype) AS c FROM user WHERE '$role' IN ('mng','ddf','staff','doctor')";
$resRole = mysqli_query($con, $sqlRole) or die(mysqli_error($con));
$rowRole = mysqli_fetch_assoc($resRole);
$c1 = (int)($rowRole['c'] ?? 0);

if (!isset($_SESSION['sess_username']) || $c1 === 0) {
  header('Location: login2?err=2');
  exit;
}

mysqli_set_charset($con, 'utf8mb4');

/* =========================
   HELPERS
========================= */
function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

function parseDateYmd($txt){
  $txt = trim((string)$txt);
  if ($txt === '') return '';
  $ts = strtotime($txt);
  if ($ts === false) return '';
  return date('Y-m-d', $ts);
}

function one(mysqli $con, string $sql, array $params = [], string $types = ''){
  $stmt = $con->prepare($sql);
  if (!$stmt) die("Prepare failed: ".$con->error);
  if ($params) $stmt->bind_param($types, ...$params);
  if (!$stmt->execute()) die("Execute failed: ".$stmt->error);
  $res = $stmt->get_result();
  $row = $res ? ($res->fetch_assoc() ?: []) : [];
  $stmt->close();
  return $row;
}

function all(mysqli $con, string $sql, array $params = [], string $types = ''){
  $stmt = $con->prepare($sql);
  if (!$stmt) die("Prepare failed: ".$con->error);
  if ($params) $stmt->bind_param($types, ...$params);
  if (!$stmt->execute()) die("Execute failed: ".$stmt->error);
  $res = $stmt->get_result();
  $rows = [];
  while ($res && ($r = $res->fetch_assoc())) $rows[] = $r;
  $stmt->close();
  return $rows;
}

function money($n){
  return number_format((float)$n, 2, '.', '');
}

/* =========================
   INPUTS
========================= */
$bt = trim((string)($_POST['bt'] ?? ''));
$stdate_raw = $_POST['stdate'] ?? '';
$endate_raw = $_POST['endate'] ?? '';

$stdate = parseDateYmd($stdate_raw);
$endate = parseDateYmd($endate_raw);

if ($bt === '' || $stdate === '' || $endate === '' || $stdate > $endate) {
  die("Invalid input. Please go back and select Consultant, Start Date, and End Date correctly.");
}

/* =========================
   LOAD CONSULTANT DATA (SAME LOGIC)
========================= */
$glance_counts = [];
$income_parts  = [];
$doc_charge = 0;
$dd = '';

$rows_opd = $rows_ipd = $rows_ae = $rows_ot = $rows_proc_ipd = $rows_proc_opd = $rows_endo = $rows_cath = $rows_spd = [];

$total_income = 0;
$total_discount = 0;
$net_income = 0;

// user.uname by fullname = consultant
$u = one($con, "SELECT uname FROM user WHERE fullname=? LIMIT 1", [$bt], "s");
$dd = $u['uname'] ?? '';

// doctor charge v1 + dcode
$d = one($con, "SELECT v1,dcode FROM doctor WHERE dname=? LIMIT 1", [$bt], "s");
$doc_charge = (float)($d['v1'] ?? 0);
//$new_doc_code = (string)($d['dcode'] ?? '');
$new_doc_code=trim((string)$d['dcode']);

/* OPD adjusted */
$opd_sum_normal = (float)(one($con,
  "SELECT COALESCE(SUM(payment),0) AS s
   FROM pappnew
   WHERE adate1 BETWEEN ? AND ? AND dname=? AND status='SEEN' AND payment <= ?",
  [$stdate, $endate, $bt, $doc_charge],
  "sssd"
)['s'] ?? 0);

$opd_sum_extra = (float)(one($con,
  "SELECT COALESCE(SUM(payment),0) AS s
   FROM pappnew
   WHERE adate1 BETWEEN ? AND ? AND dname=? AND status='SEEN' AND payment > ?",
  [$stdate, $endate, $bt, $doc_charge],
  "sssd"
)['s'] ?? 0);

$opd_extra_count = (int)(one($con,
  "SELECT COUNT(id) AS c
   FROM pappnew
   WHERE adate1 BETWEEN ? AND ? AND dname=? AND status='SEEN' AND payment > ?",
  [$stdate, $endate, $bt, $doc_charge],
  "sssd"
)['c'] ?? 0);

$income_opd = $opd_sum_normal + ($opd_sum_extra - ($opd_extra_count * 110));

/* Counts */
$glance_counts['OPD'] = (int)(one($con,"SELECT COUNT(pmrn) AS c FROM presnew WHERE date1 BETWEEN ? AND ? AND dname=?",[$stdate,$endate,$bt],"sss")['c'] ?? 0);
$glance_counts['IPD_OPD'] = (int)(one($con,"SELECT COUNT(pmrn) AS c FROM inpatient WHERE anew BETWEEN ? AND ? AND adoc=? AND emerid='0'",[$stdate,$endate,$bt],"sss")['c'] ?? 0);
$glance_counts['IPD_EMER'] = (int)(one($con,"SELECT COUNT(pmrn) AS c FROM inpatient WHERE anew BETWEEN ? AND ? AND adoc=? AND emerid!='0'",[$stdate,$endate,$bt],"sss")['c'] ?? 0);
$glance_counts['A&E'] = (int)(one($con,"SELECT COUNT(pmrn) AS c FROM erefferal WHERE ddate BETWEEN ? AND ? AND infusion=?",[$stdate,$endate,$bt],"sss")['c'] ?? 0);
$glance_counts['OT'] = (int)(one($con,"SELECT COUNT(pmrn) AS c FROM ot WHERE date5 BETWEEN ? AND ? AND status='Received' AND dname=?",[$stdate,$endate,$bt],"sss")['c'] ?? 0);

/* Income pieces */
$income_ipd = (float)(one($con,"SELECT COALESCE(SUM(charge),0) AS s FROM icnote WHERE dis_date BETWEEN ? AND ? AND user=? AND ugroup='Doctor'",[$stdate,$endate,$bt],"sss")['s'] ?? 0);
$income_ae  = (float)(one($con,"SELECT COALESCE(SUM(visit),0) AS s FROM ecnote WHERE daten BETWEEN ? AND ? AND dname=? AND type='Doctor'",[$stdate,$endate,$bt],"sss")['s'] ?? 0);
$income_ot  = (float)(one($con,"SELECT COALESCE(SUM(room),0) AS s FROM otivisitendo WHERE dis_date BETWEEN ? AND ? AND infusion=?",[$stdate,$endate,$bt],"sss")['s'] ?? 0);

$income_proc_ipd = (float)(one($con,"SELECT COALESCE(SUM(procharge),0) AS s FROM procedure1 WHERE dis_date BETWEEN ? AND ? AND dname=? AND type='Inpatient'",[$stdate,$endate,$bt],"sss")['s'] ?? 0);
$income_proc_opd = (float)(one($con,"SELECT COALESCE(SUM(procharge),0) AS s FROM procedure1 WHERE date1 BETWEEN ? AND ? AND dname=? AND ustatus IN ('Updated','Paid') AND type='OPD'",[$stdate,$endate,$bt],"sss")['s'] ?? 0);

$manual_charge = (float)(one($con,
  "SELECT COALESCE(SUM(pdos),0) AS s
   FROM ipd_extra_charge
   WHERE date1 BETWEEN ? AND ?
     AND (delete_status IS NULL OR delete_status <> '1')
     AND medi1 IN ('ANAESTHETIST','PROCEDURE','WARD REVIEW','SURGERY')
     AND doc_code=?",
  [$stdate,$endate,$new_doc_code],
  "sss"
)['s'] ?? 0);

$manual_discount = (float)(one($con,
  "SELECT COALESCE(SUM(pdos),0) AS s
   FROM ipd_extra_charge
   WHERE date1 BETWEEN ? AND ?
     AND (delete_status IS NULL OR delete_status <> '1')
     AND medi1='DISCOUNT'
     AND doc_code=?",
  [$stdate,$endate,$new_doc_code],
  "sss"
)['s'] ?? 0);

$income_endo_ipd = (float)(one($con,"SELECT COALESCE(SUM(room),0) AS s FROM ivisitendo WHERE dis_date BETWEEN ? AND ? AND infusion=? AND ieid>0",[$stdate,$endate,$bt],"sss")['s'] ?? 0);
$income_endo_opd = (float)(one($con,"SELECT COALESCE(SUM(room),0) AS s FROM ivisitendo WHERE cdate BETWEEN ? AND ? AND infusion=? AND ieid='0'",[$stdate,$endate,$bt],"sss")['s'] ?? 0);
$income_endo = $income_endo_ipd + $income_endo_opd;

/* SPD priced by ron */
$spd_ecg = (int)(one($con,"SELECT COUNT(*) AS c FROM ecg_test WHERE datenew BETWEEN ? AND ? AND con_by=? AND ron='ECG'",[$stdate,$endate,$dd],"sss")['c'] ?? 0);
$spd_e2d = (int)(one($con,"SELECT COUNT(*) AS c FROM ecg_test WHERE datenew BETWEEN ? AND ? AND con_by=? AND ron='ECHO-2D'",[$stdate,$endate,$dd],"sss")['c'] ?? 0);
$spd_col = (int)(one($con,"SELECT COUNT(*) AS c FROM ecg_test WHERE datenew BETWEEN ? AND ? AND con_by=? AND ron='ECHO-COLOR DOPPLER'",[$stdate,$endate,$dd],"sss")['c'] ?? 0);
$income_spd = ($spd_ecg*100) + ($spd_e2d*1000) + ($spd_col*1500);

/* Cathlab */
$income_cath = (float)(one($con,"SELECT COALESCE(SUM(charge),0) AS s FROM cath_charge WHERE dis_date BETWEEN ? AND ? AND c_status!='Cancelled' AND sname=?",[$stdate,$endate,$bt],"sss")['s'] ?? 0);

/* Discount doc_dis */
$doc_discount = (float)(one($con,"SELECT COALESCE(SUM(discount),0) AS s FROM doc_dis WHERE edate BETWEEN ? AND ? AND dname=?",[$stdate,$endate,$bt],"sss")['s'] ?? 0);

$income_parts = [
  'OPD' => $income_opd,
  'IPD' => $income_ipd,
  'A&E' => $income_ae,
  'OT'  => $income_ot,
  'Procedure' => ($income_proc_ipd + $income_proc_opd),
  'Manual Charge Entry' => $manual_charge,
  'Endoscopy' => $income_endo,
  'SPD (ECG/ECHO)' => $income_spd,
  'Cathlab' => $income_cath,
];

$total_income = array_sum($income_parts);
$total_discount = $doc_discount + $manual_discount;
$net_income = $total_income - $total_discount;

/* Detail rows (same as page) */
$rows_opd = all($con,"SELECT pname, pmrn, adate1, payment FROM pappnew WHERE adate1 BETWEEN ? AND ? AND dname=? AND status='SEEN' ORDER BY adate1 ASC",[$stdate,$endate,$bt],"sss");
$rows_ipd = all($con,"SELECT pmrn, pname, dis_date, charge FROM icnote WHERE dis_date BETWEEN ? AND ? AND user=? ORDER BY dis_date ASC",[$stdate,$endate,$bt],"sss");
$rows_ae  = all($con,"SELECT pmrn, pname, daten, visit FROM ecnote WHERE daten BETWEEN ? AND ? AND dname=? AND type='Doctor' ORDER BY daten ASC",[$stdate,$endate,$bt],"sss");
$rows_ot  = all($con,"SELECT pmrn, dis_date, charge FROM otreport WHERE dis_date BETWEEN ? AND ? AND sname=? AND c_status='' ORDER BY dis_date ASC",[$stdate,$endate,$bt],"sss");

$rows_proc_ipd = all($con,"SELECT pmrn, pname, date1, procharge FROM procedure1 WHERE dis_date BETWEEN ? AND ? AND dname=? AND type='Inpatient' ORDER BY dis_date ASC",[$stdate,$endate,$bt],"sss");
$rows_proc_opd = all($con,"SELECT pmrn, pname, date1, procharge FROM procedure1 WHERE date1 BETWEEN ? AND ? AND dname=? AND type='OPD' ORDER BY date1 ASC",[$stdate,$endate,$bt],"sss");

$rows_endo = all($con,"
  SELECT pmrn, pname, cdate, dis_date, room, ieid
  FROM ivisitendo
  WHERE ((cdate BETWEEN ? AND ? AND infusion=? AND ieid='0')
      OR (dis_date BETWEEN ? AND ? AND infusion=? AND ieid>0))
  ORDER BY COALESCE(dis_date, cdate) ASC
",[$stdate,$endate,$bt,$stdate,$endate,$bt],"ssssss");

$rows_cath = all($con,"SELECT pmrn, dis_date, charge FROM cath_charge WHERE dis_date BETWEEN ? AND ? AND sname=? AND c_status!='Cancelled' ORDER BY dis_date ASC",[$stdate,$endate,$bt],"sss");
$rows_spd  = all($con,"SELECT pmrn, pname, datenew, ron FROM ecg_test WHERE datenew BETWEEN ? AND ? AND con_by=? ORDER BY datenew ASC",[$stdate,$endate,$dd],"sss");

/* =========================
   BUILD PDF HTML
========================= */
$css = "
  body { font-family: dejavusans; font-size: 9.5px; color:#111827; }
  .title { font-size: 14px; font-weight: 900; margin-bottom: 4px; }
  .muted { color:#6b7280; font-weight: 700; margin-bottom: 10px; }
  .kpiwrap { margin: 8px 0 10px; }
  .kpi { display:inline-block; border:1px solid #e5e7eb; padding:6px 8px; border-radius:8px; margin-right:8px; }
  .kpi .lbl { font-size:10px; color:#6b7280; font-weight:700; }
  .kpi .val { font-size:13px; font-weight:900; margin-top:2px; }
  h3 { font-size: 12px; margin: 12px 0 6px; }
  table { width: 100%; border-collapse: collapse; margin: 6px 0 12px; }
  th, td { border: 1px solid #e5e7eb; padding: 4px; }
  th { background: #111827; color: #fff; font-weight: 800; }
  td.r { text-align:right; }
";

$html = '
  <div class="title">CONSULTANT WISE STATEMENT</div>
  <div class="muted">Consultant: <b>'.h($bt).'</b> | Date: <b>'.h($stdate).'</b> to <b>'.h($endate).'</b></div>

  <div class="kpiwrap">
    <div class="kpi"><div class="lbl">Total Income (BDT)</div><div class="val">'.money($total_income).'</div></div>
    <div class="kpi"><div class="lbl">Total Discount (BDT)</div><div class="val">'.money($total_discount).'</div></div>
    <div class="kpi"><div class="lbl">Net Income (BDT)</div><div class="val">'.money($net_income).'</div></div>
    <div class="kpi"><div class="lbl">Doctor Base Charge</div><div class="val">'.money($doc_charge).'</div></div>
  </div>

  <h3>Income Breakdown (BDT)</h3>
  <table>
    <thead><tr><th>Head</th><th style="width:180px;">Amount</th></tr></thead>
    <tbody>
';

foreach ($income_parts as $k => $v) {
  $html .= '<tr><td>'.h($k).'</td><td class="r">'.money($v).'</td></tr>';
}
$html .= '
    <tr><th>Total Income</th><th class="r">'.money($total_income).'</th></tr>
    <tr><th>Total Discount</th><th class="r">'.money($total_discount).'</th></tr>
    <tr><th>Net Income</th><th class="r">'.money($net_income).'</th></tr>
    </tbody>
  </table>
';

/* Helper to render detail tables */
function renderTable($title, $headers, $rowsHtml) {
  return "<h3>{$title}</h3><table><thead><tr>{$headers}</tr></thead><tbody>{$rowsHtml}</tbody></table>";
}

/* OPD detail */
$rowsHtml = '';
if (!$rows_opd) {
  $rowsHtml = '<tr><td colspan="5" style="text-align:center;color:#6b7280;"><b>No records</b></td></tr>';
} else {
  $i=1;
  foreach ($rows_opd as $r) {
    $payment = (float)$r['payment'];
    $show = ($payment > $doc_charge) ? ($payment - 110) : $payment;
    $rowsHtml .= '<tr>
      <td>'.$i++.'</td>
      <td>'.h($r['pname']).'</td>
      <td>'.h($r['pmrn']).'</td>
      <td>'.h($r['adate1']).'</td>
      <td class="r">'.money($show).'</td>
    </tr>';
  }
}
$html .= renderTable('OPD', '<th style="width:30px;">#</th><th>Patient</th><th>MRN</th><th>Date</th><th style="width:110px;">Amount</th>', $rowsHtml);

/* IPD detail */
$rowsHtml = '';
if (!$rows_ipd) {
  $rowsHtml = '<tr><td colspan="5" style="text-align:center;color:#6b7280;"><b>No records</b></td></tr>';
} else {
  $i=1;
  foreach ($rows_ipd as $r) {
    $rowsHtml .= '<tr>
      <td>'.$i++.'</td>
      <td>'.h($r['pmrn']).'</td>
      <td>'.h($r['pname']).'</td>
      <td>'.h($r['dis_date']).'</td>
      <td class="r">'.money($r['charge']).'</td>
    </tr>';
  }
}
$html .= renderTable('Inpatient', '<th style="width:30px;">#</th><th>MRN</th><th>Patient</th><th>Date</th><th style="width:110px;">Charge</th>', $rowsHtml);

/* A&E */
$rowsHtml = '';
if (!$rows_ae) {
  $rowsHtml = '<tr><td colspan="5" style="text-align:center;color:#6b7280;"><b>No records</b></td></tr>';
} else {
  $i=1;
  foreach ($rows_ae as $r) {
    $rowsHtml .= '<tr>
      <td>'.$i++.'</td>
      <td>'.h($r['pmrn']).'</td>
      <td>'.h($r['pname']).'</td>
      <td>'.h($r['daten']).'</td>
      <td class="r">'.money($r['visit']).'</td>
    </tr>';
  }
}
$html .= renderTable('A&E', '<th style="width:30px;">#</th><th>MRN</th><th>Patient</th><th>Date</th><th style="width:110px;">Visit</th>', $rowsHtml);

/* OT */
$rowsHtml = '';
if (!$rows_ot) {
  $rowsHtml = '<tr><td colspan="4" style="text-align:center;color:#6b7280;"><b>No records</b></td></tr>';
} else {
  $i=1;
  foreach ($rows_ot as $r) {
    $rowsHtml .= '<tr>
      <td>'.$i++.'</td>
      <td>'.h($r['pmrn']).'</td>
      <td>'.h($r['dis_date']).'</td>
      <td class="r">'.money($r['charge']).'</td>
    </tr>';
  }
}
$html .= renderTable('OT', '<th style="width:30px;">#</th><th>MRN</th><th>Date</th><th style="width:110px;">Charge</th>', $rowsHtml);

/* Procedure IPD */
$rowsHtml = '';
if (!$rows_proc_ipd) {
  $rowsHtml = '<tr><td colspan="5" style="text-align:center;color:#6b7280;"><b>No records</b></td></tr>';
} else {
  $i=1;
  foreach ($rows_proc_ipd as $r) {
    $rowsHtml .= '<tr>
      <td>'.$i++.'</td>
      <td>'.h($r['pmrn']).'</td>
      <td>'.h($r['pname']).'</td>
      <td>'.h($r['date1']).'</td>
      <td class="r">'.money($r['procharge']).'</td>
    </tr>';
  }
}
$html .= renderTable('Procedure (Inpatient)', '<th style="width:30px;">#</th><th>MRN</th><th>Patient</th><th>Date</th><th style="width:110px;">Charge</th>', $rowsHtml);

/* Procedure OPD */
$rowsHtml = '';
if (!$rows_proc_opd) {
  $rowsHtml = '<tr><td colspan="5" style="text-align:center;color:#6b7280;"><b>No records</b></td></tr>';
} else {
  $i=1;
  foreach ($rows_proc_opd as $r) {
    $rowsHtml .= '<tr>
      <td>'.$i++.'</td>
      <td>'.h($r['pmrn']).'</td>
      <td>'.h($r['pname']).'</td>
      <td>'.h($r['date1']).'</td>
      <td class="r">'.money($r['procharge']).'</td>
    </tr>';
  }
}
$html .= renderTable('Procedure (OPD)', '<th style="width:30px;">#</th><th>MRN</th><th>Patient</th><th>Date</th><th style="width:110px;">Charge</th>', $rowsHtml);

/* Endoscopy */
$rowsHtml = '';
if (!$rows_endo) {
  $rowsHtml = '<tr><td colspan="6" style="text-align:center;color:#6b7280;"><b>No records</b></td></tr>';
} else {
  $i=1;
  foreach ($rows_endo as $r) {
    $isIpd = ((int)$r['ieid'] > 0);
    $showDate = $isIpd ? $r['dis_date'] : $r['cdate'];
    $rowsHtml .= '<tr>
      <td>'.$i++.'</td>
      <td>'.h($r['pmrn']).'</td>
      <td>'.h($r['pname']).'</td>
      <td>'.h($showDate).'</td>
      <td>'.($isIpd ? 'IPD' : 'OPD').'</td>
      <td class="r">'.money($r['room']).'</td>
    </tr>';
  }
}
$html .= renderTable('Endoscopy', '<th style="width:30px;">#</th><th>MRN</th><th>Patient</th><th>Date</th><th style="width:60px;">Type</th><th style="width:110px;">Room</th>', $rowsHtml);

/* Cathlab */
$rowsHtml = '';
if (!$rows_cath) {
  $rowsHtml = '<tr><td colspan="4" style="text-align:center;color:#6b7280;"><b>No records</b></td></tr>';
} else {
  $i=1;
  foreach ($rows_cath as $r) {
    $rowsHtml .= '<tr>
      <td>'.$i++.'</td>
      <td>'.h($r['pmrn']).'</td>
      <td>'.h($r['dis_date']).'</td>
      <td class="r">'.money($r['charge']).'</td>
    </tr>';
  }
}
$html .= renderTable('Cathlab Procedure Charge', '<th style="width:30px;">#</th><th>MRN</th><th>Date</th><th style="width:110px;">Charge</th>', $rowsHtml);

/* SPD */
$rowsHtml = '';
if (!$rows_spd) {
  $rowsHtml = '<tr><td colspan="6" style="text-align:center;color:#6b7280;"><b>No records</b></td></tr>';
} else {
  $i=1;
  foreach ($rows_spd as $r) {
    $ron = (string)$r['ron'];
    $charge = 0;
    if ($ron === 'ECG') $charge = 100;
    elseif ($ron === 'ECHO-2D') $charge = 1000;
    elseif ($ron === 'ECHO-COLOR DOPPLER') $charge = 1500;

    $rowsHtml .= '<tr>
      <td>'.$i++.'</td>
      <td>'.h($r['pmrn']).'</td>
      <td>'.h($r['pname']).'</td>
      <td>'.h($r['datenew']).'</td>
      <td>'.h($ron).'</td>
      <td class="r">'.money($charge).'</td>
    </tr>';
  }
}
$html .= renderTable('SPD Procedure Charge', '<th style="width:30px;">#</th><th>MRN</th><th>Patient</th><th>Date</th><th>RON</th><th style="width:110px;">Charge</th>', $rowsHtml);

/* =========================
   GENERATE PDF
========================= */
$mpdf = new Mpdf([
  'mode' => 'utf-8',
  'format' => 'A4-L',
  'margin_left' => 6,
  'margin_right' => 6,
  'margin_top' => 10,
  'margin_bottom' => 10,
  'default_font' => 'dejavusans',
]);

// Auto font switching (helps if any Bangla/Unicode appears)
$mpdf->autoScriptToLang = true;
$mpdf->autoLangToFont = true;

$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);

$fname = "Consultant_Statement_" . preg_replace('/[^A-Za-z0-9_\-]/','_', $bt) . "_{$stdate}_to_{$endate}.pdf";
$mpdf->Output($fname, 'I'); // I = open in browser
exit;