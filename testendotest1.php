<?php
//require('force_justify.php');
//require('fpdf/fpdf.php');


require('force_justify.php');
$link = mysqli_connect('localhost','root','Godiloveu16','sfmmkpjnew');
//$pmrn=$_REQUEST['pmrn'];
//$dname=$_REQUEST['dname'];
$start=$_REQUEST['date'];
$end=$_REQUEST['date1'];
//$eid=$_REQUEST['eid'];
$dd=date('m/d/Y');
$query2 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='ENDOSCOPY OF UPPER GIT' and rdate BETWEEN '$start' and '$end'" );
$data2 = mysqli_fetch_array($query2);

$query3 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='ENDOSCOPY OF UPPER GIT' and rdate BETWEEN '$start' and '$end'" );
$data3 = mysqli_fetch_array($query3);

$query4 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='ENDOSCOPY OF UPPER GIT' and rdate BETWEEN '$start' and '$end'" );
$data4 = mysqli_fetch_array($query4);

$query5 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='ENDOSCOPY OF UPPER GIT' and rdate BETWEEN '$start' and '$end'" );
$data5 = mysqli_fetch_array($query5);

$query6 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='ENDOSCOPY OF UPPER GIT' and rdate BETWEEN '$start' and '$end'" );
$data6 = mysqli_fetch_array($query6);

$query7 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='ENDOSCOPY OF UPPER GIT' and rdate BETWEEN '$start' and '$end'" );
$data7 = mysqli_fetch_array($query7);


$sum1=$data2['count(*)']+$data3['count(*)']+$data4['count(*)']+$data5['count(*)']+$data6['count(*)']+$data7['count(*)'];


$query8 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='COLONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data8 = mysqli_fetch_array($query8);

$query9 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='COLONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data9 = mysqli_fetch_array($query9);

$query10 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='COLONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data10 = mysqli_fetch_array($query10);

$query11 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='COLONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data11 = mysqli_fetch_array($query11);

$query12 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='COLONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data12 = mysqli_fetch_array($query12);

$query13 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='COLONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data13 = mysqli_fetch_array($query13);


$sum2=$data8['count(*)']+$data9['count(*)']+$data10['count(*)']+$data11['count(*)']+$data12['count(*)']+$data13['count(*)'];


$query14 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='SIGMOIDOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data14 = mysqli_fetch_array($query14);

$query15 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='SIGMOIDOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data15 = mysqli_fetch_array($query15);

$query16 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='SIGMOIDOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data16 = mysqli_fetch_array($query16);

$query17 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='SIGMOIDOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data17 = mysqli_fetch_array($query17);

$query18 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='SIGMOIDOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data18 = mysqli_fetch_array($query18);

$query19 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='SIGMOIDOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data19 = mysqli_fetch_array($query19);



$sum3=$data14['count(*)']+$data15['count(*)']+$data16['count(*)']+$data17['count(*)']+$data18['count(*)']+$data19['count(*)'];


$query118 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='POLYPECTOMY' and rdate BETWEEN '$start' and '$end'" );
$data118 = mysqli_fetch_array($query118);

$query119 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='POLYPECTOMY' and rdate BETWEEN '$start' and '$end'" );
$data119 = mysqli_fetch_array($query119);

$query20 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='POLYPECTOMY' and rdate BETWEEN '$start' and '$end'" );
$data20 = mysqli_fetch_array($query20);


$query21 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='POLYPECTOMY' and rdate BETWEEN '$start' and '$end'" );
$data21 = mysqli_fetch_array($query21);

$query22 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='POLYPECTOMY' and rdate BETWEEN '$start' and '$end'" );
$data22 = mysqli_fetch_array($query22);

$query23 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='POLYPECTOMY' and rdate BETWEEN '$start' and '$end'" );
$data23 = mysqli_fetch_array($query23);



$sum4=$data118['count(*)']+$data119['count(*)']+$data20['count(*)']+$data21['count(*)']+$data22['count(*)']+$data23['count(*)'];


$query24 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='CYSTOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data24 = mysqli_fetch_array($query24);

$query25 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='FLEXIBLE CYSTOSCOPY UNDER LA' and rdate BETWEEN '$start' and '$end'" );
$data25 = mysqli_fetch_array($query25);

$query26 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='CYSTOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data26 = mysqli_fetch_array($query26);


$query27 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='CYSTOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data27 = mysqli_fetch_array($query27);

$query28 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='CYSTOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data28 = mysqli_fetch_array($query28);

$query29 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='CYSTOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data29 = mysqli_fetch_array($query29);



$sum5=$data24['count(*)']+$data25['count(*)']+$data26['count(*)']+$data27['count(*)']+$data28['count(*)']+$data29['count(*)'];


$query30 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='DJ. STENT REMOVE' and rdate BETWEEN '$start' and '$end'" );
$data30 = mysqli_fetch_array($query30);

$query31 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='DJ. STENT REMOVE' and rdate BETWEEN '$start' and '$end'" );
$data31 = mysqli_fetch_array($query31);

$query32 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='DJ. STENT REMOVE' and rdate BETWEEN '$start' and '$end'" );
$data32 = mysqli_fetch_array($query32);


$query33 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='DJ. STENT REMOVE' and rdate BETWEEN '$start' and '$end'" );
$data33 = mysqli_fetch_array($query33);

$query34 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='DJ. STENT REMOVE' and rdate BETWEEN '$start' and '$end'" );
$data34 = mysqli_fetch_array($query34);

$query35 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='DJ. STENT REMOVE' and rdate BETWEEN '$start' and '$end'" );
$data35 = mysqli_fetch_array($query35);



$sum6=$data30['count(*)']+$data31['count(*)']+$data32['count(*)']+$data33['count(*)']+$data33['count(*)']+$data35['count(*)'];


