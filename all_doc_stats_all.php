<?php
/* ==============================
   CONSULTANT WISE SUMMARY REPORT (ALL)
   - Uses prepared statements
   - Nice Bootstrap UI
   - ipd_extra_charge uses doc_code -> doctor.dcode (NOT dname)
   - Fixes date overlap for DATETIME using >= start AND < end+1day
   ============================== */

session_start();
require('db1.php'); // must provide $con (mysqli)

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
  if ($types !== '') {
    $stmt->bind_param($types, ...$params);
  }
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

// UI datepicker (mm/dd/yy) to Y-m-d safely
$st = date('Y-m-d', strtotime($st_in));
$en = date('Y-m-d', strtotime($en_in));

/* DATETIME-safe range (includes full end date) */
$stDT = $st . " 00:00:00";
$enDT = date('Y-m-d', strtotime($en . ' +1 day')) . " 00:00:00";

$doSearch = isset($_POST['bsearch']);

/* ===== GET ACTIVE CONSULTANTS (MUST include dcode) ===== */
$doctors = fetchAllAssoc(
  $con,
  "SELECT dcode, dname, COALESCE(v1,0) AS v1
   FROM doctor
   WHERE status='Active'
   ORDER BY dname ASC"
);

$doctorNames = [];
$docChargeMap = [];     // dname => v1
$doctorByCode = [];     // dcode => dname

foreach ($doctors as $d) {
  $dname = (string)$d['dname'];
  $dcode = (string)$d['dcode'];

  $doctorNames[] = $dname;
  $docChargeMap[$dname] = (float)($d['v1'] ?? 0);

  if ($dcode !== '') {
    $doctorByCode[$dcode] = $dname;
  }
}

/* ===== user fullname->uname map (needed for SPD/ecg_test con_by) ===== */
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

/* ===== BUILD BASE RESULT STRUCTURE (keyed by dname) ===== */
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

/* ===== RUN QUERIES ONLY WHEN SEARCH ===== */
if ($doSearch) {

  /* --------------------------
     OPD Income (pappnew)
     Rule: if payment > doc_charge(v1) => payment - 110
     -------------------------- */
     
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
    if (!isset($report[$dn])) continue;
    $report[$dn]['opd_count']  = (int)$r['cnt'];
    $report[$dn]['opd_income'] = (float)$r['income'];
  }

  /* --------------------------
     IPD Income + Discount (icnote)
     -------------------------- */
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
    if (!isset($report[$dn])) continue;
    $report[$dn]['ipd_income']   = (float)$r['income'];
    $report[$dn]['ipd_discount'] = (float)$r['discount_sum'];
  }

  /* --------------------------
     A&E Income (ecnote)
     -------------------------- */
  $ae = fetchAllAssoc($con, "
    SELECT
      dname AS dname,
      COALESCE(SUM(visit),0) AS income
    FROM ecnote
    WHERE type='Doctor'
      AND daten BETWEEN ? AND ?
    GROUP BY dname
  ", "ss", [$st, $en]);

  foreach ($ae as $r) {
    $dn = (string)$r['dname'];
    if (!isset($report[$dn])) continue;
    $report[$dn]['ae_income'] = (float)$r['income'];
  }

  /* --------------------------
     OT Income (otivisitendo) + OT Discount (doc_dis)
     -------------------------- */
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
    if (!isset($report[$dn])) continue;
    $report[$dn]['ot_income'] = (float)$r['income'];
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
    if (!isset($report[$dn])) continue;
    $report[$dn]['ot_discount'] = (float)$r['discount_sum'];
  }

  /* --------------------------
     Procedure Income (procedure1) Inpatient + OPD
     -------------------------- */
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
    if (!isset($report[$dn])) continue;
    $report[$dn]['procedure_income'] = (float)$r['in_income'] + (float)$r['opd_income'];
  }

  /* --------------------------
     Endoscopy Income (ivisitendo)
     ieid=0 uses cdate, ieid>0 uses dis_date
     -------------------------- */
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
    if (!isset($report[$dn])) continue;
    $report[$dn]['endo_income'] = (float)$r['emer_income'] + (float)$r['ipd_income'];
  }

  /* --------------------------
     Cathlab Income (cath_charge)
     -------------------------- */
  $cath = fetchAllAssoc($con, "
    SELECT
      sname AS dname,
      COALESCE(SUM(charge),0) AS income
    FROM cath_charge
    WHERE dis_date BETWEEN ? AND ?
      AND c_status!='Cancelled'
    GROUP BY sname
  ", "ss", [$st, $en]);

  foreach ($cath as $r) {
    $dn = (string)$r['dname'];
    if (!isset($report[$dn])) continue;
    $report[$dn]['cath_income'] = (float)$r['income'];
  }

  /* --------------------------
     SPD Income (ecg_test)
     con_by = uname -> map to fullname (doctor)
     -------------------------- */
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
  foreach ($userUnameByFullname as $full => $un) { $fullnameByUname[$un] = $full; }

  foreach ($spd as $r) {
    $uname = (string)$r['con_by'];
    $full  = $fullnameByUname[$uname] ?? null;
    if (!$full) continue;
    if (!isset($report[$full])) continue;
    $report[$full]['spd_income'] = (float)$r['income'];
  }

  /* --------------------------
     Manual Charge + Manual Discount (ipd_extra_charge)
     IMPORTANT: Uses doc_code -> doctor.dcode
     IMPORTANT: Date overlap fixed using >= startDT AND < endDT
     -------------------------- */
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
    if ($dcode === '') continue;

    $dn = $doctorByCode[$dcode] ?? null;
    if (!$dn) continue;

    if (!isset($report[$dn])) continue;

    $report[$dn]['manual_charge']   = (float)$r['manual_charge'];
    $report[$dn]['manual_discount'] = (float)$r['manual_discount'];
  }
}

