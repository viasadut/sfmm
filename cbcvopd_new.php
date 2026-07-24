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
    //include("auth.php");
    //echo $count1;
    // $id=$_REQUEST['id'];
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

    $time = date('d/m/Y H:i:s');
    
    $query4 = mysqli_query($con,"select * from alltest where id='$id'");
    $data = mysqli_fetch_assoc($query4);
    // $eid=$data['eid'];
    $iname=$data['medi'];
    // $pmrn=$data['pmrn'];
    $query5 = mysqli_query($con,"select * from cbctbl where inid='$id'");
    $data1 = mysqli_fetch_assoc($query5);
    $query6 = mysqli_query($con,"select * from pappnew where pmrn='$pmrn' and eid='$eid'");
    $data2 = mysqli_fetch_assoc($query6);
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
    $haemo=$_REQUEST['haemo'];
    $red=$_REQUEST['red'];
    $pcv=$_REQUEST['pcv'];
    $mcv=$_REQUEST['mcv'];
    $mch=$_REQUEST['mch'];
    $mchc=$_REQUEST['mchc'];
    $rdw=$_REQUEST['rdw'];
    $pla=$_REQUEST['pla'];
    $mpv=$_REQUEST['mpv'];
    $wbc=$_REQUEST['wbc'];
    $neu=$_REQUEST['neu'];
    $lym=$_REQUEST['lym'];
    $eos=$_REQUEST['eos'];
    $mono=$_REQUEST['mono'];
    $bas=$_REQUEST['bas'];
    $crea=$_REQUEST['crea'];
    $esr=$_REQUEST['esr'];
    $adate= date('d/m/Y H:i:s');
    $adate1= date('m/d/Y');
    $rr='Haemoglobin:'.$haemo."<br />".'Red Cell Count:'.$red."<br />".'Haematocrit:'.$pcv."<br />".'MCV:'.$mcv."<br />".'MCH:'.$mch."<br />".
    'MCHC:'.$mchc."<br />".'RDW:'.$rdw."<br />".'Platelet:'.$pla."<br />".'MPV:'.$mpv."<br />".'White Blood Cell Count:'.$wbc."<br />".
    'Neutrophil:'.$neu."<br />".'Lymphocyte:'.$lym."<br />".'Eosinophil:'.$eos."<br />".'Monocyte:'.$mono."<br />".'Basophil:'.$bas."<br />".'ESR:'.$esr;
    $rr1='Haemoglobin:'.$haemo.' '.'g/dL'."<br />".'Red Cell Count:'.$red.' '.'10^12/L'."<br />".'Haematocrit:'.$pcv.' '.'%'."<br />".'MCV:'.$mcv.' '.'fL'."<br />".'MCH:'.$mch.' '.'pg'."<br />".
    'MCHC:'.$mchc.' '.'g/dL'."<br />".'RDW:'.$rdw.' '.'%'."<br />".'Platelet:'.$pla.' '.'10^3/uL'."<br />".'MPV:'.$mpv.' '.'fL'."<br />".'White Blood Cell Count:'.$wbc.' '.'10^3/uL'."<br />".
    'Neutrophil:'.$neu.' '.'%'."<br />".'Lymphocyte:'.$lym.' '.'%'."<br />".'Eosinophil:'.$eos.' '.'%'."<br />".'Monocyte:'.$mono.' '.'%'."<br />".'Basophil:'.$bas.' '.'%'."<br />".'ESR:'.$esr.' '.'mm/h';
    
    $ins_query1="update cbctbl set `haemo`='$haemo',`red`='$red',`pcv`='$pcv',`mcv`='$mcv',`mch`='$mch',`mchc`='$mchc',`rdw`='$rdw',`pla`='$pla',`mpv`='$mpv',`wbc`='$wbc',`neu`='$neu',`lym`='$lym',`eos`='$eos',`mono`='$mono',`bas`='$bas',`crea`='$crea',`eby`='$user',`etime`='$time',`esr`='$esr' where sno='$sno'";
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
    <script type="text/javascript">
    $(document).ready(function() {
        $("#loding1").hide();
        $("#loding2").hide();
        $(".country").change(function() {
            $("#loding1").show();
            var id = $(this).val();
            var dataString = 'id=' + id;
            $(".state").find('option').remove();
            $(".city").find('option').remove();
            $.ajax({
                type: "POST",
                url: "get_state.php",
                data: dataString,
                cache: false,
                success: function(html) {
                    $("#loding1").hide();
                    $(".state").html(html);
                }
            });
        });
        $(".state").change(function() {
            $("#loding2").show();
            var id = $(this).val();
            var dataString = 'id=' + id;
            $.ajax({
                type: "POST",
                url: "get_city.php",
                data: dataString,
                cache: false,
                success: function(html) {
                    $("#loding2").hide();
                    $(".city").html(html);
                }
            });
        });
    });
    </script>
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
        <h1>CBC FORM </h1>
        <fieldset>
            <legend></legend>
            <!-- Name Input -->
            <label for="age"><strong>Patient's Name :</strong></label>
            <input name="pname" type="text" size="70" style="text-transform:uppercase"
                value="<?php echo $data['pname']?>" required>
            <label for="age"><strong>Patient's Details :</strong></label>
            <input name="psex" type="text" size="5" value="<?php echo $data['pgender']?>" required>
            <input name="pmrn" type="text" size="15" value="<?php echo $data['pmrn']?>" required>
            <input name="pphone" type="text" size="13" value="<?php echo $data['pphone']?>" required>
            <input name="page" type="text" size="2" value="<?php echo $data['page']?>" required>
            <label for="age"><strong>Haemoglobin:</strong></label>
     <?php
	  
	  if($data1['haemo']>=13 and $data1['haemo']<=18)
	  {
	  
	  echo '<input name="haemo" type="text" value="'.$data1["haemo"].'" id="haemo" required style="font-weight: bold;font-size:22px;color:green">';
	  }
	  else 
	  {
	  
	  echo '<input name="haemo" type="text" value="'.$data1["haemo"].'" id="haemo" required style="font-weight: bold;font-size:22px;color:red">';
	  }
	  ?>
	  
	  	  	  <script>
