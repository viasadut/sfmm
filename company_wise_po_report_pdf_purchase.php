<?php
session_start();
require('db1.php');
require_once('tcpdf/tcpdf.php');

$role   = $_SESSION['sess_userrole'] ?? '';
$usernm = $_SESSION['sess_username'] ?? '';

$queryc  = "SELECT COUNT(utype) AS c FROM user WHERE '$role' IN ('mng','staff','store','doctor')";
$resultc = mysqli_query($con, $queryc) or die(mysqli_error($con));
$rowc    = mysqli_fetch_assoc($resultc);
$c1      = (int)($rowc['c'] ?? 0);

if ($usernm === '' || $c1 == 0) {
    header('Location: login2?err=2');
    exit;
}

function h($str)
{
    return htmlspecialchars((string)$str, ENT_QUOTES, 'UTF-8');
}

$today = date('Y-m-d');

$st_in = $_GET['stdate'] ?? date('Y-01-01');
$en_in = $_GET['endate'] ?? $today;

$st_ts = strtotime($st_in);
$en_ts = strtotime($en_in);

$st_in = $st_ts ? date('Y-m-d', $st_ts) : date('Y-01-01');
$en_in = $en_ts ? date('Y-m-d', $en_ts) : $today;

$stdate = $st_in . ' 00:00:00';
$endate = $en_in . ' 23:59:59';

$sql = "
    SELECT
        COALESCE(NULLIF(TRIM(s.supplier_name), ''), TRIM(p.creditor_code)) AS company_name,

        SUM(CASE WHEN MONTH(p.ceo_a_time) = 1  THEN COALESCE(p.total_amount,0) ELSE 0 END) AS jan,
        SUM(CASE WHEN MONTH(p.ceo_a_time) = 2  THEN COALESCE(p.total_amount,0) ELSE 0 END) AS feb,
        SUM(CASE WHEN MONTH(p.ceo_a_time) = 3  THEN COALESCE(p.total_amount,0) ELSE 0 END) AS mar,
        SUM(CASE WHEN MONTH(p.ceo_a_time) = 4  THEN COALESCE(p.total_amount,0) ELSE 0 END) AS apr,
        SUM(CASE WHEN MONTH(p.ceo_a_time) = 5  THEN COALESCE(p.total_amount,0) ELSE 0 END) AS may,
        SUM(CASE WHEN MONTH(p.ceo_a_time) = 6  THEN COALESCE(p.total_amount,0) ELSE 0 END) AS jun,
        SUM(CASE WHEN MONTH(p.ceo_a_time) = 7  THEN COALESCE(p.total_amount,0) ELSE 0 END) AS jul,
        SUM(CASE WHEN MONTH(p.ceo_a_time) = 8  THEN COALESCE(p.total_amount,0) ELSE 0 END) AS aug,
        SUM(CASE WHEN MONTH(p.ceo_a_time) = 9  THEN COALESCE(p.total_amount,0) ELSE 0 END) AS sep,
        SUM(CASE WHEN MONTH(p.ceo_a_time) = 10 THEN COALESCE(p.total_amount,0) ELSE 0 END) AS oct,
        SUM(CASE WHEN MONTH(p.ceo_a_time) = 11 THEN COALESCE(p.total_amount,0) ELSE 0 END) AS nov,
        SUM(CASE WHEN MONTH(p.ceo_a_time) = 12 THEN COALESCE(p.total_amount,0) ELSE 0 END) AS `dec`,
        SUM(COALESCE(p.total_amount,0)) AS grand_total

    FROM po_table p
    LEFT JOIN suppliers_master s
        ON TRIM(CAST(s.supplier_code AS CHAR)) COLLATE utf8mb4_unicode_ci
         = TRIM(CAST(p.creditor_code AS CHAR)) COLLATE utf8mb4_unicode_ci

    WHERE p.po_type != 'Pharmacy'
      AND p.status = 'Approved'
      AND p.ceo_a_time BETWEEN '$stdate' AND '$endate'

    GROUP BY COALESCE(NULLIF(TRIM(s.supplier_name), ''), TRIM(p.creditor_code))
    ORDER BY company_name ASC
";

$res = mysqli_query($con, $sql) or die(mysqli_error($con));

$totals = [
    'jan' => 0, 'feb' => 0, 'mar' => 0, 'apr' => 0,
    'may' => 0, 'jun' => 0, 'jul' => 0, 'aug' => 0,
    'sep' => 0, 'oct' => 0, 'nov' => 0, 'dec' => 0,
    'grand_total' => 0
];

$rows_html = '';
$i = 1;