/* ===== CALCULATE TOTALS ===== */
$rowsOut = [];
$grand = [
  'opd_income'=>0,'ipd_income'=>0,'ae_income'=>0,'ot_income'=>0,'procedure_income'=>0,'endo_income'=>0,'cath_income'=>0,'spd_income'=>0,'manual_charge'=>0,
  'discount_total'=>0,'income_total'=>0,'net'=>0
];

foreach ($report as $dn => $m) {
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

usort($rowsOut, function($a,$b){
  return ($b['net'] <=> $a['net']);
});
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Consultant Report</title>

  <link rel="stylesheet" href="jsnew/bootstrap.min.css" />
  <link rel="stylesheet" href="jsnew/jquery-ui.css">
  <script src="jsnew/jquery.min.js"></script>
  <script src="jsnew/jquery-ui.min.js"></script>

  <script>
    $(function () {
      $("#datepicker1, #datepicker2").datepicker({
        dateFormat: "mm/dd/yy",
        appendTo: "body", // ✅ prevents clipping inside scroll/overflow divs
        beforeShow: function () {
          setTimeout(function () {
            $("#ui-datepicker-div").css("z-index", 999999);
          }, 0);
        }
      });
    });
  </script>

  <style>
    body{ background:#f5f6fb; }
    .page-wrap{ max-width:1400px; margin:18px auto; padding:0 12px; }
    .card{ border:0; box-shadow:0 8px 20px rgba(0,0,0,.06); border-radius:14px; }

    /* ✅ ensures header/form area stays above table scroll stacking contexts */
    .card-header{ background:#fff; border-bottom:1px solid #eee; border-radius:14px 14px 0 0; position:relative; z-index:50; }

    .kpi{ padding:14px; border-radius:12px; background:#fff; border:1px solid #eee; }
    .kpi .label{ color:#666; font-size:12px; }
    .kpi .value{ font-size:20px; font-weight:700; }

    .table thead th{ position:sticky; top:0; background:#111827; color:#fff; z-index:2; }
    .table td, .table th{ vertical-align:middle !important; }
    .muted{ color:#6b7280; }
    .neg{ color:#b91c1c; font-weight:700; }
    .pos{ color:#047857; font-weight:700; }

    /* ✅ datepicker always on top */
    #ui-datepicker-div,
    .ui-datepicker{
      z-index:999999 !important;
    }
  </style>
</head>
<body>

<div class="page-wrap">

  <div class="card mb-3">
    <div class="card-header">
      <div class="d-flex flex-wrap align-items-center justify-content-between">
        <div>
          <h4 class="mb-0">All Consultant Income & Discount Report</h4>
          <div class="muted">Date Range: <?=h($st)?> to <?=h($en)?></div>
        </div>
        <form method="post" class="form-inline mt-2 mt-md-0" action="">
  <input type="text" name="stdate" id="datepicker1" class="form-control mr-2" placeholder="Start date" value="<?=h($st_in)?>">
  <input type="text" name="endate" id="datepicker2" class="form-control mr-2" placeholder="End date" value="<?=h($en_in)?>">

  <button class="btn btn-primary mr-2" name="bsearch" type="submit">Generate</button>

  <!-- ✅ NEW PDF BUTTON -->
  <button class="btn btn-danger" type="submit" formaction="all_consultant_report_pdf1.php" formtarget="_blank" name="bpdf">
    Generate PDF
  </button>
</form>
      </div>
    </div>

    <div class="card-body">
      <div class="row">
        <div class="col-md-3 mb-2"><div class="kpi"><div class="label">Total Income</div><div class="value"><?=number_format($grand['income_total'],2)?></div></div></div>
        <div class="col-md-3 mb-2"><div class="kpi"><div class="label">Total Discount</div><div class="value"><?=number_format($grand['discount_total'],2)?></div></div></div>
        <div class="col-md-3 mb-2"><div class="kpi"><div class="label">Net</div><div class="value"><?=number_format($grand['net'],2)?></div></div></div>
        <div class="col-md-3 mb-2"><div class="kpi"><div class="label">Consultants</div><div class="value"><?=count($rowsOut)?></div></div></div>
      </div>

      <div class="table-responsive mt-3" style="max-height:70vh;">
        <table class="table table-bordered table-hover mb-0">
          <thead>
            <tr>
              <th style="min-width:220px;">Consultant</th>
              <th>OPD</th>
              <th>IPD</th>
              <th>A&amp;E</th>
              <th>OT</th>
              <th>Procedure</th>
              <th>Endoscopy</th>
              <th>Cathlab</th>
              <th>SPD</th>
              <th>Manual</th>
              <th>Discount</th>
              <th>Total</th>
              <th>Net</th>
            </tr>
          </thead>
          <tbody>
          <?php if(!$doSearch): ?>
            <tr><td colspan="13" class="text-center muted">Select dates and click <b>Generate</b>.</td></tr>
          <?php else: ?>
            <?php foreach($rowsOut as $r): ?>
              <?php $netClass = ($r['net'] < 0) ? 'neg' : 'pos'; ?>
              <tr>
                <td><b><?=h($r['doctor'])?></b></td>
                <td class="text-right"><?=number_format($r['opd_income'],2)?></td>
                <td class="text-right"><?=number_format($r['ipd_income'],2)?></td>
                <td class="text-right"><?=number_format($r['ae_income'],2)?></td>
                <td class="text-right"><?=number_format($r['ot_income'],2)?></td>
                <td class="text-right"><?=number_format($r['procedure_income'],2)?></td>
                <td class="text-right"><?=number_format($r['endo_income'],2)?></td>
                <td class="text-right"><?=number_format($r['cath_income'],2)?></td>
                <td class="text-right"><?=number_format($r['spd_income'],2)?></td>
                <td class="text-right"><?=number_format($r['manual_charge'],2)?></td>
                <td class="text-right"><?=number_format($r['discount_total'],2)?></td>
                <td class="text-right"><b><?=number_format($r['income_total'],2)?></b></td>
                <td class="text-right <?=$netClass?>"><?=number_format($r['net'],2)?></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td><b>GRAND TOTAL</b></td>
              <td class="text-right"><b><?=number_format($grand['opd_income'],2)?></b></td>
              <td class="text-right"><b><?=number_format($grand['ipd_income'],2)?></b></td>
              <td class="text-right"><b><?=number_format($grand['ae_income'],2)?></b></td>
              <td class="text-right"><b><?=number_format($grand['ot_income'],2)?></b></td>
              <td class="text-right"><b><?=number_format($grand['procedure_income'],2)?></b></td>
              <td class="text-right"><b><?=number_format($grand['endo_income'],2)?></b></td>
              <td class="text-right"><b><?=number_format($grand['cath_income'],2)?></b></td>
              <td class="text-right"><b><?=number_format($grand['spd_income'],2)?></b></td>
              <td class="text-right"><b><?=number_format($grand['manual_charge'],2)?></b></td>
              <td class="text-right"><b><?=number_format($grand['discount_total'],2)?></b></td>
              <td class="text-right"><b><?=number_format($grand['income_total'],2)?></b></td>
              <td class="text-right"><b><?=number_format($grand['net'],2)?></b></td>
            </tr>
          <?php endif; ?>
          </tbody>
        </table>
      </div>

      <?php if($doSearch): ?>
        <div class="mt-3 muted" style="font-size:12px;">
          Notes:
          <ul class="mb-0">
            <li><b>OPD</b> uses: payment &gt; doctor.v1 ⇒ payment-110 else payment.</li>
            <li><b>Manual</b> uses <code>ipd_extra_charge.doc_code</code> joined with <code>doctor.dcode</code>.</li>
            <li><b>Manual Date</b> uses: <code>date1 &gt;= start 00:00:00</code> and <code>date1 &lt; end+1day 00:00:00</code> (no overlap/missing).</li>
            <li><b>Discount</b> = OT discount (doc_dis) + Manual discount (ipd_extra_charge medi1=DISCOUNT) + IPD discount (icnote).</li>
          </ul>
        </div>
      <?php endif; ?>

    </div>
  </div>

</div>

</body>
</html>