function f_color15(){
var myVal = parseInt(document.getElementById('haemo').value);
if (myVal > 18) {
document.getElementById('haemo').style.color = "red";
}

else if (myVal < 13) {
document.getElementById('haemo').style.color = "red";
}

else  {
document.getElementById('haemo').style.color = "green";
}

}
document.getElementById('haemo').onchange= f_color15;
</script>
	  
	  
	  <label for="age"><strong>Red Cell Count:</strong></label>
      <?php
	  
	  if($data1['red']>=4.5 and $data1['red']<=5.9)
	  {
	  
	  echo '<input name="red" type="text" value="'.$data1["red"].'" id="red" required style="font-weight: bold;font-size:22px;color:green">';
	  }
	  else 
	  {
	  
	  echo '<input name="red" type="text" value="'.$data1["red"].'" id="red" required style="font-weight: bold;font-size:22px;color:red">';
	  }
	  ?>
	  
	  	  <script>
function f_color14(){
var myVal = parseInt(document.getElementById('red').value);
if (myVal > 5.9) {
document.getElementById('red').style.color = "red";
}

else if (myVal < 4.5) {
document.getElementById('red').style.color = "red";
}

else  {
document.getElementById('red').style.color = "green";
}

}
document.getElementById('red').onchange= f_color14;
</script>
	  
	  
	  
	  <label for="age"><strong>Haematocrit:</strong></label>
       <?php
	  
	  if($data1['pcv']>=41 and $data1['pcv']<=53)
	  {
	  
	  echo '<input name="pcv" type="text" value="'.$data1["pcv"].'" id="pcv" required style="font-weight: bold;font-size:22px;color:green">';
	  }
	  else 
	  {
	  
	  echo '<input name="pcv" type="text" value="'.$data1["pcv"].'" id="pcv" required style="font-weight: bold;font-size:22px;color:red">';
	  }
	  ?>
	  
	  <script>
