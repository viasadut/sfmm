<?php
/* =========================================================
   CONSULTANT WISE STATEMENT (REFINED + NICE UI)
   - Keeps your SAME logic (OPD extra -110, totals, sections)
   - Removes duplicate requires + duplicate jQuery includes
   - Better HTML structure (no broken table nesting)
   - Prepared statements for safety + stability
========================================================= */

session_start();
require('db1.php'); // must create $con = mysqli connection

/* =========================
   ROLE CHECK
========================= */
$role = $_SESSION['sess_userrole'] ?? '';
$sqlRole = "SELECT COUNT(utype) AS c FROM user WHERE '$role' IN ('mng','ddf','staff')";
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
  if ($params) $stmt->bind_param($types, ...$params);
  $stmt->execute();
  $res = $stmt->get_result();
  $row = $res ? ($res->fetch_assoc() ?: []) : [];
  $stmt->close();
  return $row;
}

function all(mysqli $con, string $sql, array $params = [], string $types = ''){
  $stmt = $con->prepare($sql);
  if ($params) $stmt->bind_param($types, ...$params);
  $stmt->execute();
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
   DOCTOR LIST
========================= */
$doctorList = all($con, "SELECT dname FROM doctor WHERE status='Active' ORDER BY dname ASC");

/* =========================
   INPUTS
========================= */
$isSearch = isset($_POST['bsearch']);
$bt = trim((string)($_POST['bt'] ?? ''));
$stdate_raw = $_POST['stdate'] ?? '';
$endate_raw = $_POST['endate'] ?? '';

$stdate = parseDateYmd($stdate_raw);
$endate = parseDateYmd($endate_raw);

$errors = [];
if ($isSearch){
  if ($bt === '') $errors[] = "Please select consultant.";
  if ($stdate === '' || $endate === '') $errors[] = "Please select start and end date.";
  if ($stdate !== '' && $endate !== '' && $stdate > $endate) $errors[] = "Start date cannot be after end date.";
}

/* =========================
   RESULTS HOLDERS
========================= */
$glance_counts = [];
$income_parts  = [];
$doc_charge = 0;
$dd = '';

$rows_opd = $rows_ipd = $rows_ae = $rows_ot = $rows_proc_ipd = $rows_proc_opd = $rows_endo = $rows_cath = $rows_spd = [];

$total_income = 0;
$total_discount = 0;
$net_income = 0;

/* =========================================================
   LOAD DATA ON SEARCH
========================================================= */
if ($isSearch && !$errors){

  // user.uname by fullname = consultant
  $u = one($con, "SELECT uname FROM user WHERE fullname=? LIMIT 1", [$bt], "s");
  $dd = $u['uname'] ?? '';

  // doctor charge v1
  $d = one($con, "SELECT v1,dcode FROM doctor WHERE dname=? LIMIT 1", [$bt], "s");
  $doc_charge = (float)($d['v1'] ?? 0);
  $new_doc_code=trim((string)$d['dcode']);
  //TRIM(CAST(d.dcode AS CHAR)) AS dcode,

  /* ---------- OPD (pappnew) income adjustment ---------
     payment <= doc_charge => normal sum
     payment > doc_charge  => sum - (count * 110)
  ------------------------------------------------------*/
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

  $adjust_charge = $opd_sum_extra - ($opd_extra_count * 110);
  $income_opd = $opd_sum_normal + $adjust_charge;

  /* ---------- COUNTS (your “activities at a glance”) ---------- */
  $glance_counts['OPD'] = (int)(one($con,
    "SELECT COUNT(pmrn) AS c FROM presnew WHERE date1 BETWEEN ? AND ? AND dname=?",
    [$stdate,$endate,$bt],
    "sss"
  )['c'] ?? 0);

  $glance_counts['IPD_OPD'] = (int)(one($con,
    "SELECT COUNT(pmrn) AS c FROM inpatient WHERE anew BETWEEN ? AND ? AND adoc=? AND emerid='0'",
    [$stdate,$endate,$bt],
    "sss"
  )['c'] ?? 0);

  $glance_counts['IPD_EMER'] = (int)(one($con,
    "SELECT COUNT(pmrn) AS c FROM inpatient WHERE anew BETWEEN ? AND ? AND adoc=? AND emerid!='0'",
    [$stdate,$endate,$bt],
    "sss"
  )['c'] ?? 0);

  $glance_counts['A&E'] = (int)(one($con,
    "SELECT COUNT(pmrn) AS c FROM erefferal WHERE ddate BETWEEN ? AND ? AND infusion=?",
    [$stdate,$endate,$bt],
    "sss"
  )['c'] ?? 0);

  $glance_counts['OT'] = (int)(one($con,
    "SELECT COUNT(pmrn) AS c FROM ot WHERE date5 BETWEEN ? AND ? AND status='Received' AND dname=?",
    [$stdate,$endate,$bt],
    "sss"
  )['c'] ?? 0);

  $glance_counts['Anaes_OT'] = (int)(one($con,
    "SELECT COUNT(pmrn) AS c FROM ot WHERE status='Received' AND ? IN (nanes, anes2, anes3) AND date5 BETWEEN ? AND ?",
    [$bt,$stdate,$endate],
    "sss"
  )['c'] ?? 0);

  $glance_counts['Endoscopy'] = (int)(one($con,
    "SELECT COUNT(pmrn) AS c FROM endopapp WHERE adate BETWEEN ? AND ? AND dreffer=? AND status IN ('Received','SEEN')",
    [$stdate,$endate,$bt],
    "sss"
  )['c'] ?? 0);

  $glance_counts['Anaes_Endo'] = (int)(one($con,
    "SELECT COUNT(pmrn) AS c FROM endopapp WHERE adate BETWEEN ? AND ? AND anes=? AND status IN ('Received','SEEN')",
    [$stdate,$endate,$bt],
    "sss"
  )['c'] ?? 0);

  $glance_counts['ProcedureRoom'] = (int)(one($con,
    "SELECT COUNT(pmrn) AS c FROM procedure1
     WHERE dis_date BETWEEN ? AND ? AND dname=? AND ustatus IN ('Updated','Paid') AND type='Inpatient'",
    [$stdate,$endate,$bt],
    "sss"
  )['c'] ?? 0);

  $glance_counts['RadiologyReport'] = (int)(one($con,
    "SELECT COUNT(pmrn) AS c FROM radreport WHERE rdate BETWEEN ? AND ? AND dname=?",
    [$stdate,$endate,$bt],
    "sss"
  )['c'] ?? 0);

  $lab1 = (int)(one($con, "SELECT COUNT(pmrn) AS c FROM alltest WHERE date1 BETWEEN ? AND ? AND cby=? AND type='lab'", [$stdate,$endate,$dd], "sss")['c'] ?? 0);
  $lab2 = (int)(one($con, "SELECT COUNT(pmrn) AS c FROM iinves WHERE dis_date BETWEEN ? AND ? AND conby=? AND type='lab'", [$stdate,$endate,$dd], "sss")['c'] ?? 0);
  $lab3 = (int)(one($con, "SELECT COUNT(pmrn) AS c FROM einves WHERE ndate BETWEEN ? AND ? AND conby=? AND type='lab'", [$stdate,$endate,$dd], "sss")['c'] ?? 0);
  $glance_counts['LabConfirmed'] = $lab1 + $lab2 + $lab3;

  $glance_counts['ECG']  = (int)(one($con, "SELECT COUNT(pmrn) AS c FROM ecg  WHERE datenew BETWEEN ? AND ? AND dname1=? AND status1='Confirmed'", [$stdate,$endate,$bt], "sss")['c'] ?? 0);
  $glance_counts['ECHO'] = (int)(one($con, "SELECT COUNT(pmrn) AS c FROM echo WHERE datenew BETWEEN ? AND ? AND dname=? AND status1='Confirmed'",  [$stdate,$endate,$bt], "sss")['c'] ?? 0);
  $glance_counts['ETT']  = (int)(one($con, "SELECT COUNT(pmrn) AS c FROM ett  WHERE date2  BETWEEN ? AND ? AND dname=? AND status1='Confirmed'",  [$stdate,$endate,$bt], "sss")['c'] ?? 0);

  $glance_counts['HistoDone'] = (int)(one($con, "SELECT COUNT(pmrn) AS c FROM histo WHERE date1 BETWEEN ? AND ? AND dname1=? AND status='REPORT DONE'", [$stdate,$endate,$bt], "sss")['c'] ?? 0);
  $glance_counts['FNACDone']  = (int)(one($con, "SELECT COUNT(pmrn) AS c FROM fnacreport WHERE date5 BETWEEN ? AND ? AND dname=? AND status='SEEN'", [$stdate,$endate,$bt], "sss")['c'] ?? 0);

  /* ---------- INCOME PIECES ---------- */
  $income_ipd = (float)(one($con,
    "SELECT COALESCE(SUM(charge),0) AS s FROM icnote WHERE dis_date BETWEEN ? AND ? AND user=? AND ugroup='Doctor'",
    [$stdate,$endate,$bt],
    "sss"
  )['s'] ?? 0);

  $income_ae = (float)(one($con,
    "SELECT COALESCE(SUM(visit),0) AS s FROM ecnote WHERE daten BETWEEN ? AND ? AND dname=? AND type='Doctor'",
    [$stdate,$endate,$bt],
    "sss"
  )['s'] ?? 0);

  $income_ot = (float)(one($con,
    "SELECT COALESCE(SUM(room),0) AS s FROM otivisitendo WHERE dis_date BETWEEN ? AND ? AND infusion=?",
    [$stdate,$endate,$bt],
    "sss"
  )['s'] ?? 0);

  $income_proc_ipd = (float)(one($con,
    "SELECT COALESCE(SUM(procharge),0) AS s FROM procedure1 WHERE dis_date BETWEEN ? AND ? AND dname=? AND type='Inpatient'",
    [$stdate,$endate,$bt],
    "sss"
  )['s'] ?? 0);

  $income_proc_opd = (float)(one($con,
    "SELECT COALESCE(SUM(procharge),0) AS s FROM procedure1 WHERE date1 BETWEEN ? AND ? AND dname=? AND ustatus IN ('Updated','Paid') AND type='OPD'",
    [$stdate,$endate,$bt],
    "sss"
  )['s'] ?? 0);

  $manual_charge = (float)(one($con,
    "SELECT COALESCE(SUM(pdos),0) AS s
     FROM ipd_extra_charge
     WHERE date1 BETWEEN ? AND ? AND delete_status!='1' AND medi1 IN ('ANAESTHETIST','PROCEDURE','WARD REVIEW','SURGERY','CONSULTATION') and doc_code='$new_doc_code'",
    [$stdate,$endate],
    "ss"
  )['s'] ?? 0);

  $manual_discount = (float)(one($con,
    "SELECT COALESCE(SUM(pdos),0) AS s
     FROM ipd_extra_charge
     WHERE date1 BETWEEN ? AND ? AND delete_status!='1' AND medi1 IN ('DISCOUNT') and doc_code='$new_doc_code'",
    [$stdate,$endate],
    "ss"
  )['s'] ?? 0);

  $income_endo_ipd = (float)(one($con,
    "SELECT COALESCE(SUM(room),0) AS s FROM ivisitendo WHERE dis_date BETWEEN ? AND ? AND infusion=? AND ieid>0",
    [$stdate,$endate,$bt],
    "sss"
  )['s'] ?? 0);

  $income_endo_opd = (float)(one($con,
    "SELECT COALESCE(SUM(room),0) AS s FROM ivisitendo WHERE cdate BETWEEN ? AND ? AND infusion=? AND ieid='0'",
    [$stdate,$endate,$bt],
    "sss"
  )['s'] ?? 0);

  $income_endo = $income_endo_ipd + $income_endo_opd;

  // SPD (ecg_test) priced by ron
  $spd_ecg  = (int)(one($con, "SELECT COUNT(*) AS c FROM ecg_test WHERE datenew BETWEEN ? AND ? AND con_by=? AND ron='ECG'",               [$stdate,$endate,$dd], "sss")['c'] ?? 0);
  $spd_e2d  = (int)(one($con, "SELECT COUNT(*) AS c FROM ecg_test WHERE datenew BETWEEN ? AND ? AND con_by=? AND ron='ECHO-2D'",           [$stdate,$endate,$dd], "sss")['c'] ?? 0);
  $spd_col  = (int)(one($con, "SELECT COUNT(*) AS c FROM ecg_test WHERE datenew BETWEEN ? AND ? AND con_by=? AND ron='ECHO-COLOR DOPPLER'",[$stdate,$endate,$dd], "sss")['c'] ?? 0);

  $income_spd = ($spd_ecg*100) + ($spd_e2d*1000) + ($spd_col*1500);

  // Cathlab sum
  $income_cath = (float)(one($con,
    "SELECT COALESCE(SUM(charge),0) AS s FROM cath_charge WHERE dis_date BETWEEN ? AND ? AND c_status!='Cancelled' AND sname=?",
    [$stdate,$endate,$bt],
    "sss"
  )['s'] ?? 0);

  // Discount from doc_dis + manual discount
  $doc_discount = (float)(one($con,
    "SELECT COALESCE(SUM(discount),0) AS s FROM doc_dis WHERE edate BETWEEN ? AND ? AND dname=?",
    [$stdate,$endate,$bt],
    "sss"
  )['s'] ?? 0);

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

  /* ---------- DETAIL ROWS (tables) ---------- */
  $rows_opd = all($con,
    "SELECT pname, pmrn, adate1, payment
     FROM pappnew
     WHERE adate1 BETWEEN ? AND ? AND dname=? AND status='SEEN'
     ORDER BY adate1 ASC",
    [$stdate,$endate,$bt],
    "sss"
  );

  $rows_ipd = all($con,
    "SELECT pmrn, pname, dis_date, charge
     FROM icnote
     WHERE dis_date BETWEEN ? AND ? AND user=?
     ORDER BY dis_date ASC",
    [$stdate,$endate,$bt],
    "sss"
  );

  $rows_ae = all($con,
    "SELECT pmrn, pname, daten, visit
     FROM ecnote
     WHERE daten BETWEEN ? AND ? AND dname=? AND type='Doctor'
     ORDER BY daten ASC",
    [$stdate,$endate,$bt],
    "sss"
  );

  $rows_ot = all($con,
    "SELECT pmrn, dis_date, charge
     FROM otreport
     WHERE dis_date BETWEEN ? AND ? AND sname=? AND c_status=''
     ORDER BY dis_date ASC",
    [$stdate,$endate,$bt],
    "sss"
  );

  $rows_proc_ipd = all($con,
    "SELECT pmrn, pname, date1, procharge
     FROM procedure1
     WHERE dis_date BETWEEN ? AND ? AND dname=? AND type='Inpatient'
     ORDER BY dis_date ASC",
    [$stdate,$endate,$bt],
    "sss"
  );

  $rows_proc_opd = all($con,
    "SELECT pmrn, pname, date1, procharge
     FROM procedure1
     WHERE date1 BETWEEN ? AND ? AND dname=? AND type='OPD'
     ORDER BY date1 ASC",
    [$stdate,$endate,$bt],
    "sss"
  );

  // Endoscopy: show BOTH OPD (ieid=0) and IPD (ieid>0)
  $rows_endo = all($con,
    "SELECT pmrn, pname, cdate, dis_date, room, ieid
     FROM ivisitendo
     WHERE ((cdate BETWEEN ? AND ? AND infusion=? AND ieid='0')
         OR (dis_date BETWEEN ? AND ? AND infusion=? AND ieid>0))
     ORDER BY COALESCE(dis_date, cdate) ASC",
    [$stdate,$endate,$bt,$stdate,$endate,$bt],
    "ssssss"
  );

  // Cathlab: your old code had $row2[''] and date1; fixed to show dis_date
  $rows_cath = all($con,
    "SELECT pmrn, dis_date, charge
     FROM cath_charge
     WHERE dis_date BETWEEN ? AND ? AND sname=? AND c_status!='Cancelled'
     ORDER BY dis_date ASC",
    [$stdate,$endate,$bt],
    "sss"
  );

  $rows_spd = all($con,
    "SELECT pmrn, pname, datenew, ron
     FROM ecg_test
     WHERE datenew BETWEEN ? AND ? AND con_by=?
     ORDER BY datenew ASC",
    [$stdate,$endate,$dd],
    "sss"
  );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>CONSULTANT STATEMENT</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Use ONE jQuery + ONE jQuery UI + Bootstrap -->
  <link rel="stylesheet" href="jsnew/bootstrap.min.css">
  <script src="jsnew/jquery.min.js"></script>
  <script src="jsnew/bootstrap.min.js"></script>

  <link rel="stylesheet" href="jsnew/jquery-ui.css">
  <script src="jsnew/jquery-ui.min.js"></script>

  <link rel="stylesheet" href="styles.css">

  <style>
    body{ background:#f6f7fb; color:#111827; }
    .page-title{ font-weight:900; letter-spacing:.3px; margin:18px 0; }
    .wrap{ max-width:1500px; margin:0 auto; padding: 0 10px 30px; }
    .card{ border:0; border-radius:16px; box-shadow:0 10px 24px rgba(0,0,0,.06); }
    .card-header{ background:#fff; border-bottom:1px solid #eef0f6; font-weight:800; border-radius:16px 16px 0 0 !important; }
    .form-control{ border-radius:12px; height:44px; }
    .btn-primary{ border-radius:12px; font-weight:800; height:44px; }
    .kpi{ font-size:26px; font-weight:900; margin:0; }
    .kpi-label{ font-size:12px; color:#6b7280; font-weight:800; margin:0; }
    .table{ background:#fff; border-radius:14px; overflow:hidden; margin-bottom: 18px; }
    .table thead th{ background:#111827; color:#fff; border:0; }
    .badge-soft{ background:#eef2ff; color:#3730a3; font-weight:800; padding:6px 10px; border-radius:999px; }
    .error-box{ background:#fff1f2; border:1px solid #fecdd3; color:#9f1239; padding:10px 12px; border-radius:12px; font-weight:800; }
    .section-title{ font-weight:900; margin: 12px 0 8px; }
    .muted{ color:#6b7280; font-weight:700; }
  </style>

  <script>
    $(function(){
      $("#datepicker1").datepicker({ dateFormat:"dd-M-yy" });
      $("#datepicker2").datepicker({ dateFormat:"dd-M-yy" });
    });
  </script>
</head>

<body>

<div id='cssmenu'>
  <ul>
    <li><a href='homemng'><span>Home</span></a></li>
    <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
        <li class='has-sub'><a href='viewnew'><span>OPD Patients</span></a></li>
        <li class='has-sub'><a href='iview'><span>In-Patients</span></a></li>
      </ul>
    </li>
    <li class='active has-sub'><a href='#'><span>Appointment</span></a>
      <ul>
        <li class='has-sub'><a href='cggtttt'><span>Set Doctor's Appointment</span></a></li>
        <li class='has-sub'><a href='ami2'><span>Set Restrictions on Appointment Time</span></a></li>
      </ul>
    </li>
    <li class='last'><a href='ot'><span>OT BOOKING</span></a></li>
    <li class='active has-sub'><a href='#'><span>Reports</span></a>
      <ul>
        <li class='has-sub'><a href='view3new'><span>OPD Prescription</span></a></li>
        <li class='has-sub'><a href='con1'><span>Outpatient Stats</span></a></li>
        <li class='has-sub'><a href='con2'><span>OT Stats</span></a></li>
        <li class='has-sub'><a href='con3'><span>In-Patient Stats</span></a></li>
        <li class='has-sub'><a href='con11'><span>Medicine Stats</span></a></li>
      </ul>
    </li>
    <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
  </ul>
</div>

<div class="wrap">
  <h2 class="page-title text-center">CONSULTANT WISE STATEMENT</h2>

  <div class="card">
    <div class="card-header">Search</div>
    <div class="card-body">

      <?php if ($errors): ?>
        <div class="error-box">
          <?php foreach($errors as $e) echo "• ".h($e)."<br>"; ?>
        </div>
      <?php endif; ?>

      <form method="POST" class="row" style="margin:0;">
        <div class="col-md-3">
          <div class="muted">Start Date</div>
          <input type="text" class="form-control" name="stdate" id="datepicker1" value="<?= h($stdate_raw) ?>" placeholder="Select Date">
        </div>
        <div class="col-md-3">
          <div class="muted">End Date</div>
          <input type="text" class="form-control" name="endate" id="datepicker2" value="<?= h($endate_raw) ?>" placeholder="Select Date">
        </div>
        <div class="col-md-4">
          <div class="muted">Consultant</div>
          <input list="doctor_list" class="form-control" name="bt" value="<?= h($bt) ?>" placeholder="Type or select consultant">
          <datalist id="doctor_list">
            <option value="">-Select-</option>
            <option value="all">ALL</option>
            <?php foreach($doctorList as $dr): ?>
              <option value="<?= h($dr['dname']) ?>"><?= h($dr['dname']) ?></option>
            <?php endforeach; ?>
          </datalist>
        </div>
        <div class="col-md-2" style="padding-top: 18px;">
  <button class="btn btn-primary btn-block" type="submit" name="bsearch">Search</button>

  <button class="btn btn-danger btn-block" type="submit"
          name="bpdf"
          formaction="consultant_statement_pdf.php"
          formtarget="_blank"
          style="margin-top:8px;">
    Generate PDF
  </button>
</div>
      </form>

    </div>
  </div>

  <?php if ($isSearch && !$errors): ?>

    <div class="card" style="margin-top:14px;">
      <div class="card-header">
        Summary <span class="badge-soft"><?= h($bt) ?></span>
        <span class="muted"> | <?= h($stdate) ?> to <?= h($endate) ?></span>
      </div>
      <div class="card-body">

        <div class="row">
          <div class="col-md-3">
            <div class="card"><div class="card-body">
              <p class="kpi-label">Total Income (BDT)</p>
              <p class="kpi"><?= money($total_income) ?></p>
            </div></div>
          </div>
          <div class="col-md-3">
            <div class="card"><div class="card-body">
              <p class="kpi-label">Total Discount (BDT)</p>
              <p class="kpi"><?= money($total_discount) ?></p>
            </div></div>
          </div>
          <div class="col-md-3">
            <div class="card"><div class="card-body">
              <p class="kpi-label">Net Income (BDT)</p>
              <p class="kpi"><?= money($net_income) ?></p>
            </div></div>
          </div>
          <div class="col-md-3">
            <div class="card"><div class="card-body">
              <p class="kpi-label">Doctor Base Charge</p>
              <p class="kpi"><?= money($doc_charge) ?></p>
            </div></div>
          </div>
        </div>

        <hr>

        <div class="row">
          <div class="col-md-6">
            <h4 class="section-title">Activities at a Glance</h4>
            <table class="table table-bordered">
              <thead>
                <tr><th>Item</th><th style="width:160px;">Count</th></tr>
              </thead>
              <tbody>
                <tr><td>OPD</td><td><?= (int)$glance_counts['OPD'] ?></td></tr>
                <tr><td>IPD (OPD)</td><td><?= (int)$glance_counts['IPD_OPD'] ?></td></tr>
                <tr><td>IPD (Emergency)</td><td><?= (int)$glance_counts['IPD_EMER'] ?></td></tr>
                <tr><td>IPD (Total)</td><td><?= (int)$glance_counts['IPD_OPD'] + (int)$glance_counts['IPD_EMER'] ?></td></tr>
                <tr><td>A&E</td><td><?= (int)$glance_counts['A&E'] ?></td></tr>
                <tr><td>OT</td><td><?= (int)$glance_counts['OT'] ?></td></tr>
                <tr><td>Anaes (OT)</td><td><?= (int)$glance_counts['Anaes_OT'] ?></td></tr>
                <tr><td>Endoscopy</td><td><?= (int)$glance_counts['Endoscopy'] ?></td></tr>
                <tr><td>Anaes (Endo)</td><td><?= (int)$glance_counts['Anaes_Endo'] ?></td></tr>
                <tr><td>Procedure Room</td><td><?= (int)$glance_counts['ProcedureRoom'] ?></td></tr>
                <tr><td>Radiology Report Done</td><td><?= (int)$glance_counts['RadiologyReport'] ?></td></tr>
                <tr><td>Lab Report Confirmed</td><td><?= (int)$glance_counts['LabConfirmed'] ?></td></tr>
                <tr><td>ECG</td><td><?= (int)$glance_counts['ECG'] ?></td></tr>
                <tr><td>ECHO</td><td><?= (int)$glance_counts['ECHO'] ?></td></tr>
                <tr><td>ETT</td><td><?= (int)$glance_counts['ETT'] ?></td></tr>
                <tr><td>Histopathology Done</td><td><?= (int)$glance_counts['HistoDone'] ?></td></tr>
                <tr><td>FNAC Done</td><td><?= (int)$glance_counts['FNACDone'] ?></td></tr>
              </tbody>
            </table>
          </div>

          <div class="col-md-6">
            <h4 class="section-title">Income Breakdown (BDT)</h4>
            <table class="table table-bordered">
              <thead>
                <tr><th>Head</th><th style="width:220px;">Amount</th></tr>
              </thead>
              <tbody>
                <?php foreach($income_parts as $k => $v): ?>
                  <tr><td><?= h($k) ?></td><td><?= money($v) ?></td></tr>
                <?php endforeach; ?>
                <tr><th>Total Income</th><th><?= money($total_income) ?></th></tr>
                <tr><th>Total Discount</th><th><?= money($total_discount) ?></th></tr>
                <tr><th>Net Income</th><th><?= money($net_income) ?></th></tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>

    <!-- DETAILS TABLES -->
    <div class="card" style="margin-top:14px;">
      <div class="card-header">Details</div>
      <div class="card-body">

        <!-- OPD -->
        <h4 class="section-title">OPD</h4>
        <table class="table table-bordered">
          <thead>
            <tr><th>#</th><th>Patient</th><th>MRN</th><th>Date</th><th>Amount</th></tr>
          </thead>
          <tbody>
            <?php if(!$rows_opd): ?>
              <tr><td colspan="5" class="text-center muted"><b>No records</b></td></tr>
            <?php else: $i=1; foreach($rows_opd as $r):
              $payment = (float)$r['payment'];
              $show = ($payment > $doc_charge) ? ($payment - 110) : $payment;
            ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= h($r['pname']) ?></td>
                <td><?= h($r['pmrn']) ?></td>
                <td><?= h($r['adate1']) ?></td>
                <td><?= money($show) ?></td>
              </tr>
            <?php endforeach; endif; ?>
          </tbody>
        </table>

        <!-- Inpatient -->
        <h4 class="section-title">Inpatient</h4>
        <table class="table table-bordered">
          <thead>
            <tr><th>#</th><th>MRN</th><th>Patient</th><th>Date</th><th>Charge</th></tr>
          </thead>
          <tbody>
            <?php if(!$rows_ipd): ?>
              <tr><td colspan="5" class="text-center muted"><b>No records</b></td></tr>
            <?php else: $i=1; foreach($rows_ipd as $r): ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= h($r['pmrn']) ?></td>
                <td><?= h($r['pname']) ?></td>
                <td><?= h($r['dis_date']) ?></td>
                <td><?= money($r['charge']) ?></td>
              </tr>
            <?php endforeach; endif; ?>
          </tbody>
        </table>

        <!-- A&E -->
        <h4 class="section-title">A&E</h4>
        <table class="table table-bordered">
          <thead>
            <tr><th>#</th><th>MRN</th><th>Patient</th><th>Date</th><th>Visit</th></tr>
          </thead>
          <tbody>
            <?php if(!$rows_ae): ?>
              <tr><td colspan="5" class="text-center muted"><b>No records</b></td></tr>
            <?php else: $i=1; foreach($rows_ae as $r): ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= h($r['pmrn']) ?></td>
                <td><?= h($r['pname']) ?></td>
                <td><?= h($r['daten']) ?></td>
                <td><?= money($r['visit']) ?></td>
              </tr>
            <?php endforeach; endif; ?>
          </tbody>
        </table>

        <!-- OT -->
        <h4 class="section-title">OT</h4>
        <table class="table table-bordered">
          <thead>
            <tr><th>#</th><th>MRN</th><th>Date</th><th>Charge</th></tr>
          </thead>
          <tbody>
            <?php if(!$rows_ot): ?>
              <tr><td colspan="4" class="text-center muted"><b>No records</b></td></tr>
            <?php else: $i=1; foreach($rows_ot as $r): ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= h($r['pmrn']) ?></td>
                <td><?= h($r['dis_date']) ?></td>
                <td><?= money($r['charge']) ?></td>
              </tr>
            <?php endforeach; endif; ?>
          </tbody>
        </table>

        <!-- Procedure -->
        <h4 class="section-title">Procedure (Inpatient)</h4>
        <table class="table table-bordered">
          <thead>
            <tr><th>#</th><th>MRN</th><th>Patient</th><th>Date</th><th>Charge</th></tr>
          </thead>
          <tbody>
            <?php if(!$rows_proc_ipd): ?>
              <tr><td colspan="5" class="text-center muted"><b>No records</b></td></tr>
            <?php else: $i=1; foreach($rows_proc_ipd as $r): ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= h($r['pmrn']) ?></td>
                <td><?= h($r['pname']) ?></td>
                <td><?= h($r['date1']) ?></td>
                <td><?= money($r['procharge']) ?></td>
              </tr>
            <?php endforeach; endif; ?>
          </tbody>
        </table>

        <h4 class="section-title">Procedure (OPD)</h4>
        <table class="table table-bordered">
          <thead>
            <tr><th>#</th><th>MRN</th><th>Patient</th><th>Date</th><th>Charge</th></tr>
          </thead>
          <tbody>
            <?php if(!$rows_proc_opd): ?>
              <tr><td colspan="5" class="text-center muted"><b>No records</b></td></tr>
            <?php else: $i=1; foreach($rows_proc_opd as $r): ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= h($r['pmrn']) ?></td>
                <td><?= h($r['pname']) ?></td>
                <td><?= h($r['date1']) ?></td>
                <td><?= money($r['procharge']) ?></td>
              </tr>
            <?php endforeach; endif; ?>
          </tbody>
        </table>

        <!-- Endoscopy (OPD + IPD combined) -->
        <h4 class="section-title">Endoscopy</h4>
        <table class="table table-bordered">
          <thead>
            <tr><th>#</th><th>MRN</th><th>Patient</th><th>Date</th><th>Type</th><th>Room</th></tr>
          </thead>
          <tbody>
            <?php if(!$rows_endo): ?>
              <tr><td colspan="6" class="text-center muted"><b>No records</b></td></tr>
            <?php else: $i=1; foreach($rows_endo as $r):
              $isIpd = ((int)$r['ieid'] > 0);
              $showDate = $isIpd ? $r['dis_date'] : $r['cdate'];
            ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= h($r['pmrn']) ?></td>
                <td><?= h($r['pname']) ?></td>
                <td><?= h($showDate) ?></td>
                <td><?= $isIpd ? 'IPD' : 'OPD' ?></td>
                <td><?= money($r['room']) ?></td>
              </tr>
            <?php endforeach; endif; ?>
          </tbody>
        </table>

        <!-- Cathlab -->
        <h4 class="section-title">Cathlab Procedure Charge</h4>
        <table class="table table-bordered">
          <thead>
            <tr><th>#</th><th>MRN</th><th>Date</th><th>Charge</th></tr>
          </thead>
          <tbody>
            <?php if(!$rows_cath): ?>
              <tr><td colspan="4" class="text-center muted"><b>No records</b></td></tr>
            <?php else: $i=1; foreach($rows_cath as $r): ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= h($r['pmrn']) ?></td>
                <td><?= h($r['dis_date']) ?></td>
                <td><?= money($r['charge']) ?></td>
              </tr>
            <?php endforeach; endif; ?>
          </tbody>
        </table>

        <!-- SPD -->
        <h4 class="section-title">SPD Procedure Charge</h4>
        <table class="table table-bordered">
          <thead>
            <tr><th>#</th><th>MRN</th><th>Patient</th><th>Date</th><th>RON</th><th>Charge</th></tr>
          </thead>
          <tbody>
            <?php if(!$rows_spd): ?>
              <tr><td colspan="6" class="text-center muted"><b>No records</b></td></tr>
            <?php else: $i=1; foreach($rows_spd as $r):
              $ron = $r['ron'];
              $charge = 0;
              if ($ron === 'ECG') $charge = 100;
              elseif ($ron === 'ECHO-2D') $charge = 1000;
              elseif ($ron === 'ECHO-COLOR DOPPLER') $charge = 1500;
            ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= h($r['pmrn']) ?></td>
                <td><?= h($r['pname']) ?></td>
                <td><?= h($r['datenew']) ?></td>
                <td><?= h($ron) ?></td>
                <td><?= money($charge) ?></td>
              </tr>
            <?php endforeach; endif; ?>
          </tbody>
        </table>

      </div>
    </div>

  <?php endif; ?>

</div>
</body>
</html>