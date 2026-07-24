<?php
session_start();
$role = $_SESSION['sess_userrole'];
if (!isset($_SESSION['sess_username']) || $role != "lab") {
  header('Location: login2?err=2');
  exit;
}
?>
<?php
require('db1.php');
$fullname = $_SESSION['sess_username'];

/* ---- staff (for menu $cat) ---- */
$query3  = "SELECT * FROM staff3 where sid= '$fullname'";
$result3 = mysqli_query($con, $query3) or die(mysqli_error($con));
$row3    = mysqli_fetch_array($result3);
$cat     = $row3['cat'];

$SIG_DIR = 'lab_signatures/';                 // web + filesystem relative folder
if (!is_dir(__DIR__ . '/' . $SIG_DIR)) {
  @mkdir(__DIR__ . '/' . $SIG_DIR, 0777, true);
}

$msg = '';
$msgType = '';

/* =====================================================================
   Helpers
   ===================================================================== */
function staff_desig($con, $uname)
{
  $u = mysqli_real_escape_string($con, $uname);
  $r = mysqli_query($con, "SELECT desig FROM staff3 WHERE sid='$u' LIMIT 1");
  $d = ($r) ? mysqli_fetch_assoc($r) : null;
  return $d ? $d['desig'] : '';
}

/* Upsert a person into lab_signature (keeps existing signature if none uploaded now). */
function upsert_signature($con, $uname, $fullname, $desig, $utype, $sigPath = '')
{
  $u  = mysqli_real_escape_string($con, $uname);
  $fn = mysqli_real_escape_string($con, $fullname);
  $dg = mysqli_real_escape_string($con, $desig);
  $ut = mysqli_real_escape_string($con, $utype);
  $sp = mysqli_real_escape_string($con, $sigPath);
  $by = mysqli_real_escape_string($con, $_SESSION['sess_username']);
  $now = date('Y-m-d H:i:s');

  $r = mysqli_query($con, "SELECT id FROM lab_signature WHERE uname='$u' LIMIT 1");
  if ($r && mysqli_num_rows($r) > 0) {
    $sigSet  = ($sp !== '')     ? ", signature='$sp'"     : "";
    $desigSet = ($desig !== '')  ? ", designation='$dg'"   : "";   // only overwrite when provided
    mysqli_query($con, "UPDATE lab_signature
            SET fullname='$fn', utype='$ut' $desigSet $sigSet,
                updated_by='$by', updated_at='$now'
            WHERE uname='$u'");
  } else {
    mysqli_query($con, "INSERT INTO lab_signature
            (uname,fullname,designation,utype,signature,updated_by,updated_at)
            VALUES ('$u','$fn','$dg','$ut','$sp','$by','$now')");
  }
}

/* =====================================================================
   Save
   ===================================================================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_flow'])) {
  $subtype = trim($_POST['subtype']);
  $checked = isset($_POST['checked'])    ? (array)$_POST['checked']    : array();
  $consult = isset($_POST['consultant']) ? (array)$_POST['consultant'] : array();
  $postDesig = isset($_POST['desig']) && is_array($_POST['desig']) ? $_POST['desig'] : array();

  // designation to store for a user: typed value, else existing staff3 designation
  $desigFor = function ($u) use ($con, $postDesig) {
    $d = isset($postDesig[$u]) ? trim($postDesig[$u]) : '';
    return ($d !== '') ? $d : staff_desig($con, $u);
  };

  if ($subtype === '') {
    $msg = 'Please select a Category.';
    $msgType = 'err';
  } else {
    /* 1) handle signature uploads (named sig[uname]) */
    if (!empty($_FILES['sig']['name']) && is_array($_FILES['sig']['name'])) {
      foreach ($_FILES['sig']['name'] as $u => $origName) {
        if ($origName === '' || $_FILES['sig']['error'][$u] !== UPLOAD_ERR_OK) continue;
        $tmp = $_FILES['sig']['tmp_name'][$u];
        $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));
        if (!in_array($ext, array('jpg', 'jpeg', 'png', 'gif'))) continue;
        $safe = preg_replace('/[^a-zA-Z0-9_]/', '', $u);
        $file = 'sig_' . $safe . '_' . time() . '.' . $ext;
        if (move_uploaded_file($tmp, __DIR__ . '/' . $SIG_DIR . $file)) {
          // fetch identity for this user
          $ue = mysqli_real_escape_string($con, $u);
          $ur = mysqli_query($con, "SELECT fullname,utype FROM user WHERE uname='$ue' LIMIT 1");
          $uu = ($ur) ? mysqli_fetch_assoc($ur) : array('fullname' => $u, 'utype' => '');
          upsert_signature($con, $u, $uu['fullname'], $desigFor($u), $uu['utype'], $SIG_DIR . $file);
        }
      }
    }

    /* 2) make sure every selected person has an identity row (signature may be blank) */
    foreach (array_merge($checked, $consult) as $u) {
      $ue = mysqli_real_escape_string($con, $u);
      $ur = mysqli_query($con, "SELECT fullname,utype FROM user WHERE uname='$ue' LIMIT 1");
      if ($ur && mysqli_num_rows($ur) > 0) {
        $uu = mysqli_fetch_assoc($ur);
        upsert_signature($con, $u, $uu['fullname'], $desigFor($u), $uu['utype']);
      }
    }

    /* 3) rewrite mapping for this subtype */
    $se = mysqli_real_escape_string($con, $subtype);
    mysqli_query($con, "DELETE FROM lab_approval_flow WHERE subtype='$se'");
    $by  = mysqli_real_escape_string($con, $_SESSION['sess_username']);
    $now = date('Y-m-d H:i:s');
    $i = 0;
    foreach ($checked as $u) {
      $ue = mysqli_real_escape_string($con, $u);
      mysqli_query($con, "INSERT IGNORE INTO lab_approval_flow
                (subtype,role,uname,sort_order,status,created_by,created_at)
                VALUES ('$se','checked','$ue',$i,'active','$by','$now')");
      $i++;
    }
    $i = 0;
    foreach ($consult as $u) {
      $ue = mysqli_real_escape_string($con, $u);
      mysqli_query($con, "INSERT IGNORE INTO lab_approval_flow
                (subtype,role,uname,sort_order,status,created_by,created_at)
                VALUES ('$se','consultant','$ue',$i,'active','$by','$now')");
      $i++;
    }
    $msg = 'Approval flow saved for category: ' . htmlspecialchars($subtype);
    $msgType = 'ok';
    $_GET['subtype'] = $subtype; // keep it selected after save
  }
}