$query36 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='F.B REMOVE' and rdate BETWEEN '$start' and '$end'" );
$data36 = mysqli_fetch_array($query36);

$query37 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='F.B REMOVE' and rdate BETWEEN '$start' and '$end'" );
$data37 = mysqli_fetch_array($query37);

$query38 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='F.B REMOVE' and rdate BETWEEN '$start' and '$end'" );
$data38 = mysqli_fetch_array($query38);


$query39 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='F.B REMOVE' and rdate BETWEEN '$start' and '$end'" );
$data39 = mysqli_fetch_array($query39);

$query40 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='F.B REMOVE' and rdate BETWEEN '$start' and '$end'" );
$data40 = mysqli_fetch_array($query40);

$query41 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='F.B REMOVE' and rdate BETWEEN '$start' and '$end'" );
$data41 = mysqli_fetch_array($query41);



$sum7=$data36['count(*)']+$data37['count(*)']+$data38['count(*)']+$data39['count(*)']+$data40['count(*)']+$data41['count(*)'];


$query42 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='FOL' and rdate BETWEEN '$start' and '$end'" );
$data42 = mysqli_fetch_array($query42);

$query43 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='FOL' and rdate BETWEEN '$start' and '$end'" );
$data43 = mysqli_fetch_array($query43);

$query44 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='FOL' and rdate BETWEEN '$start' and '$end'" );
$data44 = mysqli_fetch_array($query44);


$query45 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='FOL' and rdate BETWEEN '$start' and '$end'" );
$data45 = mysqli_fetch_array($query45);

$query46 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='FOL' and rdate BETWEEN '$start' and '$end'" );
$data46 = mysqli_fetch_array($query46);

$query47 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='FOL' and rdate BETWEEN '$start' and '$end'" );
$data47 = mysqli_fetch_array($query47);



$sum8=$data42['count(*)']+$data43['count(*)']+$data44['count(*)']+$data45['count(*)']+$data46['count(*)']+$data47['count(*)'];

$query48 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='UROFLOWMETRY' and rdate BETWEEN '$start' and '$end'" );
$data48 = mysqli_fetch_array($query48);

$query49 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='UROFLOWMETRY' and rdate BETWEEN '$start' and '$end'" );
$data49 = mysqli_fetch_array($query49);

$query50 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='UROFLOWMETRY' and rdate BETWEEN '$start' and '$end'" );
$data50 = mysqli_fetch_array($query50);


$query51 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='UROFLOWMETRY' and rdate BETWEEN '$start' and '$end'" );
$data51 = mysqli_fetch_array($query51);

$query52 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='UROFLOWMETRY' and rdate BETWEEN '$start' and '$end'" );
$data52 = mysqli_fetch_array($query52);

$query53 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='UROFLOWMETRY' and rdate BETWEEN '$start' and '$end'" );
$data53 = mysqli_fetch_array($query53);



$sum9=$data48['count(*)']+$data49['count(*)']+$data50['count(*)']+$data51['count(*)']+$data52['count(*)']+$data53['count(*)'];



$query54 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='ERCP SCREENING' and rdate BETWEEN '$start' and '$end'" );
$data54 = mysqli_fetch_array($query54);

$query55 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='ERCP SCREENING' and rdate BETWEEN '$start' and '$end'" );
$data55 = mysqli_fetch_array($query55);

$query56 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='ERCP SCREENING' and rdate BETWEEN '$start' and '$end'" );
$data56 = mysqli_fetch_array($query56);


$query57 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='ERCP SCREENING' and rdate BETWEEN '$start' and '$end'" );
$data57 = mysqli_fetch_array($query57);

$query58 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='ERCP SCREENING' and rdate BETWEEN '$start' and '$end'" );
$data58 = mysqli_fetch_array($query58);

$query59 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='ERCP SCREENING' and rdate BETWEEN '$start' and '$end'" );
$data59 = mysqli_fetch_array($query59);



$sum10=$data54['count(*)']+$data55['count(*)']+$data56['count(*)']+$data57['count(*)']+$data58['count(*)']+$data59['count(*)'];



$query60 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='EVL' and rdate BETWEEN '$start' and '$end'" );
$data60 = mysqli_fetch_array($query60);

$query61 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='EVL' and rdate BETWEEN '$start' and '$end'" );
$data61 = mysqli_fetch_array($query61);

$query62 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='EVL' and rdate BETWEEN '$start' and '$end'" );
$data62 = mysqli_fetch_array($query62);


$query63 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='EVL' and rdate BETWEEN '$start' and '$end'" );
$data63 = mysqli_fetch_array($query63);

$query64 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='EVL' and rdate BETWEEN '$start' and '$end'" );
$data64 = mysqli_fetch_array($query64);

$query65 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='EVL' and rdate BETWEEN '$start' and '$end'" );
$data65 = mysqli_fetch_array($query65);



$sum11=$data60['count(*)']+$data61['count(*)']+$data62['count(*)']+$data63['count(*)']+$data64['count(*)']+$data65['count(*)'];



$query66 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='DUDONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data66 = mysqli_fetch_array($query66);

$query67 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='DUDONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data67 = mysqli_fetch_array($query67);

$query68 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='EDUDONOSCOPYVL' and rdate BETWEEN '$start' and '$end'" );
$data68 = mysqli_fetch_array($query68);


$query69 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='DUDONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data69 = mysqli_fetch_array($query69);

$query70 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='DUDONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data70 = mysqli_fetch_array($query70);

$query71 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='DUDONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data71 = mysqli_fetch_array($query71);


$query72 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='DUDONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data72 = mysqli_fetch_array($query72);

$query73 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='DUDONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data73 = mysqli_fetch_array($query73);


