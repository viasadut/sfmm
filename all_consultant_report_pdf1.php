<?php
/* ==============================
   ALL CONSULTANT REPORT PDF (mPDF)
   ============================== */

session_start();
require('db1.php');
require_once __DIR__ . '/vendor/autoload.php';

use Mpdf\Mpdf;
use Mpdf\HTMLParserMode;

/* ===== ROLE CHECK ===== */
$role = $_SESSION['sess_userrole'] ?? '';
$queryc = "SELECT COUNT(utype) AS c FROM user WHERE '$role' IN ('mng','ddf','staff')";
$resultc = mysqli_query($con, $queryc) or die(mysqli_error($con));
$rowc = mysqli_fetch_assoc($resultc);
$c1 = (int)($rowc['c'] ?? 0);

if (!isset($_SESSION['sess_username']) || $c1 === 0) {
    header('Location: login2?err=2');
    exit;
}

/* ===== HELPERS ===== */
function h($s)
{
    return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
}

function fetchAllAssoc(mysqli $con, string $sql, string $types = '', array $params = []): array
{
    $stmt = $con->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $con->error);
    }

    if ($types !== '') {
        $stmt->bind_param($types, ...$params);
    }

    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }

    $res = $stmt->get_result();
    $rows = [];
    while ($r = $res->fetch_assoc()) {
        $rows[] = $r;
    }
    $stmt->close();
    return $rows;
}

/* ===== INPUTS ===== */
$today = date('Y-m-d');
$st_in = $_POST['stdate'] ?? $today;
$en_in = $_POST['endate'] ?? $today;

$st_ts = strtotime($st_in);
$en_ts = strtotime($en_in);

$st = $st_ts ? date('Y-m-d', $st_ts) : $today;
$en = $en_ts ? date('Y-m-d', $en_ts) : $today;

$stDT = $st . " 00:00:00";
$enDT = date('Y-m-d', strtotime($en . ' +1 day')) . " 00:00:00";

/* ===== USER ===== */
$fullname = $_SESSION['sess_username'] ?? '';

$userRow = fetchAllAssoc(
    $con,
    "SELECT fullname FROM user WHERE uname = ? LIMIT 1",
    "s",
    [$fullname]
);

$loggedFullName = $userRow[0]['fullname'] ?? $fullname;

/* ===== GET ACTIVE CONSULTANTS ===== */
$doctors = fetchAllAssoc(
    $con,
    "SELECT dcode, dname, COALESCE(v1,0) AS v1
     FROM doctor
     WHERE status='Active'
     ORDER BY dname ASC"
);

$doctorNames = [];
$doctorByCode = [];

foreach ($doctors as $d) {
    $dname = (string)$d['dname'];
    $dcode = (string)$d['dcode'];

    $doctorNames[] = $dname;

    if ($dcode !== '') {
        $doctorByCode[$dcode] = $dname;
    }
}

/* ===== fullname -> uname map ===== */
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

/* ===== BASE REPORT ===== */
$report = [];
foreach ($doctorNames as $dn) {
    $report[$dn] = [
        'doctor' => $dn,
        'opd_count' => 0,
        'opd_income' => 0.0,
        'ipd_income' => 0.0,
        'ipd_discount' => 0.0,
        'ae_income' => 0.0,
        'ot_income' => 0.0,
        'ot_discount' => 0.0,
        'procedure_income' => 0.0,
        'endo_income' => 0.0,
        'cath_income' => 0.0,
        'spd_income' => 0.0,
        'manual_charge' => 0.0,
        'manual_discount' => 0.0,
    ];
}

/* ===== DATA QUERIES ===== */