function f_color13(){
var myVal = parseInt(document.getElementById('pcv').value);
if (myVal > 53) {
document.getElementById('pcv').style.color = "red";
}

else if (myVal < 41) {
document.getElementById('pcv').style.color = "red";
}

else  {
document.getElementById('pcv').style.color = "green";
}

}
document.getElementById('pcv').onchange= f_color13;
</script>
	  
	  
	  <label for="age"><strong>MCV:</strong></label>
       <?php
	  
	  if($data1['mcv']>=76 and $data1['mcv']<=103)
	  {
	  
	  echo '<input name="mcv" type="text" value="'.$data1["mcv"].'" id="mcv" required style="font-weight: bold;font-size:22px;color:green">';
	  }
	  else 
	  {
	  
	  echo '<input name="mcv" type="text" value="'.$data1["mcv"].'" id="mcv" required style="font-weight: bold;font-size:22px;color:red">';
	  }
	  ?>
	  
	  <script>
function f_color12(){
var myVal = parseInt(document.getElementById('mcv').value);
if (myVal > 103) {
document.getElementById('mcv').style.color = "red";
}

else if (myVal < 76) {
document.getElementById('mcv').style.color = "red";
}

else  {
document.getElementById('mcv').style.color = "green";
}

}
document.getElementById('mcv').onchange= f_color12;
</script>
	  
	  
	  
	  <label for="age"><strong>MCH:</strong></label>
      <?php
	  
	  if($data1['mch']>=26 and $data1['mch']<=34)
	  {
	  
	  echo '<input name="mch" type="text" value="'.$data1["mch"].'" id="mch" required style="font-weight: bold;font-size:22px;color:green">';
	  }
	  else 
	  {
	  
	  echo '<input name="mch" type="text" value="'.$data1["mch"].'" id="mch" required style="font-weight: bold;font-size:22px;color:red">';
	  }
	  ?>
	  
	  <script>
function f_color11(){
var myVal = parseInt(document.getElementById('mch').value);
if (myVal > 34) {
document.getElementById('mch').style.color = "red";
}

else if (myVal < 26) {
document.getElementById('mch').style.color = "red";
}

else  {
document.getElementById('mch').style.color = "green";
}

}
document.getElementById('mch').onchange= f_color11;
</script>
	  
	  
	  
	  
	  <label for="age"><strong>MCHC:</strong></label>
       <?php
	  
	  if($data1['mchc']>=31 and $data1['mchc']<=36)
	  {
	  
	  echo '<input name="mchc" type="text" value="'.$data1["mchc"].'" id="mchc" required style="font-weight: bold;font-size:22px;color:green">';
	  }
	  else 
	  {
	  
	  echo '<input name="mchc" type="text" value="'.$data1["mchc"].'" id="mchc" required style="font-weight: bold;font-size:22px;color:red">';
	  }
	  ?>
	  
	  <script>
function f_color10(){
var myVal = parseInt(document.getElementById('mchc').value);
if (myVal > 36) {
document.getElementById('mchc').style.color = "red";
}

else if (myVal < 31) {
document.getElementById('mchc').style.color = "red";
}

else  {
document.getElementById('mchc').style.color = "green";
}

}
document.getElementById('mchc').onchange= f_color10;
</script>
	  
	  
	  
	  <label for="age"><strong>RDW:</strong></label>
      <?php
	  
	  if($data1['rdw']>=8 and $data1['rdw']<=14.6)
	  {
	  
	  echo '<input name="rdw" type="text" value="'.$data1["rdw"].'" id="rdw" required style="font-weight: bold;font-size:22px;color:green">';
	  }
	  else 
	  {
	  
	  echo '<input name="rdw" type="text" value="'.$data1["rdw"].'" id="rdw" required style="font-weight: bold;font-size:22px;color:red">';
	  }
	  ?>
	  
	  <script>
function f_color9(){
var myVal = parseInt(document.getElementById('rdw').value);
if (myVal > 14.6) {
document.getElementById('rdw').style.color = "red";
}

else if (myVal < 8) {
document.getElementById('rdw').style.color = "red";
}

else  {
document.getElementById('rdw').style.color = "green";
}

}
document.getElementById('rdw').onchange= f_color9;
</script>
	  
	  
	  
	  <label for="age"><strong>Platelet:</strong></label>
      <?php
	  
	  if($data1['pla']>=150 and $data1['pla']<=450)
	  {
	  
	  echo '<input name="pla" type="text" value="'.$data1["pla"].'" id="pla" required style="font-weight: bold;font-size:22px;color:green">';
	  }
	  else 
	  {
	  
	  echo '<input name="pla" type="text" value="'.$data1["pla"].'" id="pla" required style="font-weight: bold;font-size:22px;color:red">';
	  }
	  ?>
	  
	  <script>