$sum12=$data66['count(*)']+$data67['count(*)']+$data68['count(*)']+$data69['count(*)']+$data70['count(*)']+$data71['count(*)'];



$query74 = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Mohammad Sana Ullah Sarker' and type='BRONCHOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data74 = mysqli_fetch_array($query74);







$query42a = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='ENDOSCOPY AND COLONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data42a = mysqli_fetch_array($query42a);

$query43a = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='ENDOSCOPY AND COLONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data43a = mysqli_fetch_array($query43a);

$query44a = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='ENDOSCOPY AND COLONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data44a = mysqli_fetch_array($query44a);


$query45a = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='ENDOSCOPY AND COLONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data45a = mysqli_fetch_array($query45a);

$query46a = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='ENDOSCOPY AND COLONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data46a = mysqli_fetch_array($query46a);

$query47a = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='ENDOSCOPY AND COLONOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data47a = mysqli_fetch_array($query47a);



$sum8a=$data42a['count(*)']+$data43a['count(*)']+$data44a['count(*)']+$data45a['count(*)']+$data46a['count(*)']+$data47a['count(*)'];




$query42b = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='ENDOSCOPY AND SIGMOIDOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data42b = mysqli_fetch_array($query42b);

$query43b = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='ENDOSCOPY AND SIGMOIDOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data43b = mysqli_fetch_array($query43b);

$query44b = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='ENDOSCOPY AND SIGMOIDOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data44b = mysqli_fetch_array($query44b);


$query45b = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='ENDOSCOPY AND SIGMOIDOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data45b = mysqli_fetch_array($query45b);

$query46b = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='ENDOSCOPY AND SIGMOIDOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data46b = mysqli_fetch_array($query46b);

$query47b = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='ENDOSCOPY AND SIGMOIDOSCOPY' and rdate BETWEEN '$start' and '$end'" );
$data47b = mysqli_fetch_array($query47b);



$sum8b=$data42b['count(*)']+$data43b['count(*)']+$data44b['count(*)']+$data45b['count(*)']+$data46b['count(*)']+$data47b['count(*)'];




$query42c = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='Ploypectomy' and rdate BETWEEN '$start' and '$end'" );
$data42c = mysqli_fetch_array($query42c);

$query43c = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='Ploypectomy' and rdate BETWEEN '$start' and '$end'" );
$data43c = mysqli_fetch_array($query43c);

$query44c = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='Ploypectomy' and rdate BETWEEN '$start' and '$end'" );
$data44c = mysqli_fetch_array($query44c);


$query45c = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='Ploypectomy' and rdate BETWEEN '$start' and '$end'" );
$data45c = mysqli_fetch_array($query45c);

$query46c = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='Ploypectomy' and rdate BETWEEN '$start' and '$end'" );
$data46c = mysqli_fetch_array($query46c);

$query47c = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='Ploypectomy' and rdate BETWEEN '$start' and '$end'" );
$data47c = mysqli_fetch_array($query47c);



$sum8c=$data42c['count(*)']+$data43c['count(*)']+$data44c['count(*)']+$data45c['count(*)']+$data46c['count(*)']+$data47c['count(*)'];



$query42d = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='Dilatation' and rdate BETWEEN '$start' and '$end'" );
$data42d = mysqli_fetch_array($query42d);

$query43d = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='Dilatation' and rdate BETWEEN '$start' and '$end'" );
$data43d = mysqli_fetch_array($query43d);

$query44d = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='Dilatation' and rdate BETWEEN '$start' and '$end'" );
$data44d = mysqli_fetch_array($query44d);


$query45d = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='Dilatation' and rdate BETWEEN '$start' and '$end'" );
$data45d = mysqli_fetch_array($query45d);

$query46d = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='Dilatation' and rdate BETWEEN '$start' and '$end'" );
$data46d = mysqli_fetch_array($query46d);

$query47d = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='Dilatation' and rdate BETWEEN '$start' and '$end'" );
$data47d = mysqli_fetch_array($query47d);



$sum8d=$data42d['count(*)']+$data43d['count(*)']+$data44d['count(*)']+$data45d['count(*)']+$data46d['count(*)']+$data47d['count(*)'];


$query42e = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='Early GI cancer screening' and rdate BETWEEN '$start' and '$end'" );
$data42e = mysqli_fetch_array($query42e);

$query43e = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='Early GI cancer screening' and rdate BETWEEN '$start' and '$end'" );
$data43e = mysqli_fetch_array($query43e);

$query44e = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='Early GI cancer screening' and rdate BETWEEN '$start' and '$end'" );
$data44e = mysqli_fetch_array($query44e);


$query45e = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='Early GI cancer screening' and rdate BETWEEN '$start' and '$end'" );
$data45e = mysqli_fetch_array($query45e);

$query46e = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='Early GI cancer screening' and rdate BETWEEN '$start' and '$end'" );
$data46e = mysqli_fetch_array($query46e);

$query47e = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='Early GI cancer screening' and rdate BETWEEN '$start' and '$end'" );
$data47e = mysqli_fetch_array($query47e);



$sum8e=$data42e['count(*)']+$data43e['count(*)']+$data44e['count(*)']+$data45e['count(*)']+$data46e['count(*)']+$data47e['count(*)'];



$query42f = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='Oesophageal pneumatic balloon dilation' and rdate BETWEEN '$start' and '$end'" );
$data42f = mysqli_fetch_array($query42f);

$query43f = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='Oesophageal pneumatic balloon dilation' and rdate BETWEEN '$start' and '$end'" );
$data43f = mysqli_fetch_array($query43f);

$query44f = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='Oesophageal pneumatic balloon dilation' and rdate BETWEEN '$start' and '$end'" );
$data44f = mysqli_fetch_array($query44f);


