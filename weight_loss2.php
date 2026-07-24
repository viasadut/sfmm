<?php 
    session_start();
    require('db1.php');
	$role = $_SESSION['sess_userrole'];
	
$queryc = "SELECT COUNT(utype) FROM user where '$role' in ('mng','billin','staff','imo','doctor','ot','endo','bill','nurse','bed','emergency','mofficer','call','diet','physio')"; 

$resultc = mysqli_query($con, $queryc) or die(mysqli_error());
$rowc = mysqli_fetch_array($resultc);
$c1=$rowc['COUNT(utype)'];
	
    if(!isset($_SESSION['sess_username']) || $c1==0){
      header('Location: login2?err=2');
    }
?>


<?php
$url1=$_SERVER['REQUEST_URI'];
//header("Refresh: 5; URL=$url1");

header("Refresh: 5; URL=$url1");

$aa2=date('Y-m-d H:i:s');
$query881 = "SELECT COUNT(id) FROM oxygen_1 where atime2<'$aa2' and status='In-Use' "; 
	 
$result881 = mysqli_query($con, $query881) or die(mysqli_error());

// Print out result
$row881 = mysqli_fetch_array($result881);

$aa=$row881['COUNT(id)'];


?>

<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
//session_start();
require('db1.php');
//include("auth.php");
 
?>

<?php
$query87 = "SELECT COUNT(id) FROM bed where status='occupied'"; 
	 
$result87 = mysqli_query($con, $query87) or die(mysqli_error());

// Print out result
$row87 = mysqli_fetch_array($result87)
?>
<?php
$query88 = "SELECT COUNT(id) FROM bed where status='vacant'"; 
	 
$result88 = mysqli_query($con, $query88) or die(mysqli_error());

// Print out result
$row88 = mysqli_fetch_array($result88)
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style2.css">
<style type="text/css">
<!--
.style1 {
	font-size: x-large;
	font-weight: bold;
	font-style: italic;
}
-->
  <link rel="stylesheet" href="jsnew/bootstrap.min.css" />  
    <script src="jsnew/jjquery.min.js"></script>
    <script src="jsnew/bootstrap.min.js"></script>

   

<link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>

div1 {
    height: 40px;
    width: 30%;
    background-color: powderblue;
}


blink {
  -webkit-animation: 2s linear infinite condemned_blink_effect; /* for Safari 4.0 - 8.0 */
  animation: 2s linear infinite condemned_blink_effect;
}

/* for Safari 4.0 - 8.0 */
@-webkit-keyframes condemned_blink_effect {
  0% {
    visibility: hidden;
  }
  50% {
    visibility: hidden;
  }
  100% {
    visibility: visible;
  }
}

@keyframes condemned_blink_effect {
  10% {
    visibility: hidden;
  }
  50% {
    visibility: hidden;
  }
  100% {
    visibility: visible;
  }
}

.blink_img {
  animation: blinker 2s linear infinite;
  
}
@keyframes blinker {
  50% { opacity: 0; }
}
@keyframes blin {
  50% { opacity: 0; }
}




.button {
  background-color: #004A7F;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  border: none;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Arial;
  font-size: 20px;
  padding: 5px 5px;
  text-align: center;
  text-decoration: none;
  -webkit-animation: glowing 1500ms infinite;
  -moz-animation: glowing 1500ms infinite;
  -o-animation: glowing 1500ms infinite;
  animation: glowing 1500ms infinite;
}
@-webkit-keyframes glowing {
  0% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -webkit-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
}

@-moz-keyframes glowing {
  0% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -moz-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
}

@-o-keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}

@keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}
</style>


   <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>




</head>


<body>





<div id='cssmenu'>
<ul>
   <li><a href='inviewnew1'><span>Home</span></a></li>
   
   
   <li class='active has-sub'><a href='g_house_bed'><span>Guest House Room Management</span></a>
      
	  
   </li>
   
   
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<?php $number= $row87['COUNT(id)'] * 100 / $row88['COUNT(id)'] ;
$number1= round($number);
 ?>

<p align="center" class="style1">Weight Loss Program Calendar Management</p> 


   
   <!DOCTYPE html>
<html>
<head>
<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto auto auto;
  background-color: pink;
  padding: 0px;
  
}
.grid-item {
  background-color: #F778A1;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 0px;
  
  text-align: center;
  width:150px; /* or whatever width you want. */
   max-width:150px; /* or whatever width you want. */
   display: inline-block;
}

.grid-item1 {
  background-color: #77DD77;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 0px;
  
  text-align: center;
  width:250px; /* or whatever width you want. */
   max-width:250px; /* or whatever width you want. */
   display: inline-block;
}


.grid-item8 {
  background-color: #D462FF;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 0px;
  
  text-align: center;
  width:250px; /* or whatever width you want. */
   max-width:250px; /* or whatever width you want. */
   display: inline-block;
}



.grid-item2 {
  background-color: orange;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 0px;
  
  text-align: center;
  width:250px; /* or whatever width you want. */
   max-width:250px; /* or whatever width you want. */
   display: inline-block;
}

.grid-itemr {
  background-color: #FFCBA4	;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 0px;
  
  text-align: center;
  width:250px; /* or whatever width you want. */
   max-width:250px; /* or whatever width you want. */
   display: inline-block;
}


.grid-item3 {
  background-color: yellow;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 0px;
  
  text-align: center;
  width:250px; /* or whatever width you want. */
   max-width:250px; /* or whatever width you want. */
   display: inline-block;
}


.font1{
    font-family:serif;
	   font-size:30px;
	   
}
.font2{
    font-family:sans-serif;
	   font-size:16px;
	     font-weight:bold;
		 text-align:left;
}


.font3{
    font-family:sans-serif;
	   font-size:18px;
	     font-weight:bold;
		 text-align:left;
}

img{
        max-width: 20%;
        max-height: 20%;
        
		align: center;
    }
	
	
	.label {
  color: white;
  padding: 8px;
  font-family: Arial;
}
.success {background-color: #F778A1;} /* lightgreen */
.info {background-color: #77DD77;} /* Red */
.warning {background-color: orange;} /* Orange */
.danger {background-color: yellow;} /* Red */ 
.other {background-color: #D462FF; } /* Gray */ 
.oxy {background-color: #FFE5B4; } /* Gray */ 
.other2 {background-color: #FFCBA4	; } /* Gray */ 



</style>
</head>
<body>
  
<span class="label success" style="float:right;"><a href="weight_loss2">3rd Month</a></span>
<span class="label info"style="float:right;"><a  href="weight_loss1">2nd Month</a></span>
<span class="label warning"style="float:right;"><a  href="weight_lossn">1st Month</a></span>

<br>

<form action="" method="post">
 
		
		
		<table>

				
					
						
					 
</table>



 
 
<div class="grid-container">




  

  

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-61</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-62</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-63</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-64</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-65</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-66</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-67</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-68</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-69</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-70</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-71</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-72</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-73</span><br><br>
<span class='font2'></span><br><br>


</div>


<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-74</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-75</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-76</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-77</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-78</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-79</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-80</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-81</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-82</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-83</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-84</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-85</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-86</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-87</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-88</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-89</span><br><br>
<span class='font2'></span><br><br>


</div>

<div class='grid-item'>





<span class='font1'><a target='_blank' href='$url'></a>DAY-90</span><br><br>
<span class='font2'></span><br><br>


</div>
</div>
</form>

</body>

</html>