/* OPD */
$opd = fetchAllAssoc($con, "
    SELECT
      d2.dname,
      COUNT(*) AS cnt,
      COALESCE(SUM(
        CASE
          WHEN CAST(p.payment AS DECIMAL(18,2)) > IFNULL(d2.v1,0)
            THEN (CAST(p.payment AS DECIMAL(18,2)) - 110)
          ELSE CAST(p.payment AS DECIMAL(18,2))
        END
      ),0) AS income
    FROM pappnew p
    JOIN (
      SELECT
        TRIM(UPPER(dname)) AS nm,
        MAX(dname) AS dname,
        MAX(v1) AS v1
      FROM doctor
      WHERE status='Active'
      GROUP BY TRIM(UPPER(dname))
    ) d2
      ON d2.nm = TRIM(UPPER(p.dname))
    WHERE TRIM(UPPER(p.status))='SEEN'
      AND p.adate1 BETWEEN ? AND ?
    GROUP BY d2.dname
", "ss", [$st, $en]);

foreach ($opd as $r) {
    $dn = (string)$r['dname'];
    if (isset($report[$dn])) {
        $report[$dn]['opd_count'] = (int)$r['cnt'];
        $report[$dn]['opd_income'] = (float)$r['income'];
    }
}

/* IPD */
$ipd = fetchAllAssoc($con, "
    SELECT
      user AS dname,
      COALESCE(SUM(charge),0) AS income,
      COALESCE(SUM(discount),0) AS discount_sum
    FROM icnote
    WHERE ugroup='Doctor'
      AND dis_date BETWEEN ? AND ?
    GROUP BY user
", "ss", [$st, $en]);

foreach ($ipd as $r) {
    $dn = (string)$r['dname'];
    if (isset($report[$dn])) {
        $report[$dn]['ipd_income'] = (float)$r['income'];
        $report[$dn]['ipd_discount'] = (float)$r['discount_sum'];
    }
}

/* A&E */
$ae = fetchAllAssoc($con, "
    SELECT
      dname,
      COALESCE(SUM(visit),0) AS income
    FROM ecnote
    WHERE type='Doctor'
      AND daten BETWEEN ? AND ?
    GROUP BY dname
", "ss", [$st, $en]);

foreach ($ae as $r) {
    $dn = (string)$r['dname'];
    if (isset($report[$dn])) {
        $report[$dn]['ae_income'] = (float)$r['income'];
    }
}

/* OT */
$ot = fetchAllAssoc($con, "
    SELECT
      infusion AS dname,
      COALESCE(SUM(room),0) AS income
    FROM otivisitendo
    WHERE dis_date BETWEEN ? AND ?
    GROUP BY infusion
", "ss", [$st, $en]);

foreach ($ot as $r) {
    $dn = (string)$r['dname'];
    if (isset($report[$dn])) {
        $report[$dn]['ot_income'] = (float)$r['income'];
    }
}

$otd = fetchAllAssoc($con, "
    SELECT
      dname,
      COALESCE(SUM(discount),0) AS discount_sum
    FROM doc_dis
    WHERE edate BETWEEN ? AND ?
    GROUP BY dname
", "ss", [$st, $en]);

foreach ($otd as $r) {
    $dn = (string)$r['dname'];
    if (isset($report[$dn])) {
        $report[$dn]['ot_discount'] = (float)$r['discount_sum'];
    }
}

/* Procedure */
$proc = fetchAllAssoc($con, "
    SELECT
      dname,
      COALESCE(SUM(
        CASE WHEN type='Inpatient' AND dis_date BETWEEN ? AND ? THEN procharge ELSE 0 END
      ),0) AS in_income,
      COALESCE(SUM(
        CASE WHEN type='OPD' AND date1 BETWEEN ? AND ? THEN procharge ELSE 0 END
      ),0) AS opd_income
    FROM procedure1
    GROUP BY dname
", "ssss", [$st, $en, $st, $en]);

foreach ($proc as $r) {
    $dn = (string)$r['dname'];
    if (isset($report[$dn])) {
        $report[$dn]['procedure_income'] = (float)$r['in_income'] + (float)$r['opd_income'];
    }
}

/* Endoscopy */
$endo = fetchAllAssoc($con, "
    SELECT
      infusion AS dname,
      COALESCE(SUM(
        CASE WHEN ieid='0' AND cdate BETWEEN ? AND ? THEN room ELSE 0 END
      ),0) AS emer_income,
      COALESCE(SUM(
        CASE WHEN ieid>0 AND dis_date BETWEEN ? AND ? THEN room ELSE 0 END
      ),0) AS ipd_income
    FROM ivisitendo
    GROUP BY infusion
", "ssss", [$st, $en, $st, $en]);

foreach ($endo as $r) {
    $dn = (string)$r['dname'];
    if (isset($report[$dn])) {
        $report[$dn]['endo_income'] = (float)$r['emer_income'] + (float)$r['ipd_income'];
    }
}

/* Cathlab */
$cath = fetchAllAssoc($con, "
    SELECT
      sname AS dname,
      COALESCE(SUM(charge),0) AS income
    FROM cath_charge
    WHERE dis_date BETWEEN ? AND ?
      AND c_status != 'Cancelled'
    GROUP BY sname
", "ss", [$st, $en]);

foreach ($cath as $r) {
    $dn = (string)$r['dname'];
    if (isset($report[$dn])) {
        $report[$dn]['cath_income'] = (float)$r['income'];
    }
}

/* SPD */
$spd = fetchAllAssoc($con, "
    SELECT
      con_by,
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

$fullnameByUname = [];
foreach ($userUnameByFullname as $fullNm => $un) {
    $fullnameByUname[$un] = $fullNm;
}

foreach ($spd as $r) {
    $uname = (string)$r['con_by'];
    $fullNm = $fullnameByUname[$uname] ?? null;
    if ($fullNm && isset($report[$fullNm])) {
        $report[$fullNm]['spd_income'] = (float)$r['income'];
    }
}

/* Manual */
$manual = fetchAllAssoc($con, "
    SELECT
      TRIM(CAST(d.dcode AS CHAR)) AS dcode,
      COALESCE(SUM(
        CASE
          WHEN UPPER(TRIM(x.medi1)) IN ('ANAESTHETIST','PROCEDURE','WARD REVIEW','SURGERY','CONSULTATION')
          THEN CAST(x.pdos AS DECIMAL(18,2))
          ELSE 0
        END
      ),0) AS manual_charge,
      COALESCE(SUM(
        CASE
          WHEN UPPER(TRIM(x.medi1)) LIKE 'DISCOUNT%'
          THEN CAST(x.pdos AS DECIMAL(18,2))
          ELSE 0
        END
      ),0) AS manual_discount
    FROM ipd_extra_charge x
    JOIN doctor d
      ON TRIM(CAST(x.doc_code AS CHAR)) = TRIM(CAST(d.dcode AS CHAR))
    WHERE x.date1 >= ? AND x.date1 < ?
      AND x.delete_status <> 1
      AND d.status = 'Active'
    GROUP BY TRIM(CAST(d.dcode AS CHAR))
", "ss", [$stDT, $enDT]);

foreach ($manual as $r) {
    $dcode = (string)$r['dcode'];
    $dn = $doctorByCode[$dcode] ?? null;

    if ($dn && isset($report[$dn])) {
        $report[$dn]['manual_charge'] = (float)$r['manual_charge'];
        $report[$dn]['manual_discount'] = (float)$r['manual_discount'];
    }
}

/* ===== TOTALS ===== */
$rowsOut = [];
$grand = [
    'opd_income' => 0,
    'ipd_income' => 0,
    'ae_income' => 0,
    'ot_income' => 0,
    'procedure_income' => 0,
    'endo_income' => 0,
    'cath_income' => 0,
    'spd_income' => 0,
    'manual_charge' => 0,
    'discount_total' => 0,
    'income_total' => 0,
    'net' => 0
];

foreach ($report as $m) {
    $income_total =
        $m['opd_income']
        + $m['ipd_income']
        + $m['ae_income']
        + $m['ot_income']
        + $m['procedure_income']
        + $m['endo_income']
        + $m['cath_income']
        + $m['spd_income']
        + $m['manual_charge'];

    $discount_total =
        $m['ot_discount']
        + $m['manual_discount']
        + $m['ipd_discount'];

    $net = $income_total - $discount_total;

    $m['income_total'] = $income_total;
    $m['discount_total'] = $discount_total;
    $m['net'] = $net;

    $rowsOut[] = $m;

    $grand['opd_income'] += $m['opd_income'];
    $grand['ipd_income'] += $m['ipd_income'];
    $grand['ae_income'] += $m['ae_income'];
    $grand['ot_income'] += $m['ot_income'];
    $grand['procedure_income'] += $m['procedure_income'];
    $grand['endo_income'] += $m['endo_income'];
    $grand['cath_income'] += $m['cath_income'];
    $grand['spd_income'] += $m['spd_income'];
    $grand['manual_charge'] += $m['manual_charge'];
    $grand['discount_total'] += $discount_total;
    $grand['income_total'] += $income_total;
    $grand['net'] += $net;
}

usort($rowsOut, function ($a, $b) {
    return $b['net'] <=> $a['net'];
});

/* ===== PDF CSS ===== */
$css = '
body {
    font-family: dejavusans, sans-serif;
    font-size: 9px;
    color: #222;
}
.title {
    text-align: center;
    font-size: 15px;
    font-weight: bold;
    margin-bottom: 2px;
}
.subtitle {
    text-align: center;
    font-size: 9px;
    color: #666;
    margin-bottom: 8px;
}
.meta {
    font-size: 9px;
    margin-bottom: 8px;
}
.summary-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 8px;
}
.summary-table td {
    border: 1px solid #bfbfbf;
    padding: 6px;
    text-align: center;
}
.summary-label {
    font-size: 8px;
    color: #666;
}
.summary-value {
    font-size: 11px;
    font-weight: bold;
}
.report-table {
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed;
}
.report-table th {
    background: #e5e7eb;
    color: #111;
    border: 1px solid #9ca3af;
    padding: 5px 3px;
    text-align: center;
    font-size: 8px;
    font-weight: bold;
}
.report-table td {
    border: 1px solid #c7c7c7;
    padding: 4px 3px;
    font-size: 8px;
}
.left { text-align: left; }
.right { text-align: right; }
.center { text-align: center; }
.total-row td {
    background: #f3f4f6;
    font-weight: bold;
}
.notes {
    margin-top: 10px;
    font-size: 8px;
}
.notes ul {
    margin: 4px 0 0 14px;
    padding: 0;
}
';

/* ===== PDF HTML ===== */
$html = '';
$html .= '<div class="title">All Consultant Income &amp; Discount Report</div>';
$html .= '<div class="subtitle">Date Range: ' . h($st) . ' to ' . h($en) . '</div>';
$html .= '<div class="meta">Generated By: <b>' . h($loggedFullName) . '</b> &nbsp;&nbsp; Generated At: <b>' . date('d/m/Y h:i A') . '</b></div>';

$html .= '
<table class="summary-table">
    <tr>
        <td>
            <div class="summary-label">Total Income</div>
            <div class="summary-value">' . number_format($grand['income_total'], 2) . '</div>
        </td>
        <td>
            <div class="summary-label">Total Discount</div>
            <div class="summary-value">' . number_format($grand['discount_total'], 2) . '</div>
        </td>
        <td>
            <div class="summary-label">Net</div>
            <div class="summary-value">' . number_format($grand['net'], 2) . '</div>
        </td>
        <td>
            <div class="summary-label">Consultants</div>
            <div class="summary-value">' . count($rowsOut) . '</div>
        </td>
    </tr>
</table>
';

$html .= '
<table class="report-table">
    <thead>
        <tr>
            <th style="width:19%;">Consultant</th>
            <th style="width:6%;">OPD</th>
            <th style="width:6%;">IPD</th>
            <th style="width:6%;">A&amp;E</th>
            <th style="width:6%;">OT</th>
            <th style="width:8%;">Procedure</th>
            <th style="width:8%;">Endoscopy</th>
            <th style="width:8%;">Cathlab</th>
            <th style="width:6%;">SPD</th>
            <th style="width:8%;">Manual</th>
            <th style="width:7%;">Discount</th>
            <th style="width:8%;">Total</th>
            <th style="width:8%;">Net</th>
        </tr>
    </thead>
    <tbody>
';

foreach ($rowsOut as $r) {
    $html .= '
    <tr>
        <td class="left">' . h($r['doctor']) . '</td>
        <td class="right">' . number_format($r['opd_income'], 2) . '</td>
        <td class="right">' . number_format($r['ipd_income'], 2) . '</td>
        <td class="right">' . number_format($r['ae_income'], 2) . '</td>
        <td class="right">' . number_format($r['ot_income'], 2) . '</td>
        <td class="right">' . number_format($r['procedure_income'], 2) . '</td>
        <td class="right">' . number_format($r['endo_income'], 2) . '</td>
        <td class="right">' . number_format($r['cath_income'], 2) . '</td>
        <td class="right">' . number_format($r['spd_income'], 2) . '</td>
        <td class="right">' . number_format($r['manual_charge'], 2) . '</td>
        <td class="right">' . number_format($r['discount_total'], 2) . '</td>
        <td class="right"><b>' . number_format($r['income_total'], 2) . '</b></td>
        <td class="right"><b>' . number_format($r['net'], 2) . '</b></td>
    </tr>';
}

$html .= '
    <tr class="total-row">
        <td class="left">GRAND TOTAL</td>
        <td class="right">' . number_format($grand['opd_income'], 2) . '</td>
        <td class="right">' . number_format($grand['ipd_income'], 2) . '</td>
        <td class="right">' . number_format($grand['ae_income'], 2) . '</td>
        <td class="right">' . number_format($grand['ot_income'], 2) . '</td>
        <td class="right">' . number_format($grand['procedure_income'], 2) . '</td>
        <td class="right">' . number_format($grand['endo_income'], 2) . '</td>
        <td class="right">' . number_format($grand['cath_income'], 2) . '</td>
        <td class="right">' . number_format($grand['spd_income'], 2) . '</td>
        <td class="right">' . number_format($grand['manual_charge'], 2) . '</td>
        <td class="right">' . number_format($grand['discount_total'], 2) . '</td>
        <td class="right">' . number_format($grand['income_total'], 2) . '</td>
        <td class="right">' . number_format($grand['net'], 2) . '</td>
    </tr>
    </tbody>
</table>
';

$html .= '
<div class="notes">
    <b>Notes:</b>
    <ul>
        <li>OPD uses payment greater than doctor.v1, then payment minus 110; otherwise full payment.</li>
        <li>Manual uses ipd_extra_charge.doc_code joined with doctor.dcode.</li>
        <li>Manual date uses start datetime inclusive and end+1 day exclusive.</li>
        <li>Discount = OT discount + Manual discount + IPD discount.</li>
    </ul>
</div>
';

/* ===== GENERATE PDF ===== */
$mpdf = new Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4-L',
    'default_font' => 'dejavusans',
    'margin_left' => 6,
    'margin_right' => 6,
    'margin_top' => 18,
    'margin_bottom' => 10,
    'margin_header' => 6,
    'margin_footer' => 6,
]);

$mpdf->SetTitle('All Consultant Report');
$mpdf->SetDisplayMode('fullpage');
$mpdf->SetAutoPageBreak(true, 10);

$mpdf->SetHTMLHeader('
<div style="text-align:right; font-size:9px; color:#666;">
All Consultant Report
</div>');

$mpdf->SetHTMLFooter('
<div style="text-align:center; font-size:9px; color:#666;">
Page {PAGENO} of {nbpg}
</div>');

$mpdf->WriteHTML($css, HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html, HTMLParserMode::HTML_BODY);

$filename = 'all_consultant_report_' . $st . '_to_' . $en . '.pdf';
$mpdf->Output($filename, \Mpdf\Output\Destination::INLINE);
exit;
?>