$query45f = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='Oesophageal pneumatic balloon dilation' and rdate BETWEEN '$start' and '$end'" );
$data45f = mysqli_fetch_array($query45f);

$query46f = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='Oesophageal pneumatic balloon dilation' and rdate BETWEEN '$start' and '$end'" );
$data46f = mysqli_fetch_array($query46f);

$query47f = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='Oesophageal pneumatic balloon dilation' and rdate BETWEEN '$start' and '$end'" );
$data47f = mysqli_fetch_array($query47f);



$sum8f=$data42f['count(*)']+$data43f['count(*)']+$data44f['count(*)']+$data45f['count(*)']+$data46f['count(*)']+$data47f['count(*)'];


$query42g = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='Oesophageal CRE balloon dilation' and rdate BETWEEN '$start' and '$end'" );
$data42g = mysqli_fetch_array($query42g);

$query43g = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='Oesophageal CRE balloon dilation' and rdate BETWEEN '$start' and '$end'" );
$data43g = mysqli_fetch_array($query43g);

$query44g = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='Oesophageal CRE balloon dilation' and rdate BETWEEN '$start' and '$end'" );
$data44g = mysqli_fetch_array($query44g);


$query45g = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='Oesophageal CRE balloon dilation' and rdate BETWEEN '$start' and '$end'" );
$data45g = mysqli_fetch_array($query45g);

$query46g = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='Oesophageal CRE balloon dilation' and rdate BETWEEN '$start' and '$end'" );
$data46g = mysqli_fetch_array($query46g);

$query47g = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='Oesophageal CRE balloon dilation' and rdate BETWEEN '$start' and '$end'" );
$data47g = mysqli_fetch_array($query47g);



$sum8g=$data42g['count(*)']+$data43g['count(*)']+$data44g['count(*)']+$data45g['count(*)']+$data46g['count(*)']+$data47g['count(*)'];



$query42h = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='Foreign body removal' and rdate BETWEEN '$start' and '$end'" );
$data42h= mysqli_fetch_array($query42h);

$query43h = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='Foreign body removal' and rdate BETWEEN '$start' and '$end'" );
$data43h = mysqli_fetch_array($query43h);

$query44h = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='Foreign body removal' and rdate BETWEEN '$start' and '$end'" );
$data44h = mysqli_fetch_array($query44h);


$query45h = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='Foreign body removal' and rdate BETWEEN '$start' and '$end'" );
$data45h = mysqli_fetch_array($query45h);

$query46h = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='Foreign body removal' and rdate BETWEEN '$start' and '$end'" );
$data46h = mysqli_fetch_array($query46h);

$query47h = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='Foreign body removal' and rdate BETWEEN '$start' and '$end'" );
$data47h = mysqli_fetch_array($query47h);



$sum8h=$data42h['count(*)']+$data43h['count(*)']+$data44h['count(*)']+$data45h['count(*)']+$data46h['count(*)']+$data47h['count(*)'];


$query42i = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='ESD' and rdate BETWEEN '$start' and '$end'" );
$data42i= mysqli_fetch_array($query42i);

$query43i = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='ESD' and rdate BETWEEN '$start' and '$end'" );
$data43i = mysqli_fetch_array($query43i);

$query44i = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='ESD' and rdate BETWEEN '$start' and '$end'" );
$data44i = mysqli_fetch_array($query44i);


$query45i = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='ESD' and rdate BETWEEN '$start' and '$end'" );
$data45i = mysqli_fetch_array($query45i);

$query46i = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='ESD' and rdate BETWEEN '$start' and '$end'" );
$data46i = mysqli_fetch_array($query46i);

$query47i = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='ESD' and rdate BETWEEN '$start' and '$end'" );
$data47i = mysqli_fetch_array($query47i);



$sum8i=$data42i['count(*)']+$data43i['count(*)']+$data44i['count(*)']+$data45i['count(*)']+$data46i['count(*)']+$data47i['count(*)'];


$query42j = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='EMR' and rdate BETWEEN '$start' and '$end'" );
$data42j= mysqli_fetch_array($query42j);

$query43j = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='EMR' and rdate BETWEEN '$start' and '$end'" );
$data43j = mysqli_fetch_array($query43j);

$query44j = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='EMR' and rdate BETWEEN '$start' and '$end'" );
$data44j = mysqli_fetch_array($query44j);


$query45j = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='EMR' and rdate BETWEEN '$start' and '$end'" );
$data45j = mysqli_fetch_array($query45j);

$query46j = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='EMR' and rdate BETWEEN '$start' and '$end'" );
$data46j = mysqli_fetch_array($query46j);

$query47j = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='EMR' and rdate BETWEEN '$start' and '$end'" );
$data47j = mysqli_fetch_array($query47j);



$sum8j=$data42j['count(*)']+$data43j['count(*)']+$data44j['count(*)']+$data45j['count(*)']+$data46j['count(*)']+$data47j['count(*)'];





$query42k = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='Brush cytology' and rdate BETWEEN '$start' and '$end'" );
$data42k= mysqli_fetch_array($query42k);

$query43k = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='Brush cytology' and rdate BETWEEN '$start' and '$end'" );
$data43k = mysqli_fetch_array($query43k);

$query44k = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='Brush cytology' and rdate BETWEEN '$start' and '$end'" );
$data44k = mysqli_fetch_array($query44k);


$query45k = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='Brush cytology' and rdate BETWEEN '$start' and '$end'" );
$data45k = mysqli_fetch_array($query45k);

$query46k = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='Brush cytology' and rdate BETWEEN '$start' and '$end'" );
$data46k = mysqli_fetch_array($query46k);

$query47k = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='Brush cytology' and rdate BETWEEN '$start' and '$end'" );
$data47k = mysqli_fetch_array($query47k);