function f_color8(){
var myVal = parseInt(document.getElementById('pla').value);
if (myVal > 450) {
document.getElementById('pla').style.color = "red";
}

else if (myVal < 150) {
document.getElementById('pla').style.color = "red";
}

else  {
document.getElementById('pla').style.color = "green";
}

}
document.getElementById('pla').onchange= f_color8;
</script>
	  <label for="age"><strong>MPV:</strong></label>
      <?php
	  
	  if($data1['mpv']>=5.8 and $data1['mpv']<=12)
	  {
	  
	  echo '<input name="mpv" type="text" value="'.$data1["mpv"].'" id="mpv" required style="font-weight: bold;font-size:22px;color:green">';
	  }
	  else 
	  {
	  
	  echo '<input name="mpv" type="text" value="'.$data1["mpv"].'" id="mpv" required style="font-weight: bold;font-size:22px;color:red">';
	  }
	  ?>
	  
	  <script>
function f_color7(){
var myVal = parseInt(document.getElementById('mpv').value);
if (myVal > 12) {
document.getElementById('mpv').style.color = "red";
}

else if (myVal < 5.8) {
document.getElementById('mpv').style.color = "red";
}

else  {
document.getElementById('mpv').style.color = "green";
}

}
document.getElementById('mpv').onchange= f_color7;
</script>
	  
	  
	 <label for="age"><strong>White Blood Cell Count:</strong></label>
     <?php
	  
	  if($data1['wbc']>=4.3 and $data1['wbc']<=10.5)
	  {
	  
	  echo '<input name="wbc" type="text" value="'.$data1["wbc"].'" id="wbc" required style="font-weight: bold;font-size:22px;color:green">';
	  }
	  else 
	  {
	  
	  echo '<input name="wbc" type="text" value="'.$data1["wbc"].'" id="wbc" required style="font-weight: bold;font-size:22px;color:red">';
	  }
	  ?>
	  
	  <script>
function f_color6(){
var myVal = parseInt(document.getElementById('wbc').value);
if (myVal > 10.5) {
document.getElementById('wbc').style.color = "red";
}

else if (myVal < 4.3) {
document.getElementById('wbc').style.color = "red";
}

else  {
document.getElementById('wbc').style.color = "green";
}

}
document.getElementById('wbc').onchange= f_color6;
</script>
	  
	  
	  
	  
	  <label for="age"><strong>Neutrophil:</strong></label>
      <?php
	  
	  if($data1['neu']>=40 and $data1['neu']<=75)
	  {
	  
	  echo '<input name="neu" type="text" value="'.$data1["neu"].'" id="neu" required style="font-weight: bold;font-size:22px;color:green">';
	  }
	  else 
	  {
	  
	  echo '<input name="neu" type="text" value="'.$data1["neu"].'" id="neu" required style="font-weight: bold;font-size:22px;color:red">';
	  }
	  ?>
	  
	  <script>
function f_color5(){
var myVal = parseInt(document.getElementById('neu').value);
if (myVal > 75) {
document.getElementById('neu').style.color = "red";
}

else if (myVal < 40) {
document.getElementById('neu').style.color = "red";
}

else  {
document.getElementById('neu').style.color = "green";
}

}
document.getElementById('neu').onchange= f_color5;
</script>
	  
	  
	  <label for="age"><strong>Lymphocyte:</strong></label>
      <?php
	  
	  if($data1['lym']>=20 and $data1['lym']<=45)
	  {
	  
	  echo '<input name="lym" type="text" value="'.$data1["lym"].'" id="lym" required style="font-weight: bold;font-size:22px;color:green">';
	  }
	  else 
	  {
	  
	  echo '<input name="lym" type="text" value="'.$data1["lym"].'" id="lym" required style="font-weight: bold;font-size:22px;color:red">';
	  }
	  ?>
	  
	  <script>
