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

 
</style>


   <link rel="stylesheet" href="styles.css">

   <script src="script.js"></script>




</head>


<body>





<div id='cssmenu'>
<ul>
   <li><a href='inviewnew1'><span>Home</span></a></li>
   <li class='active has-sub'><a href='#'><span>Patients</span></a>
      <ul>
         <li class='has-sub'><a href='psadmin'><span>Patient Search By MRN</span></a>
            
         </li>
         <li class='has-sub'><a href='gg3new'><span>Manual Admission</span></a>
            
         </li>
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Discharge</span></a>
      <ul>
         <li class='has-sub'><a href='dcview'><span>Discharge Request By Cnsultants</span></a>
            
         </li>
         <li class='has-sub'><a href='mpsadmin'><span>Manual Discharge</span></a>
            
         </li>
		 <li class='has-sub'><a href='dischargeview'><span>Print Discharge Report</span></a>
            
         </li>
		 
      </ul>
	  
   </li>
   
   <li class='active has-sub'><a href='#'><span>Bed Management</span></a>
      <ul>
         <li class='has-sub'><a href='bedview'><span>All Bed Status</span></a>
            
         </li>
         <li class='has-sub'><a href='tes7'><span>Detail History</span></a>
            
         </li>
		          <li class='has-sub'><a href='tes77'><span>Detail History Episodewise</span></a>
            
         </li>

		 
      </ul>
	  
   </li>
   
   <li class='last'><a href='logout'><span>LOGOUT</span></a></li>
</ul>
</div>

<?php $number= $row87['COUNT(id)'] * 100 / $row88['COUNT(id)'] ;
$number1= round($number);
 ?>

<p align="center" class="style1">Month Wise Roaster System</p> 


   
   <!DOCTYPE html>
<html>
<head>
<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto auto;
  background-color: pink;
  padding: 10px;
  
}
.grid-item {
  background-color: #F778A1;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  
  text-align: center;
  width:250px; /* or whatever width you want. */
   max-width:250px; /* or whatever width you want. */
   display: inline-block;
}

.grid-item1 {
  background-color: #77DD77;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  
  text-align: center;
  width:250px; /* or whatever width you want. */
   max-width:250px; /* or whatever width you want. */
   display: inline-block;
}

.grid-item5 {
  background-color: #BAB86C;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  
  text-align: center;
  width:250px; /* or whatever width you want. */
   max-width:250px; /* or whatever width you want. */
   display: inline-block;
}


.grid-item8 {
  background-color: #FF0000;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  
  text-align: center;
  width:250px; /* or whatever width you want. */
   max-width:250px; /* or whatever width you want. */
   display: inline-block;
}



.grid-item2 {
  background-color: #3CB371	;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  
  text-align: center;
  width:250px; /* or whatever width you want. */
   max-width:250px; /* or whatever width you want. */
   display: inline-block;
}


.grid-item3 {
  background-color: #800517;
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  
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
        max-height:10%;
        
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




</style>
</head>



<?php
// Your code here!
for ($m=1; $m<=12; $m++) {
     $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
     //$month;
	 	 $jan=date('Y-01-01');
		 $jan1=date('Y-01-');
		 
		 $feb=date('Y-02-01');
		 $feb1=date('Y-02-');
		 
		 $mar=date('Y-03-01');
		 $mar1=date('Y-03-');
		 
		 $apr=date('Y-04-01');
		 $apr1=date('Y-04-');
		 
		 $may=date('Y-05-01');
		 $may1=date('Y-05-');
		 
		 $jun=date('Y-06-01');
		 $jun1=date('Y-06-');
		 
		 $jul=date('Y-07-01');
		 $jul1=date('Y-07-');
		 
		 $aug=date('Y-08-01');
		 $aug1=date('Y-08-');
		 
		 
		 $sep=date('Y-09-01');
		 $sep1=date('Y-09-');
		 
		 $oct=date('Y-10-01');
		 $oct=date('Y-10-');
		 
		 $nov=date('Y-11-01');
		 $nov1=date('Y-11-');
		 
		 $dec=date('Y-12-01');
		 $dec1=date('Y-12-');
		 
		 $url = "roaster_details1?id=$jan&id1=$jan1"; 
		 $url2 = "roaster_details1?id=$feb&id1=$feb1"; 
		 $url3 = "roaster_details1?id=$mar&id1=$mar1"; 
		 $url4 = "roaster_details1?id=$apr&id1=$apr1"; 
		 $url5 = "roaster_details1?id=$may&id1=$may1"; 
		 $url6 = "roaster_details1?id=$jun&id1=$jun1"; 
		 $url7 = "roaster_details1?id=$jul&id1=$jul1"; 
		 $url8 = "roaster_details1?id=$aug&id1=$aug1"; 
		 $url9 = "roaster_details1?id=$sep&id1=$sep1"; 
		 $url10 = "roaster_details1?id=$otc&id1=$oct1"; 
		 $url11 = "roaster_details1?id=$nov&id1=$nov1"; 
		 $url12 = "roaster_details1?id=$dec&id1=$dec1"; 
		 
		 
		 
	 
	 if($month=='January')
	 {
	 
	 echo "<a target='_blank' href='$url'><img src='month/jan.jpg'></a>";
	 }
	 
	else if($month=='February')
	 {
	 
	 echo "<a target='_blank' href='$url2'><img src='month/feb.jpg'></a>";
	 }
	 
	 else if($month=='March')
	 {
	 
	 echo "<a target='_blank' href='$url3'><img src='month/mar.jpg'></a>";
	 }
	 
	 else if($month=='April')
	 {
	 
	 echo "<a target='_blank' href='$url4'><img src='month/apr.jpg'></a>";
	 }
	 
	 else if($month=='May')
	 {
	 
	 echo "<a target='_blank' href='$url5'><img src='month/may.jpg'></a>";
	 }
	 
	 else if($month=='June')
	 {
	 
	 echo "<a target='_blank' href='$url6'><img src='month/june.jpg'></a>";
	 }
	 
	 else if($month=='July')
	 {
	 
	 echo "<a target='_blank' href='$url7'><img src='month/kuly.jpg'></a>";
	 }
	 
	 
	 
	 else if($month=='August')
	 {
	 
	 echo "<a target='_blank' href='$url8'><img src='month/august.jpg'></a>";
	 }
	 
	 
	 else if($month=='September')
	 {
	 
	 echo "<a target='_blank' href='$url9'><img src='month/sep.jpg'></a>";
	 }
	 
	 
	 else if($month=='October')
	 {
	 
	 echo "<a target='_blank' href='$url10'><img src='month/october.jpg'></a>";
	 }
	 
	 
	 
	 else if($month=='November')
	 {
	 
	 echo "<a target='_blank' href='$url11'><img src='month/nov.jpg'></a>";
	 }
	 
	 
	 else if($month=='December')
	 {
	 
	 echo "<a target='_blank' href='$url12'><img src='month/dec.jpg'></a>";
	 }
	 
     }

	
	 

	 
	 ?>