$sum8k=$data42k['count(*)']+$data43k['count(*)']+$data44k['count(*)']+$data45k['count(*)']+$data46k['count(*)']+$data47k['count(*)'];



$query42l = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='Stenting' and rdate BETWEEN '$start' and '$end'" );
$data42l= mysqli_fetch_array($query42l);

$query43l = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='Stenting' and rdate BETWEEN '$start' and '$end'" );
$data43l = mysqli_fetch_array($query43l);

$query44l = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='Stenting' and rdate BETWEEN '$start' and '$end'" );
$data44l = mysqli_fetch_array($query44l);


$query45l = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='Stenting' and rdate BETWEEN '$start' and '$end'" );
$data45l = mysqli_fetch_array($query45l);

$query46l = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='Stenting' and rdate BETWEEN '$start' and '$end'" );
$data46l = mysqli_fetch_array($query46l);

$query47l = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='Stenting' and rdate BETWEEN '$start' and '$end'" );
$data47l = mysqli_fetch_array($query47l);



$sum8l=$data42l['count(*)']+$data43l['count(*)']+$data44l['count(*)']+$data45l['count(*)']+$data46l['count(*)']+$data47l['count(*)'];



$query42m = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='Biopsy' and rdate BETWEEN '$start' and '$end'" );
$data42m= mysqli_fetch_array($query42m);

$query43m = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='Biopsy' and rdate BETWEEN '$start' and '$end'" );
$data43m = mysqli_fetch_array($query43m);

$query44m = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='Biopsy' and rdate BETWEEN '$start' and '$end'" );
$data44m = mysqli_fetch_array($query44m);


$query45m = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='Biopsy' and rdate BETWEEN '$start' and '$end'" );
$data45m = mysqli_fetch_array($query45m);

$query46m = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='Biopsy' and rdate BETWEEN '$start' and '$end'" );
$data46m = mysqli_fetch_array($query46m);

$query47m = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='Biopsy' and rdate BETWEEN '$start' and '$end'" );
$data47m = mysqli_fetch_array($query47m);



$sum8m=$data42m['count(*)']+$data43m['count(*)']+$data44m['count(*)']+$data45m['count(*)']+$data46m['count(*)']+$data47m['count(*)'];



$query42n = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='TBNA' and rdate BETWEEN '$start' and '$end'" );
$data42n= mysqli_fetch_array($query42n);

$query43n = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='TBNA' and rdate BETWEEN '$start' and '$end'" );
$data43n = mysqli_fetch_array($query43n);

$query44n = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='TBNA' and rdate BETWEEN '$start' and '$end'" );
$data44n = mysqli_fetch_array($query44n);


$query45n = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='TBNA' and rdate BETWEEN '$start' and '$end'" );
$data45n = mysqli_fetch_array($query45n);

$query46n = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='TBNA' and rdate BETWEEN '$start' and '$end'" );
$data46n = mysqli_fetch_array($query46n);

$query47n = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='TBNA' and rdate BETWEEN '$start' and '$end'" );
$data47n = mysqli_fetch_array($query47n);



$sum8n=$data42n['count(*)']+$data43n['count(*)']+$data44n['count(*)']+$data45n['count(*)']+$data46n['count(*)']+$data47n['count(*)'];



$query42o = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='Indwelling Pleural Catheter' and rdate BETWEEN '$start' and '$end'" );
$data42o= mysqli_fetch_array($query42o);

$query43o = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='Indwelling Pleural Catheter' and rdate BETWEEN '$start' and '$end'" );
$data43o = mysqli_fetch_array($query43o);

$query44o = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='Indwelling Pleural Catheter' and rdate BETWEEN '$start' and '$end'" );
$data44o = mysqli_fetch_array($query44o);


$query45o = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='Indwelling Pleural Catheter' and rdate BETWEEN '$start' and '$end'" );
$data45o = mysqli_fetch_array($query45o);

$query46o = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='Indwelling Pleural Catheter' and rdate BETWEEN '$start' and '$end'" );
$data46o = mysqli_fetch_array($query46o);

$query47o = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='Indwelling Pleural Catheter' and rdate BETWEEN '$start' and '$end'" );
$data47o = mysqli_fetch_array($query47o);



$sum8o=$data42o['count(*)']+$data43o['count(*)']+$data44o['count(*)']+$data45o['count(*)']+$data46o['count(*)']+$data47o['count(*)'];




$query42p = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Razeeb Hassan' and type='Electrocautery Of Angiodysplasia' and rdate BETWEEN '$start' and '$end'" );
$data42p= mysqli_fetch_array($query42p);

$query43p = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranen Biswas' and type='Electrocautery Of Angiodysplasia' and rdate BETWEEN '$start' and '$end'" );
$data43p = mysqli_fetch_array($query43p);

$query44p = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. J.M.H Qausar Alam' and type='Electrocautery Of Angiodysplasia' and rdate BETWEEN '$start' and '$end'" );
$data44p = mysqli_fetch_array($query44p);


$query45p = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Md. Abbas Uddin' and type='Electrocautery Of Angiodysplasia' and rdate BETWEEN '$start' and '$end'" );
$data45p = mysqli_fetch_array($query45p);

$query46p = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Ranjit Kumar Rudra' and type='Electrocautery Of Angiodysplasia' and rdate BETWEEN '$start' and '$end'" );
$data46p = mysqli_fetch_array($query46p);

$query47p = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Chowdhury Mohammed Anwar Parvez' and type='Electrocautery Of Angiodysplasia' and rdate BETWEEN '$start' and '$end'" );
$data47p = mysqli_fetch_array($query47p);



$sum8p=$data42p['count(*)']+$data43p['count(*)']+$data44p['count(*)']+$data45p['count(*)']+$data46p['count(*)']+$data47p['count(*)'];