function f_color4(){
var myVal = parseInt(document.getElementById('lym').value);
if (myVal > 45) {
document.getElementById('lym').style.color = "red";
}

else if (myVal < 20) {
document.getElementById('lym').style.color = "red";
}

else  {
document.getElementById('lym').style.color = "green";
}

}
document.getElementById('lym').onchange= f_color4;
</script>
	  
	  
	  <label for="age"><strong>Eosinophil:</strong></label>
      <?php
	  
	  if($data1['eos']>=0 and $data1['eos']<=6)
	  {
	  
	  echo '<input name="eos" type="text" value="'.$data1["eos"].'" id="eos" required style="font-weight: bold;font-size:22px;color:green">';
	  }
	  else 
	  {
	  
	  echo '<input name="eos" type="text" value="'.$data1["eos"].'" id="eos" required style="font-weight: bold;font-size:22px;color:red">';
	  }
	  ?>
	  
	  <script>
function f_color3(){
var myVal = parseInt(document.getElementById('eos').value);
if (myVal > 6) {
document.getElementById('eos').style.color = "red";
}

else if (myVal < 0) {
document.getElementById('eos').style.color = "red";
}

else  {
document.getElementById('eos').style.color = "green";
}

}
document.getElementById('eos').onchange= f_color3;
</script>
	  
	  
	  <label for="age"><strong>Monocyte:</strong></label>
      <?php
	  
	  if($data1['mono']>=1 and $data1['mono']<=11)
	  {
	  
	  echo '<input name="mono" type="text" value="'.$data1["mono"].'" id="mono" required style="font-weight: bold;font-size:22px;color:green">';
	  }
	  else 
	  {
	  
	  echo '<input name="mono" type="text" value="'.$data1["mono"].'" id="mono" required style="font-weight: bold;font-size:22px;color:red">';
	  }
	  ?>
	  
	  
	  	  <script>
function f_color2(){
var myVal = parseInt(document.getElementById('mono').value);
if (myVal > 11) {
document.getElementById('mono').style.color = "red";
}

else if (myVal < 1) {
document.getElementById('mono').style.color = "red";
}

else  {
document.getElementById('mono').style.color = "green";
}

}
document.getElementById('mono').onchange= f_color2;
</script>

	  <label for="age"><strong>Basophil:</strong></label>
      <?php
	  
	  if($data1['bas']>=0 and $data1['bas']<=2)
	  {
	  
	  echo '<input name="bas" type="text" value="'.$data1["bas"].'" id="bas" required style="font-weight: bold;font-size:22px;color:green">';
	  }
	  else 
	  {
	  
	  echo '<input name="bas" type="text" value="'.$data1["bas"].'" id="bas" required style="font-weight: bold;font-size:22px;color:red">';
	  }
	  ?>
	  
	  <script>
function f_color1(){
var myVal = parseInt(document.getElementById('bas').value);
if (myVal > 2) {
document.getElementById('bas').style.color = "red";
}

else if (myVal < 0) {
document.getElementById('bas').style.color = "red";
}

else  {
document.getElementById('bas').style.color = "green";
}

}
document.getElementById('bas').onchange= f_color1;
</script>

	  
	  
	  <label for="age"><strong>ESR:</strong></label>
      
	  
	 

      <?php
	  
	  if($data1['esr']>0 and $data1['esr']<20)
	  {
	  
	  echo '<input name="esr" type="text" value="'.$data1["esr"].'" id="esr" required style="font-weight: bold;font-size:22px;color:green">';
	  }
	  else 
	  {
	  
	  echo '<input name="esr" type="text" value="'.$data1["esr"].'" id="esr" required style="font-weight: bold;font-size:22px;color:red">';
	  }
	  ?>

<script>
function f_color(){
var myVal = parseInt(document.getElementById('esr').value);
if (myVal > 20) {
document.getElementById('esr').style.color = "red";
}

else if (myVal < 0) {
document.getElementById('esr').style.color = "red";
}

else  {
document.getElementById('esr').style.color = "green";
}

}
document.getElementById('esr').onchange= f_color;
</script>

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