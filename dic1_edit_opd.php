<?php
include_once 'dbconfig.php';
?>

<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('doctor','lab')"; 
    $resultc = mysqli_query($con, $queryc) or die(mysqli_error());
    $rowc = mysqli_fetch_array($resultc);
    $c1=$rowc['COUNT(utype)'];
    if(!isset($_SESSION['sess_username']) || $c1==0){
        header('Location: login2?err=2');
    }
?>
<?php 
    require('db1.php');
    $user=$_SESSION['sess_username'];

// / $id=$_REQUEST['id'];
    $encryption=$_REQUEST['id'];
    $options = 0;
    $ciphering = "AES-192-CTR";
    $decryption_iv = '1234567891011121';
    $decryption_key = "kpj";
    $decryption=openssl_decrypt ($encryption, $ciphering,
    $decryption_key, $options, $decryption_iv);
    $id = $decryption;

    $sno='O'.$id;

    // $pmrn=$_REQUEST['pmrn'];
    $encryption=$_REQUEST['pmrn'];
    $decryption=openssl_decrypt ($encryption, $ciphering,
    $decryption_key, $options, $decryption_iv);
    $pmrn = $decryption;

    // $eid=$_REQUEST['eid'];
    $encryption=$_REQUEST['eid'];
    $decryption=openssl_decrypt ($encryption, $ciphering,
    $decryption_key, $options, $decryption_iv);
    $eid = $decryption;

    $query4 = mysqli_query($con,"select * from alltest where id='$id'");
    $data = mysqli_fetch_assoc($query4);
    $eid=$data['eid'];
    $iname=$data['medi'];

    $query5 = mysqli_query($con,"select * from dic where pmrn='$pmrn' and sno='$sno'");
    $data1 = mysqli_fetch_assoc($query5);
?>
<?php
    require('db1.php');
    if(isset($_POST['Submit'])){
        $pname = $_REQUEST['pname'];
        $pmrn = $_REQUEST['pmrn'];
        $pphone=$_REQUEST['pphone'];
        $page=$_REQUEST['page'];
        $psex=$_REQUEST['psex'];
        //$adate=$_REQUEST['adate'];
        $ptime=$_REQUEST['ptime'];
        $pcontrol=$_REQUEST['pcontrol'];
        $apt=$_REQUEST['apt'];
        $inr=$_REQUEST['inr'];
        $atime=$_REQUEST['atime'];
        $appt=$_REQUEST['appt'];
        $flevel=$_REQUEST['flevel'];
        $adate= date('d/m/Y H:i:s');
        $adate1= date('m/d/Y');
        $rr='Prothrombin Time:'.$ptime."<br />".'PT Control(Normal):'.$pcontrol."<br />".'% Activity PT:'.$apt."<br />".'INR:'.$inr."<br />".'aPartial Thromboplastin Time:'.$atime."<br />".'aPTT Control:'.$appt."<br />"."<br />".'Fibrinogen Level:'.$flevel;
        $rr1='Prothrombin Time:'.$ptime.' '.'sec'."<br />".'PT Control(Normal):'.$pcontrol.' '.'sec'."<br />".'% Activity PT:'.$apt.' '.'%'."<br />".'INR:'.$inr.' '.''."<br />".'aPartial Thromboplastin Time:'.$atime.' '.'sec'."<br />".'aPTT Control:'.$appt.' '.'sec'."<br />"."<br />".'Fibrinogen Level:'.$flevel.' '.'mg/dL';

        $ins_query1="UPDATE dic SET 
            `pname`='$pname',
            `pmrn`='$pmrn',
            `psex`='$psex',
            `page`='$page',
            `ptime`='$ptime',
            `pcontrol`='$pcontrol',
            `apt`='$apt',
            `inr`='$inr',
            `atime`='$atime',
            `appt`='$appt',
            `flevel`='$flevel',
            `uby`='$user',
            `udate`='$adate',
            `eid`='$eid',
            `iname`='$iname',
            `inid`='$id'
            WHERE sno = '$sno'";
        $q = mysqli_query($con,$ins_query1) or die(mysqli_error($con));

    $update="update alltest set resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',result='$rr',result1='$rr1' where id='$id'";
    mysqli_query($con,$update) or die(mysql_error());


    if($q) {
        if($con->affected_rows == 1){
            echo '<script language="javascript">';
            echo 'alert("Update Success"); ';
            echo 'window.location.href = "testapproveopd.php";';
            echo '</script>';
        } else{
            echo '<script language="javascript">';
            echo 'alert("Update Failed"); ';
            echo '</script>';
        }
    }
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up Form</title>

    <link rel="stylesheet" href="jsnew/normalize.min.css">


    <style>
    /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
    /* Stephonce R. MOrris | 2014 */

    html {
        box-sizing: border-box;
    }

    *,
    *:before,
    *:after {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    body {
        font-family: 'Nunito', sans-serif;
        color: #384047;
        background: #A085C6;
    }

    form {
        max-width: 300px;
        margin: 10px auto;
        padding: 10px 20px;
        background: #f4f7f8;
        border-radius: 8px;
        border: 1px solid #8265B0;
        box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2)
    }

    h1 {
        margin: 0 0 30px 0;
        text-align: center;
    }

    input[type="text"],
    input[type="password"],
    input[type="date"],
    input[type="datetime"],
    input[type="email"],
    input[type="number"],
    input[type="search"],
    input[type="tel"],
    input[type="time"],
    input[type="url"],
    textarea,
    select {
        background: rgba(255, 255, 255, 0.1);
        border: none;
        font-size: 16px;
        height: auto;
        margin: 0;
        outline: 0;
        padding: 15px;
        background-color: #e8eeef;
        color: #8a97a0;
        box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
        margin-bottom: 30px;
    }
    input[type="radio"],
    input[type="checkbox"] {
        margin: 0 4px 8px 0;
    }
    select {
        padding: 6px;
        height: 32px;
        border-radius: 2px;
        width: 25%;
    }
    textarea {
        padding: 2px;
        height: 100px;
        border-radius: 2px;
        width: 100%;
    }
    button {
        padding: 19px 39px 18px 39px;
        color: #FFF;
        background-color: #A085C6;
        /*#4bc970*/
        font-size: 16px;
        text-align: center;
        font-style: normal;
        border-radius: 5px;
        width: 100%;
        border: 1px solid #8265B0;
        /*#3ac162*/
        border-width: 1px 1px 3px;
        box-shadow: 0 -1px 0 rgba(255, 255, 255, 0.1) inset;
        margin-bottom: 3px;
    }
    fieldset {
        margin-bottom: 30px;
        border: none;
    }
    legend {
        font-size: 1.4em;
        margin-bottom: 10px;
    }
    label {
        display: block;
        margin-bottom: 0px;
    }
    label.light {
        font-weight: 300;
        display: inline;
    }
    .number {
        background-color: #A085C6;
        /*#5fcf80*/
        color: #fff;
        height: 30px;
        width: 30px;
        display: inline-block;
        font-size: 0.8em;
        margin-right: 4px;
        line-height: 30px;
        text-align: center;
        text-shadow: 0 1px 0 rgba(255, 255, 255, 0.2);
        border-radius: 100%;
    }
    abbr[title] {
        border-bottom-width: 0;
    }
    @media screen and (min-width: 480px) {
        form {
            max-width: 750px;
        }
    }
    </style>
    <script src="jsnew/pprefixfree.min.js"></script>
    <link rel="stylesheet" href="jsnew/jquery-ui.css">
    <script src="jsnew/jquery.min.js"></script>
    <script src="jsnew/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#datepicker").datepicker();
        });
    </script>
    <link rel="stylesheet" href="styles.css">
    <script type="text/javascript" src="jquery-1.4.1.min.js"></script>