$query42q = mysqli_query($link,"Select dname,count(*) from endoreport where dname='Dr. Mohammad Sana Ullah Sarker' and type='Pleuroscopy' and rdate BETWEEN '$start' and '$end'" );
$data42q= mysqli_fetch_array($query42q);



$sum8q=$data42q['count(*)'];






$i1=$data2['count(*)']+$data8['count(*)']+$data14['count(*)']+$data118['count(*)']+$data24['count(*)']+$data30['count(*)']+$data36['count(*)']+$data42['count(*)']+$data48['count(*)']+$data54['count(*)']+$data60['count(*)']+$data66['count(*)']+$data42c['count(*)']+$data42d['count(*)']+$data42e['count(*)']+$data42f['count(*)']+$data42g['count(*)']+$data42h['count(*)']+$data42i['count(*)']+$data42j['count(*)']+$data42k['count(*)']+$data42l['count(*)']+$data42m['count(*)']+$data42n['count(*)']+$data42o['count(*)']+$data42a['count(*)']+$data42b['count(*)']+$data42p['count(*)'];
$i2=$data15['count(*)']+$data9['count(*)']+$data3['count(*)']+$data119['count(*)']+$data25['count(*)']+$data31['count(*)']+$data37['count(*)']+$data43['count(*)']+$data49['count(*)']+$data55['count(*)']+$data61['count(*)']+$data67['count(*)']+$data43c['count(*)']+$data43d['count(*)']+$data43e['count(*)']+$data43f['count(*)']+$data43g['count(*)']+$data43h['count(*)']+$data43i['count(*)']+$data43j['count(*)']+$data43k['count(*)']+$data43l['count(*)']+$data43m['count(*)']+$data43n['count(*)']+$data43o['count(*)']+$data43a['count(*)']+$data43b['count(*)']+$data43p['count(*)'];
$i3=$data16['count(*)']+$data10['count(*)']+$data4['count(*)']+$data20['count(*)']+$data26['count(*)']+$data32['count(*)']+$data38['count(*)']+$data44['count(*)']+$data50['count(*)']+$data56['count(*)']+$data62['count(*)']+$data68['count(*)']+$data44c['count(*)']+$data44d['count(*)']+$data44e['count(*)']+$data44f['count(*)']+$data44g['count(*)']+$data44h['count(*)']+$data44i['count(*)']+$data44j['count(*)']+$data44k['count(*)']+$data44l['count(*)']+$data44m['count(*)']+$data44n['count(*)']+$data44o['count(*)']+$data44a['count(*)']+$data44b['count(*)']+$data44p['count(*)'];
$i4=$data18['count(*)']+$data12['count(*)']+$data6['count(*)']+$data21['count(*)']+$data27['count(*)']+$data33['count(*)']+$data39['count(*)']+$data45['count(*)']+$data51['count(*)']+$data57['count(*)']+$data63['count(*)']+$data69['count(*)']+$data45c['count(*)']+$data45d['count(*)']+$data45e['count(*)']+$data45f['count(*)']+$data45g['count(*)']+$data45h['count(*)']+$data45i['count(*)']+$data45j['count(*)']+$data45k['count(*)']+$data45l['count(*)']+$data45m['count(*)']+$data45n['count(*)']+$data45o['count(*)']+$data45a['count(*)']+$data45b['count(*)']+$data45p['count(*)'];
$i5=$data19['count(*)']+$data13['count(*)']+$data7['count(*)']+$data22['count(*)']+$data28['count(*)']+$data34['count(*)']+$data40['count(*)']+$data46['count(*)']+$data52['count(*)']+$data58['count(*)']+$data64['count(*)']+$data70['count(*)']+$data46c['count(*)']+$data46d['count(*)']+$data46e['count(*)']+$data46f['count(*)']+$data46g['count(*)']+$data46h['count(*)']+$data46i['count(*)']+$data46j['count(*)']+$data46k['count(*)']+$data46l['count(*)']+$data46m['count(*)']+$data46n['count(*)']+$data46o['count(*)']+$data46a['count(*)']+$data46b['count(*)']+$data46p['count(*)'];
$i6=$data17['count(*)']+$data11['count(*)']+$data5['count(*)']+$data23['count(*)']+$data29['count(*)']+$data35['count(*)']+$data41['count(*)']+$data47['count(*)']+$data53['count(*)']+$data59['count(*)']+$data65['count(*)']+$data71['count(*)']+$data47c['count(*)']+$data47d['count(*)']+$data47e['count(*)']+$data47f['count(*)']+$data47g['count(*)']+$data47h['count(*)']+$data47i['count(*)']+$data47j['count(*)']+$data47k['count(*)']+$data47l['count(*)']+$data47m['count(*)']+$data47n['count(*)']+$data47o['count(*)']+$data47a['count(*)']+$data47b['count(*)']+$data47p['count(*)'];
$gsum=$sum1+$sum2+$sum3+$sum4+$sum5+$sum6+$sum7+$sum8+$sum9+$sum10+$sum11+$sum12+$data74['count(*)']+$sum8a+$sum8b+$sum8c+$sum8d+$sum8e+$sum8f+$sum8g+$sum8h+$sum8i+$sum8j+$sum8k+$sum8l+$sum8m+$sum8n+$sum8o+$sum8p+$sum8q;