/* =====================================================================
   Load data for the page
   ===================================================================== */
$selSubtype = isset($_GET['subtype']) ? $_GET['subtype'] : (isset($_POST['subtype']) ? $_POST['subtype'] : '');

// categories
$cats = array();
$rc = mysqli_query($con, "SELECT DISTINCT subtype FROM radio WHERE type='lab' AND subtype<>'' ORDER BY subtype");
while ($rc && $r = mysqli_fetch_assoc($rc)) {
  $cats[] = $r['subtype'];
}

// active lab users / doctors
$labUsers = array();
$docUsers = array();
$rl = mysqli_query($con, "SELECT uname,fullname FROM user WHERE utype='lab' AND status IN ('active','Active') ORDER BY fullname");
while ($rl && $r = mysqli_fetch_assoc($rl)) {
  $labUsers[] = $r;
}
$rd = mysqli_query($con, "SELECT uname,fullname FROM user WHERE utype='doctor' AND status IN ('active','Active') ORDER BY fullname");
while ($rd && $r = mysqli_fetch_assoc($rd)) {
  $docUsers[] = $r;
}

// currently assigned for selected subtype
$assignedChecked = array();
$assignedConsult = array();
if ($selSubtype !== '') {
  $se = mysqli_real_escape_string($con, $selSubtype);
  $ra = mysqli_query($con, "SELECT role,uname FROM lab_approval_flow WHERE subtype='$se' AND status='active'");
  while ($ra && $r = mysqli_fetch_assoc($ra)) {
    if ($r['role'] === 'checked')     $assignedChecked[$r['uname']] = true;
    if ($r['role'] === 'consultant')  $assignedConsult[$r['uname']] = true;
  }
}

