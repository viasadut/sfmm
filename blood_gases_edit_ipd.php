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

    $encryption=$_REQUEST['id'];
    $options = 0;
    $ciphering = "AES-192-CTR";
    $decryption_iv = '1234567891011121';
    $decryption_key = "kpj";
    $decryption=openssl_decrypt ($encryption, $ciphering,
    $decryption_key, $options, $decryption_iv);
    $id = $decryption;

    $sno='I'.$id;

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

    $query4 = mysqli_query($con,"select * from iinves where id='$id'");
    $data = mysqli_fetch_assoc($query4);
    $eid=$data['eid'];
    $iname=$data['medi'];

    $query5 = mysqli_query($con,"select * from blood_gases where pmrn='$pmrn' and sno='$sno'");
    $data1 = mysqli_fetch_assoc($query5);

?>

<?php
    require('db1.php');
    if(isset($_POST['Submit'])){
    $pname = $_REQUEST['pname'];
    $pmrn = $_REQUEST['pmrn'];
    //$pphone=$_REQUEST['pphone'];
    $page=$_REQUEST['page'];
    $psex=$_REQUEST['psex'];
    //$adate=$_REQUEST['adate'];

    $pH=$_REQUEST['pH'];
    $PCO2=$_REQUEST['PCO2'];
    $PO2=$_REQUEST['PO2'];
    $Be_ecf=$_REQUEST['Be_ecf'];
    $HCO3_act=$_REQUEST['HCO3_act'];
    $HOC3_std=$_REQUEST['HOC3_std'];
    $BE_B=$_REQUEST['BE_B'];
    $tCO2=$_REQUEST['tCO2'];

    $O2_SAT_est=$_REQUEST['O2_SAT_est'];

    $Na=$_REQUEST['Na'];
    $Cl=$_REQUEST['Cl'];
    $K=$_REQUEST['K'];
    $AnGap=$_REQUEST['AnGap'];

    $pAtm=$_REQUEST['pAtm'];

    $adate= date('d/m/Y H:i:s');
    $adate1= date('m/d/Y');

    $rr= 'pH- :'.$pH."<br />".
    'PCO2- :'.$PCO2."<br />".
    'PO2- :'.$PO2."<br />".
    'Be_ecf- :'.$Be_ecf."<br />".
    'HCO3_act- :'.$HCO3_act."<br />".
    'HOC3_std- :'.$HOC3_std."<br />".
    'BE_B- :'.$BE_B."<br />".
    'tCO2- :'.$tCO2."<br />".
    'O2_SAT_est- :'.$O2_SAT_est."<br />".
    'Na- :'.$Na."<br />".
    'Cl- :'.$Cl."<br />".
    'K- :'.$K."<br />".
    'AnGap- :'.$AnGap."<br />".
    'pAtm- :'.$pAtm;

    $rr1= 'pH- :'.$pH."<br />".
    'PCO2- :'.$PCO2.' '.'mmHg'."<br />".
    'PO2- :'.$PO2.' '.'mmHg'."<br />".
    'Be (ecf)- :'.$Be_ecf.' '.'mmol/L'."<br />".
    'HCO3-act- :'.$HCO3_act.' '.'mmol/L'."<br />".
    'HOC3-std- :'.$HOC3_std.' '.'mmol/L'."<br />".
    'BE (B)- :'.$BE_B.' '.'mmol/L'."<br />".
    'tCO2- :'.$tCO2.' '.'mmol/L'."<br />".
    'O2_SAT_est- :'.$O2_SAT_est.' '.'mmol/L'."<br />".
    'Na- :'.$Na.' '.'mmol/L'."<br />".
    'Cl- :'.$Cl.' '.'mmol/L'."<br />".
    'K- :'.$K.' '.'mmol/L'."<br />".
    'AnGap- :'.$AnGap."<br />".
    'pAtm- :'.$pAtm.' '.'mmHg';


    
    $ins_query1="UPDATE blood_gases SET 
        `pH`='$pH',
        `PCO2`='$PCO2',
        `PO2`='$PO2',
        `Be_ecf`='$Be_ecf',
        `HCO3_act`='$HCO3_act',
        `HOC3_std`='$HOC3_std',
        `BE_B`='$BE_B',
        `tCO2`='$tCO2',
        `O2_SAT_est`='$O2_SAT_est',
        `Na`='$Na',
        `Cl`='$Cl',
        `K`='$K',
        `AnGap`='$AnGap',
        `pAtm`='$pAtm',
        `uby`='$user',
        `udate`='$adate',
        `eid`='$eid',
        `iname`='$iname',
        `inid`='$id'
        WHERE sno = '$sno'";
    $q = mysqli_query($con,$ins_query1) or die(mysqli_error($con));

    $update="update iinves set resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',result='$rr',result1='$rr1' where id='$id'";
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
</head>
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
        <h1>Blood Gases, Arterial(GP39A) </h1>
        <fieldset>
            <legend></legend>
            <!-- Name Input -->
            <label for="age"><strong>Patient's Name :</strong></label>
            <input name="pname" type="text" size="70" style="text-transform:uppercase"
                value="<?php echo $data['pname']?>" required />
            <label for="age"><strong>Patient's Details :</strong></label>
            <input name="psex" type="text" size="5" value="<?php echo $data['pgender']?>" required />
            <input name="pmrn" type="text" size="15" value="<?php echo $data['pmrn']?>" required />
            <!-- <input name="pphone" type="text" size="13" value="<?php //echo $data['pphone']?>" required /> -->
            <input name="page" type="text" size="2" value="<?php echo $data['page']?>" required />

            <label for="age"><strong>ACID/BASE 37.0 °C:</strong></label>
            <label for="iron"><strong>pH</strong></label>
            <input name="pH" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['pH']?>" required>
            <label for="iron"><strong>PCO2</strong></label>
            <input name="PCO2" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['PCO2']?>" required>
            <label for="iron"><strong>PO2</strong></label>
            <input name="PO2" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['PO2']?>" required>
            <label for="iron"><strong>Be(ecf)</strong></label>
            <input name="Be_ecf" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['Be_ecf']?>" required>
            <label for="iron"><strong>HCO3-act</strong></label>
            <input name="HCO3_act" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['HCO3_act']?>" required>
            <label for="iron"><strong>HOC3-std</strong></label>
            <input name="HOC3_std" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['HOC3_std']?>" required>
            <label for="iron"><strong>BE(B)</strong></label>
            <input name="BE_B" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['BE_B']?>" required>
            <label for="iron"><strong>tCO2</strong></label>
            <input name="tCO2" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['tCO2']?>" required>

            <label for="iron"><strong>Oxygen Status 37.0 °C</strong></label>
            <label for="iron"><strong>O2 SAT (est)</strong></label>
            <input name="O2_SAT_est" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['O2_SAT_est']?>" required>

            <label for="iron"><strong>Elecrtolytes</strong></label>
            <label for="iron"><strong>Na+</strong></label>
            <input name="Na" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['Na']?>" required>
            <label for="iron"><strong>K</strong></label>
            <input name="K" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['K']?>" required>
            <label for="iron"><strong>Cl-</strong></label>
            <input name="Cl" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['Cl']?>" required>
            <label for="iron"><strong>AnGap</strong></label>
            <input name="AnGap" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['AnGap']?>" required>

            <label for="iron"><strong>Metabolites</strong></label>
            <label for="iron"><strong>pAtm</strong></label>
            <input name="pAtm" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data1['pAtm']?>" required>

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