//$db = new PDO('mysql:host=localhost;dbname=sfmmkpj','root','');
class myPDF extends FPDF{
function header(){
$this->Image('logo.jpg',70,7);
$this->Image('logo1.jpg',220,7);
$this->SetFont('Arial','B',12);
$this->Cell(300,5,'SHEIKH FAZILATUNNESA MUJIB MEMORIAL',0,0,'C');
$this->Ln(3);
$this->SetFont('Arial','B',12);
$this->Cell(300,10,'KPJ SPECIALIZED HOSPITAL AND NURSING COLLEGE',0,0,'C'); 
$this->ln(5);
$this->SetFont('Arial','B',12);
$this->Cell(300,10,'C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh.',0,0,'C'); 
$this->ln(20);

}
function footer(){
$this->SetY(-10);
$this->SetFont('Arial','B',8);

$this->ln(2);
$this->SetFont('Arial','B',10);
$this->Cell(0,10,'Contact Numbers:  Ambulance:  +880244077029, +8801791987466, Appointments: +880244077030, +8801703788561',0,0,'C');


}


//$this->Ln();
}


$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->SetFont('Arial' , 'b' , 9);
$pdf->SetLeftMargin('17');
//$pdf->headerTable();
//$pdf->viewTable($db);
$pdf->SetFont('Arial' , 'b' , 15);
$pdf->Cell('265',6,'Monthly Endoscopic Procedure Report ',0,1,'C');
$pdf->ln(1);
$pdf->Cell('265',6,'FROM  '.$start.'  TO  '.$end ,0,1,'C');
//$this->SetFont('Arial','B',);
$pdf->ln(1);


$pdf->ln(8);
$pdf->SetFont('Arial' , 'b' , 8);
$pdf->Cell('50',5,'Name Of Procedure',1,0,'C');
$pdf->Cell('30',5,'Dr. Razeeb',1,0,'C');
$pdf->Cell('30',5,'Dr. Ranen',1,0,'C');
$pdf->Cell('30',5,'Dr. Qausar',1,0,'C');
$pdf->Cell('30',5,'Dr. Abbas',1,0,'C');
$pdf->Cell('30',5,'Dr. Ranjit',1,0,'C');
$pdf->Cell('30',5,'Dr. Parvez',1,0,'C');
$pdf->Cell('30',5,'Dr. Sana',1,0,'C');
$pdf->Cell('15',5,'Total',1,1,'C');