<body>
    <div id='cssmenu'>
        <ul>
            <li><a href='edischarge3'><span>Home</span></a></li>
            <li class='active has-sub'><a href='#'><span>Patients</span></a>
                <ul>
                    <li class='has-sub'><a href='esearch'><span>Patient Search By MRN</span></a> </li>
                    <li class='has-sub'><a href='eadm'><span>New Patient</span></a> </li>
                </ul>
            </li>
            <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
        </ul>
    </div>
    <!-- Google Font -->
    <link href='jsnew/fonts' rel='stylesheet' type='text/css'>
    <form action="" method="post">
        <!-- Form Title -->
        <h1>CBC FORM </h1>
        <fieldset>
            <legend></legend>
            <!-- Name Input -->
            <label for="age"><strong>Patient's Name :</strong></label>
            <input name="pname" type="text" size="70" style="text-transform:uppercase"
                value="<?php echo $data['pname']?>" required />
            <label for="age"><strong>Patient's Details :</strong></label>
            <input name="psex" type="text" size="5" value="<?php echo $data['pgender']?>" required />
            <input name="pmrn" type="text" size="15" value="<?php echo $data['pmrn']?>" required />
            <input name="pphone" type="text" size="13" value="<?php echo $data['pphone']?>" required />
            <input name="page" type="text" size="2" value="<?php echo $data['page']?>" required />

            <label for="age"><strong>Prothrombin Time:</strong></label>
            <input name="ptime" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['ptime']?>" required />
            <label for="age"><strong>PT Control(Normal):</strong></label>
            <input name="pcontrol" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['pcontrol']?>" required />
            <label for="age"><strong>% Activity PT:</strong></label>
            <input name="apt" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['apt']?>" required />
            <label for="age"><strong>INR:</strong></label>
            <input name="inr" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['inr']?>" required />
            <label for="age"><strong>aPartial Thromboplastin Time:</strong></label>
            <input name="atime" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['atime']?>" required />
            <label for="age"><strong>aPTT Control:</strong></label>
            <input name="appt" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['appt']?>" required />
            <label for="age"><strong>Fibrinogen Level:</strong></label>
            <input name="flevel" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['flevel']?>" required />
        </fieldset>
        <table>
            <tr>
                <td colspan="15"> <button type="submit" name="Submit">Confirm</button></td>
                <td colspan="10"> <a target='_blank'
                    href="adm?pmrn=<?php echo "$pmrn"; ?>&adoc=<?php echo $data4["adoc"]; ?>&adate=<?php echo $data4["adate"]; ?>&eid=<?php echo $count1; ?>"><img
                    src="print.png" title="Print Report" width="150" height="60" /></a></td>
            </tr>
        </table>
    </form>
</body>
</html>