// existing signatures + designations map (from lab_signature, fallback to staff3)
$sigMap = array();
$desigMap = array();
$rs = mysqli_query($con, "SELECT uname,signature,designation FROM lab_signature");
while ($rs && $r = mysqli_fetch_assoc($rs)) {
  $sigMap[$r['uname']]   = $r['signature'];
  $desigMap[$r['uname']] = $r['designation'];
}
// fill blanks from staff3 as a helpful default
$rd2 = mysqli_query($con, "SELECT sid,desig FROM staff3 WHERE desig<>''");
while ($rd2 && $r = mysqli_fetch_assoc($rd2)) {
  if (empty($desigMap[$r['sid']])) $desigMap[$r['sid']] = $r['desig'];
}
function desig_val($desigMap, $uname)
{
  return isset($desigMap[$uname]) ? $desigMap[$uname] : '';
}

function sig_thumb($sigMap, $uname)
{
  if (!empty($sigMap[$uname])) {
    $p = htmlspecialchars($sigMap[$uname]);
    return "<img src='$p' class='sig-thumb' alt='sig'>";
  }
  return "<span class='no-sig'>no signature</span>";
}

// overview: everyone currently in the approval flow, grouped by category
$overview = array();   // subtype => array('checked'=>[...], 'consultant'=>[...])
$ov = mysqli_query(
  $con,
  "SELECT f.subtype, f.role, f.uname, f.sort_order,
            COALESCE(NULLIF(s.fullname,''), u.fullname, f.uname) AS fullname,
            COALESCE(s.designation,'') AS designation,
            COALESCE(s.signature,'')   AS signature
     FROM lab_approval_flow f
     LEFT JOIN lab_signature s ON s.uname = f.uname
     LEFT JOIN user          u ON u.uname = f.uname
     WHERE f.status='active'
     ORDER BY f.subtype, f.role, f.sort_order, f.id"
);
while ($ov && $r = mysqli_fetch_assoc($ov)) {
  $overview[$r['subtype']][$r['role']][] = $r;
}
$overviewCount = 0;
foreach ($overview as $g) {
  foreach ($g as $rows) {
    $overviewCount += count($rows);
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Lab Report Approval Flow</title>
  <link rel="stylesheet" href="css/style2.css">
  <style type="text/css">
    .style1 {
      font-size: x-large;
      font-weight: bold;
      font-style: italic;
    }

    .wrap {
      width: 92%;
      margin: 15px auto;
    }

    .card {
      background: #fff;
      border: 1px solid #ccc;
      border-radius: 6px;
      padding: 15px 20px;
      margin-bottom: 18px;
      box-shadow: 0 1px 3px rgba(0, 0, 0, .1);
    }

    .card h3 {
      margin: 0 0 12px;
      color: #5a3e8c;
      border-bottom: 2px solid #A085C6;
      padding-bottom: 6px;
    }

    .people {
      width: 100%;
      border-collapse: collapse;
    }

    .people th,
    .people td {
      border: 1px solid #ddd;
      padding: 7px 9px;
      text-align: left;
      font-size: 13px;
    }

    .people th {
      background: #f0ebf7;
    }

    .sig-thumb {
      height: 34px;
      max-width: 130px;
      border: 1px solid #ccc;
      background: #fff;
      vertical-align: middle;
    }

    .no-sig {
      color: #999;
      font-style: italic;
      font-size: 12px;
    }

    select.cat {
      padding: 8px;
      font-size: 14px;
      min-width: 320px;
    }

    .btn {
      padding: 12px 30px;
      color: #fff;
      background: #A085C6;
      font-size: 14px;
      border: 1px solid #8265B0;
      border-radius: 5px;
      cursor: pointer;
    }

    .btn:hover {
      background: #8265B0;
    }

    .flash {
      padding: 12px 16px;
      border-radius: 5px;
      margin: 12px auto;
      width: 92%;
      font-weight: bold;
    }

    .flash.ok {
      background: #e3f7e3;
      border: 1px solid #4bc970;
      color: #1c6b1c;
    }

    .flash.err {
      background: #fde5e5;
      border: 1px solid #e77;
      color: #a11;
    }

    .hint {
      color: #666;
      font-size: 12px;
      margin: 2px 0 10px;
    }

    .count-badge {
      display: inline-block;
      background: #A085C6;
      color: #fff;
      border-radius: 10px;
      padding: 1px 9px;
      font-size: 12px;
      margin-left: 6px;
    }
  </style>
</head>

<body>
  <div id='cssmenu'>
    <ul>
      <li><a href='teslab.php'><span>Home</span></a></li>
      <li class='active'><a href='lab_report_approval_flow.php'><span>Lab Report Approval Flow</span></a></li>
      <li class='last'><a href='logout.php'><span>LOGOUT</span></a></li>
    </ul>
  </div>

  <p align="center" class="style1">Lab Report Approval Flow</p>

  <?php if ($msg !== ''): ?>
    <div class="flash <?php echo $msgType; ?>"><?php echo $msg; ?></div>
  <?php endif; ?>

  <!-- Current approval flow overview -->
  <div class="wrap">
    <div class="card">
      <h3>Current Approval Flow <span class="count-badge"><?php echo $overviewCount; ?></span></h3>
      <?php if ($overviewCount === 0): ?>
        <p class="hint">No approval flow configured yet. Select a category below to assign Checked-by and Consultants.</p>
      <?php else: ?>
        <table class="people">
          <tr>
            <th width="18%">Category</th>
            <th width="10%">Role</th>
            <th width="26%">Name</th>
            <th width="26%">Designation</th>
            <th width="20%">Signature</th>
          </tr>
          <?php foreach ($overview as $subtype => $group):
            $roles = array('checked' => 'Checked By', 'consultant' => 'Consultant');
            // rows for this category (checked first, then consultant)
            $catRows = array();
            foreach ($roles as $rk => $rlabel) {
              if (!empty($group[$rk])) {
                foreach ($group[$rk] as $p) {
                  $p['_rlabel'] = $rlabel;
                  $catRows[] = $p;
                }
              }
            }
            $rowspan = count($catRows);
            $first = true;
            foreach ($catRows as $p): ?>
              <tr>
                <?php if ($first): ?>
                  <td rowspan="<?php echo $rowspan; ?>" style="font-weight:bold;background:#faf7ff;vertical-align:top">
                    <?php echo htmlspecialchars($subtype); ?>
                  </td>
                <?php $first = false;
                endif; ?>
                <td><?php echo $p['_rlabel']; ?></td>
                <td><?php echo htmlspecialchars($p['fullname']); ?>
                  <small style="color:#999">(<?php echo htmlspecialchars($p['uname']); ?>)</small>
                </td>
                <td><?php echo htmlspecialchars($p['designation']); ?></td>
                <td><?php echo sig_thumb($sigMap, $p['uname']); ?></td>
              </tr>
          <?php endforeach;
          endforeach; ?>
        </table>
        <p class="hint">Order shown = Checked By first, then Consultant &mdash; the same order used in the report footer.</p>
      <?php endif; ?>
    </div>
  </div>

  <!-- Category selector -->
  <div class="wrap">
    <div class="card">
      <h3>1. Select Category</h3>
      <form action="" method="GET">
        <select name="subtype" class="cat" onchange="this.form.submit()">
          <option value="">-- Select Category --</option>
          <?php foreach ($cats as $c): ?>
            <option value="<?php echo htmlspecialchars($c); ?>" <?php echo ($c === $selSubtype) ? 'selected' : ''; ?>>
              <?php echo htmlspecialchars($c); ?>
            </option>
          <?php endforeach; ?>
        </select>
        <span class="hint">Choosing a category loads its current Checked-by / Consultant assignment below.</span>
      </form>
    </div>

    <?php if ($selSubtype !== ''): ?>
      <form action="lab_report_approval_flow.php?subtype=<?php echo urlencode($selSubtype); ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="subtype" value="<?php echo htmlspecialchars($selSubtype); ?>">

        <!-- Checked by -->
        <div class="card">
          <h3>2. Checked By (Lab Staff) <span class="count-badge"><?php echo count($labUsers); ?></span></h3>
          <p class="hint">Tick each person who checks reports in this category, set their Designation, and upload their signature (all shown in the report footer).</p>
          <table class="people">
            <tr>
              <th width="6%">Select</th>
              <th width="26%">Name</th>
              <th width="24%">Designation</th>
              <th width="22%">Current Signature</th>
              <th width="22%">Upload / Replace Signature</th>
            </tr>
            <?php foreach ($labUsers as $u): $un = $u['uname']; ?>
              <tr>
                <td align="center"><input type="checkbox" name="checked[]" value="<?php echo htmlspecialchars($un); ?>" <?php echo isset($assignedChecked[$un]) ? 'checked' : ''; ?>></td>
                <td><?php echo htmlspecialchars($u['fullname']); ?> <small style="color:#888">(<?php echo htmlspecialchars($un); ?>)</small></td>
                <td><input type="text" name="desig[<?php echo htmlspecialchars($un); ?>]" value="<?php echo htmlspecialchars(desig_val($desigMap, $un)); ?>" placeholder="Designation" style="width:97%"></td>
                <td><?php echo sig_thumb($sigMap, $un); ?></td>
                <td><input type="file" name="sig[<?php echo htmlspecialchars($un); ?>]" accept="image/*"></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>

        <!-- Consultant -->
        <div class="card">
          <h3>3. Consultant (Doctors) <span class="count-badge"><?php echo count($docUsers); ?></span></h3>
          <p class="hint">Tick each consultant who signs off reports in this category, set their Designation, and upload their signature.</p>
          <table class="people">
            <tr>
              <th width="6%">Select</th>
              <th width="26%">Name</th>
              <th width="24%">Designation</th>
              <th width="22%">Current Signature</th>
              <th width="22%">Upload / Replace Signature</th>
            </tr>
            <?php foreach ($docUsers as $u): $un = $u['uname']; ?>
              <tr>
                <td align="center"><input type="checkbox" name="consultant[]" value="<?php echo htmlspecialchars($un); ?>" <?php echo isset($assignedConsult[$un]) ? 'checked' : ''; ?>></td>
                <td><?php echo htmlspecialchars($u['fullname']); ?> <small style="color:#888">(<?php echo htmlspecialchars($un); ?>)</small></td>
                <td><input type="text" name="desig[<?php echo htmlspecialchars($un); ?>]" value="<?php echo htmlspecialchars(desig_val($desigMap, $un)); ?>" placeholder="Designation" style="width:97%"></td>
                <td><?php echo sig_thumb($sigMap, $un); ?></td>
                <td><input type="file" name="sig[<?php echo htmlspecialchars($un); ?>]" accept="image/*"></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>

        <div class="card" style="text-align:center">
          <button type="submit" name="save_flow" value="1" class="btn">Save Approval Flow</button>
        </div>
      </form>
    <?php endif; ?>
  </div>

</body>

</html>