$pdf->Cell('50',5,'Endoscopy',1,0,'C');
$pdf->Cell('30',5,$data2['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data3['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data4['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data6['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data7['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data5['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');
$pdf->Cell('15',5,$sum1,1,1,'C');

$pdf->Cell('50',5,'Colonoscopy',1,0,'C');
$pdf->Cell('30',5,$data8['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data9['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data10['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data12['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data13['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data11['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');
$pdf->Cell('15',5,$sum2,1,1,'C');

$pdf->Cell('50',5,'Sigmoidoscopy',1,0,'C');
$pdf->Cell('30',5,$data14['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data15['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data16['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data18['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data19['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data17['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');
$pdf->Cell('15',5,$sum3,1,1,'C');



$pdf->Cell('50',5,'ENDOSCOPY AND COLONOSCOPY',1,0,'C');
$pdf->Cell('30',5,$data42a['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data43a['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data44a['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data45a['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data46a['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data47a['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');
$pdf->Cell('15',5,$sum8a,1,1,'C');


$pdf->Cell('50',5,'ENDOSCOPY AND SIGMOIDOSCOPY',1,0,'C');
$pdf->Cell('30',5,$data42b['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data43b['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data44b['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data45b['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data46b['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data47b['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');
$pdf->Cell('15',5,$sum8b,1,1,'C');




$pdf->Cell('50',5,'Polypectomy',1,0,'C');
$pdf->Cell('30',5,$data20['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data21['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data22['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data23['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data24['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');
$pdf->Cell('15',5,$sum4,1,1,'C');


$pdf->Cell('50',5,'Cystoscopy',1,0,'C');
$pdf->Cell('30',5,$data26['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data25['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data28['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data29['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data30['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data31['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');
$pdf->Cell('15',5,$sum5,1,1,'C');


$pdf->Cell('50',5,'DJ. Stent Remove',1,0,'C');
$pdf->Cell('30',5,$data32['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data33['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data34['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data35['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data36['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data37['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');
$pdf->Cell('15',5,$sum6,1,1,'C');

$pdf->Cell('50',5,'F.B Removed',1,0,'C');
$pdf->Cell('30',5,$data38['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data39['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data40['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data41['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data42['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data43['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');
$pdf->Cell('15',5,$sum7,1,1,'C');

$pdf->Cell('50',5,'FOL',1,0,'C');
$pdf->Cell('30',5,$data42['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data43['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data44['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data45['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data46['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data47['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');
$pdf->Cell('15',5,$sum8,1,1,'C');

$pdf->Cell('50',5,'Uroflowmetry',1,0,'C');
$pdf->Cell('30',5,$data50['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data49['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data52['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data53['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data54['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data55['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');
$pdf->Cell('15',5,$sum9,1,1,'C');


$pdf->Cell('50',5,'ERCP Screening',1,0,'C');
$pdf->Cell('30',5,$data56['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data57['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data58['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data59['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data60['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data61['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');
$pdf->Cell('15',5,$sum10,1,1,'C');

$pdf->Cell('50',5,'EVL',1,0,'C');
$pdf->Cell('30',5,$data62['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data63['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data64['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data65['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data66['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data67['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');
$pdf->Cell('15',5,$sum11,1,1,'C');

$pdf->Cell('50',5,'Dudonoscopy',1,0,'C');
$pdf->Cell('30',5,$data68['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data69['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data70['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data71['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data72['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data73['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');
$pdf->Cell('15',5,$sum12,1,1,'C');


$pdf->Cell('50',5,'Bronronchoscopy',1,0,'C');
$pdf->Cell('30',5,$data68['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data69['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data70['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data71['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data72['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data73['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data74['count(*)'],1,0,'C');

$pdf->Cell('15',5,$data74['count(*)'],1,1,'C');





$pdf->Cell('50',5,'Ploypectomy',1,0,'C');
$pdf->Cell('30',5,$data42c['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data43c['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data44c['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data45c['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data46c['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data47c['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');

$pdf->Cell('15',5,$sum8c,1,1,'C');


$pdf->Cell('50',5,'Dilatation',1,0,'C');
$pdf->Cell('30',5,$data42d['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data43d['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data44d['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data45d['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data46d['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data47d['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');

$pdf->Cell('15',5,$sum8d,1,1,'C');


$pdf->Cell('50',5,'Early GI cancer screening',1,0,'C');
$pdf->Cell('30',5,$data42e['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data43e['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data44e['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data45e['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data46e['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data47e['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');

$pdf->Cell('15',5,$sum8e,1,1,'C');


$pdf->Cell('50',5,'Oesophageal pneumatic Balloon Dilation',1,0,'C');
$pdf->Cell('30',5,$data42f['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data43f['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data44f['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data45f['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data46f['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data47f['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');

$pdf->Cell('15',5,$sum8f,1,1,'C');


$pdf->Cell('50',5,'Oesophageal CRE Balloon Dilation',1,0,'C');
$pdf->Cell('30',5,$data42g['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data43g['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data44g['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data45g['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data46g['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data47g['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');

$pdf->Cell('15',5,$sum8g,1,1,'C');


$pdf->Cell('50',5,'Foreign Body Removal',1,0,'C');
$pdf->Cell('30',5,$data42h['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data43h['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data44h['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data45h['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data46h['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data47h['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');

$pdf->Cell('15',5,$sum8h,1,1,'C');


$pdf->Cell('50',5,'ESD',1,0,'C');
$pdf->Cell('30',5,$data42i['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data43i['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data44i['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data45i['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data46i['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data47i['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');

$pdf->Cell('15',5,$sum8i,1,1,'C');


$pdf->Cell('50',5,'EMR',1,0,'C');
$pdf->Cell('30',5,$data42j['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data43j['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data44j['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data45j['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data46j['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data47j['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');

$pdf->Cell('15',5,$sum8j,1,1,'C');


$pdf->Cell('50',5,'Brush Cytology',1,0,'C');
$pdf->Cell('30',5,$data42k['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data43k['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data44k['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data45k['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data46k['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data47k['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');

$pdf->Cell('15',5,$sum8k,1,1,'C');


$pdf->Cell('50',5,'Stenting',1,0,'C');
$pdf->Cell('30',5,$data42l['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data43l['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data44l['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data45l['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data46l['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data47l['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');

$pdf->Cell('15',5,$sum8l,1,1,'C');

$pdf->Cell('50',5,'Biopsy',1,0,'C');
$pdf->Cell('30',5,$data42m['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data43m['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data44m['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data45m['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data46m['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data47m['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');

$pdf->Cell('15',5,$sum8m,1,1,'C');

$pdf->Cell('50',5,'TBNA',1,0,'C');
$pdf->Cell('30',5,$data42n['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data43n['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data44n['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data45n['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data46n['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data47n['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');

$pdf->Cell('15',5,$sum8n,1,1,'C');


$pdf->Cell('50',5,'Indwelling Pleural Catheter',1,0,'C');
$pdf->Cell('30',5,$data42o['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data43o['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data44o['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data45o['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data46o['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data47o['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');

$pdf->Cell('15',5,$sum8o,1,1,'C');


$pdf->Cell('50',5,'Electrocautery Of Angiodysplasia',1,0,'C');
$pdf->Cell('30',5,$data42p['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data43p['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data44p['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data45p['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data46p['count(*)'],1,0,'C');
$pdf->Cell('30',5,$data47p['count(*)'],1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');

$pdf->Cell('15',5,$sum8p,1,1,'C');


$pdf->Cell('50',5,'Pleuroscopy',1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');
$pdf->Cell('30',5,'',1,0,'C');
$pdf->Cell('30',5,$data42q['count(*)'],1,0,'C');


$pdf->Cell('15',5,$sum8q,1,1,'C');





$pdf->Cell('50',5,'Grand Total',1,0,'C');
$pdf->Cell('30',5,$i1,1,0,'C');
$pdf->Cell('30',5,$i2,1,0,'C');
$pdf->Cell('30',5,$i3,1,0,'C');
$pdf->Cell('30',5,$i4,1,0,'C');
$pdf->Cell('30',5,$i5,1,0,'C');
$pdf->Cell('30',5,$i6,1,0,'C');
$pdf->Cell('30',5,$data74['count(*)'],1,0,'C');
$pdf->Cell('15',5,$gsum,1,1,'C');

//$pdf->Cell('95',5,$data['dname'],0,1,'L');
$pdf->SetFont('Arial','', 11);
$pdf->Cell('42',5);
//$pdf->Cell('95',5,$data3['degree'],0,1,'L');
$pdf->Cell('42',3);
//$pdf->Cell('80',3,$data3['Discipline'],0,1,'L');
$pdf->SetFont('Arial' , 'b' , 9);

$pdf->ln(6);



//$pdf->SetFont('Arial' , 'b' , 15);
//$pdf->Cell('90',5,'OUT PATIENT RECORD',1,0,'L');


//$pdf->ln(10);
//$pdf->MultiCell('160' , 5,$data['xl'],1,1);
//$pdf->Cell('30' , 5,'Doasge',1,1);
//$pdf->MultiCell('160' , 5,'jashfjh sjfh jsdhfjsdhjfh jsdhjf hjsdhfj dsjhf djsh jfdshjf dsjhf jdsh fdhsf hjsdhf sdhf jdhsf hdsjfhjsdhf sdhf jdshjfhjskdhf jsdh fjhsdjkf hjdsfjd s',1,1);
//$dd=$data['refer']

//$dd = rtrim($dd, ',');
//$string = rtrim($string, ',');

$pdf->Output();