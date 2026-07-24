<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) || $role!="lab"){
      header('Location: login2?err=2');
    }
?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//include("auth.php"); 
require('db1.php');







$user=$_SESSION['sess_username'];

//echo $rt ='test'.$user."<br />".'hhh:'.$user;
//echo $rt='test '.$user ;
//include("auth.php");
//echo $count1;
$id=$_REQUEST['id'];
$sno='O'.$id;
$pmrn=$_REQUEST['pmrn'];
$eid=$_REQUEST['eid'];


$query4 = mysqli_query($con,"select * from alltest where id='$id'");
$data = mysqli_fetch_assoc($query4);
$eid=$data['eid'];
$iname=$data['medi'];

$query5 = mysqli_query($con,"select * from pappnew where pmrn='$pmrn' and eid='$eid'");
$data1 = mysqli_fetch_assoc($query5);
  
?>


<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db1.php');

    if(isset($_POST['Submit'])){
        $pname = $_REQUEST['pname'];
        $pmrn = $_REQUEST['pmrn'];
        $pphone=$_REQUEST['pphone'];
        $page=$_REQUEST['page'];
        $psex=$_REQUEST['psex'];
        //$adate=$_REQUEST['adate'];

        $min0           =$_REQUEST['0min'];
        $min30          =$_REQUEST['30min'];
        $min60          =$_REQUEST['60min'];
        $interpretation =$_REQUEST['interpretation'];


        $adate= date('d/m/Y H:i:s');
        $adate1= date('m/d/Y');


        $rr='S. Cortisol at 0 min:'.$min0."<br />".'S. Cortisol at 30 min:'.$min30."<br />".'S. Cortisol at 60 min:'.$min60."<br />".'Interpretation:'.$interpretation;
        $rr1='S. Cortisol at 0 min:'.$min0."<br />".'S. Cortisol at 30 min:'.$min30."<br />".'S. Cortisol at 60 min:'.$min60."<br />".'Interpretation:'.$interpretation;


        $ins_query1="INSERT INTO lab_acth_stimulation (`pname`,`pmrn`,`pphone`,`psex`,`page`,`uby`,`udate`,`eid`,`iname`,`inid`,`sno`,`0min`,`30min`,`60min`,`interpretation`) values 
                    ('$pname','$pmrn','$pphone','$psex','$page','$user','$adate','$eid','$iname','$id','$sno','$min0','$min30','$min60','$interpretation')";
        mysqli_query($con,$ins_query1) or die(mysql_error());

        $update="update alltest set resultstatus='Updated By Technologist',resulttime='$adate',resultby='$user',result='$rr',result1='$rr1' where id='$id'";
        mysqli_query($con,$update) or die(mysql_error());

            echo '<script language="javascript">';
            echo 'alert("Update Successful"); ';
            echo '</script>';
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
    <script type="text/javascript" src="jquery-1.4.1.min.js"></script>
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
    </d'iv>
    <!-- Google Font -->
    <link href='jsnew/fonts' rel='stylesheet' type='text/css'>
    <form action="" method="post">
        <!-- Form Title -->
        <h1>	ACTH (Tetracosactrin 250 micrograms IM or IV Inj) Stimulation Test Report </h1>
        <fieldset>
            <legend></legend>
            <!-- Name Input -->
            <label for="age"><strong>Patient's Name :</strong></label>
            <input name="pname" type="text" size="70" style="text-transform:uppercase" value="<?php echo $data['pname']?>"required/>
            <label for="age"><strong>Patient's Details :</strong></label>
            <input name="psex" type="text" size="5"value="<?php echo $data['pgender']?>" required/>
            <input name="pmrn" type="text" size="15" value="<?php echo $data['pmrn']?>" required/>
            <input name="pphone" type="text" size="13" value="<?php echo $data['pphone']?>"  required/>	  
            <input name="page" type="text" size="2"value="<?php echo $data['page']?>" required/>

            <label for="age"><strong>S. Cortisol :</strong></label>
            <label for="iron"><strong>At 0 min:</strong></label>
            <input name="0min" type="text" size="70" style="text-transform:uppercase" required>
            <label for="tibc"><strong>At 30 min:</strong></label>
            <input name="30min" type="text" size="70" style="text-transform:uppercase" required>
            <label for="tibc"><strong>At 60 min:</strong></label>
            <input name="60min" type="text" size="70" style="text-transform:uppercase" required>
            <label for="tibc"><strong>Interpretation:</strong></label>
            <textarea name="interpretation" type="text" size="70" style="text-transform:uppercase" required>
            </textarea>
        </fieldset>
        <table>
            <tr>
                <td colspan="15"> <button type="submit" name="Submit">Confirm</button></td>
            </tr>
        </table>
    </form>
</body>
</html>