if ($res && mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        foreach ($totals as $k => $v) {
            $totals[$k] += (float)($row[$k] ?? 0);
        }

        $rows_html .= '<tr>
            <td align="center" width="4%">'.$i++.'</td>
            <td width="20%">'.h($row['company_name']).'</td>
            <td align="right" width="5.5%">'.number_format((float)$row['jan'], 2).'</td>
            <td align="right" width="5.5%">'.number_format((float)$row['feb'], 2).'</td>
            <td align="right" width="5.5%">'.number_format((float)$row['mar'], 2).'</td>
            <td align="right" width="5.5%">'.number_format((float)$row['apr'], 2).'</td>
            <td align="right" width="5.5%">'.number_format((float)$row['may'], 2).'</td>
            <td align="right" width="5.5%">'.number_format((float)$row['jun'], 2).'</td>
            <td align="right" width="5.5%">'.number_format((float)$row['jul'], 2).'</td>
            <td align="right" width="5.5%">'.number_format((float)$row['aug'], 2).'</td>
            <td align="right" width="5.5%">'.number_format((float)$row['sep'], 2).'</td>
            <td align="right" width="5.5%">'.number_format((float)$row['oct'], 2).'</td>
            <td align="right" width="5.5%">'.number_format((float)$row['nov'], 2).'</td>
            <td align="right" width="5.5%">'.number_format((float)$row['dec'], 2).'</td>
            <td align="right" width="10%"><b>'.number_format((float)$row['grand_total'], 2).'</b></td>
        </tr>';
    }
} else {
    $rows_html .= '<tr><td colspan="15" align="center">No approved PO found in selected date range.</td></tr>';
}

$rows_html .= '<tr style="font-weight:bold; background-color:#f5e7a1;">
    <td colspan="2" align="right">Grand Total</td>
    <td align="right">'.number_format($totals['jan'], 2).'</td>
    <td align="right">'.number_format($totals['feb'], 2).'</td>
    <td align="right">'.number_format($totals['mar'], 2).'</td>
    <td align="right">'.number_format($totals['apr'], 2).'</td>
    <td align="right">'.number_format($totals['may'], 2).'</td>
    <td align="right">'.number_format($totals['jun'], 2).'</td>
    <td align="right">'.number_format($totals['jul'], 2).'</td>
    <td align="right">'.number_format($totals['aug'], 2).'</td>
    <td align="right">'.number_format($totals['sep'], 2).'</td>
    <td align="right">'.number_format($totals['oct'], 2).'</td>
    <td align="right">'.number_format($totals['nov'], 2).'</td>
    <td align="right">'.number_format($totals['dec'], 2).'</td>
    <td align="right">'.number_format($totals['grand_total'], 2).'</td>
</tr>';

/* A3 LANDSCAPE */
$pdf = new TCPDF('L', 'mm', 'A3', true, 'UTF-8', false);
$pdf->SetCreator('OpenAI');
$pdf->SetAuthor($usernm);
$pdf->SetTitle('Pharmacy PO Monthly Report');
$pdf->SetSubject('Pharmacy PO Monthly Report');

$pdf->SetMargins(5, 8, 5);
$pdf->SetHeaderMargin(3);
$pdf->SetFooterMargin(3);
$pdf->SetAutoPageBreak(true, 6);
$pdf->SetFont('helvetica', '', 7);
$pdf->AddPage();

$html = '
<h2 style="text-align:center;">Company Wise Approved PO Report (Pharmacy)</h2>
<p style="text-align:center;">
    Period: <b>'.h($st_in).'</b> to <b>'.h($en_in).'</b>
</p>

<table border="1" cellpadding="3">
    <tr style="background-color:#eaeaea; font-weight:bold;">
        <th width="4%" align="center">S.No</th>
        <th width="20%" align="center">Company Name</th>
        <th width="5.5%" align="center">Jan</th>
        <th width="5.5%" align="center">Feb</th>
        <th width="5.5%" align="center">Mar</th>
        <th width="5.5%" align="center">Apr</th>
        <th width="5.5%" align="center">May</th>
        <th width="5.5%" align="center">Jun</th>
        <th width="5.5%" align="center">Jul</th>
        <th width="5.5%" align="center">Aug</th>
        <th width="5.5%" align="center">Sep</th>
        <th width="5.5%" align="center">Oct</th>
        <th width="5.5%" align="center">Nov</th>
        <th width="5.5%" align="center">Dec</th>
        <th width="10%" align="center">Grand Total</th>
    </tr>
    '.$rows_html.'
</table>
';

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('pharmacy_po_month_wise_report.pdf', 'I');
exit;