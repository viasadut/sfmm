<!DOCTYPE html>
<html lang="en">
<head>
    <title>PMS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html, body{
            font-family: bangla;
            font-family: serif; font-size: 10pt;
        }
		
		
		div.relative {
  position: relative;
  width: 400px;
  height: 200px;
  border: 3px solid #73AD21;
} 

div.absolute {
  position: absolute;
  top: 80px;
  right: 0;
  width: 200px;
  height: 100px;
  border: 3px solid #73AD21;
}
    </style>
</head>
<body>

<div class="jumbotron text-center">
    <h1>PMS PDF</h1>
</div>
  
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
        <?php
            require('db1.php');
            
            require_once 'vendor/autoload.php';
         
            
            $output = "";

            $pmrn=$_REQUEST['pmrn'];
            $dname=$_REQUEST['adoc'];
            $rdate=$_REQUEST['rdate'];
            //$eid=$_REQUEST['eid'];
            
            
            
            $db = mysqli_connect('localhost','root','Godiloveu16');
            mysqli_select_db($db,'sfmmkpjnew');
            $query = mysqli_query($db,"select * from patient where pmrn='$pmrn'");
            $data = mysqli_fetch_array($query);
            
            $query1 = mysqli_query($db,"select * from preadm where pmrn='$pmrn' and dname='$dname' and rdate='$rdate' order by id desc");
            $data1 = mysqli_fetch_array($query1);
            $dname=$data1['dname'];
            $query3 = mysqli_query($con,"select * from doctor1 where dname='$dname'");
            $data3 = mysqli_fetch_array($query3);
			
			
	
        $output .='
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td width="40%"><b>Diagnosis : </b></td>
                        <td width="60%">'.$data1['diagnosis'].'</td>
                    </tr>
                    <tr>
                    <td width="40%"><b>Instruction On Admission (For MO) : </b></td>
                    <td width="60%">'.$data1['formo'].'</td>  
                    </tr>

                    <tr>
                    <td width="40%"><b>Suggested Date Of Admission : </b></td>
                    <td width="60%">'.$data1['sda'].'</td>  
                    </tr>

                    
                    
                    <tr>
                    <td width="40%"><b>Plan : </b></td>
                    <td width="60%">'.$data1['plan'].'</td>  
                    </tr>

                    <tr>
                    <td width="40%"><b>Probable Date of Discharge : </b></td>
                    <td width="60%">'.$data1['pdischarge'].'</td>  
                    </tr>
					
					
                    <tr>
                    <td width="40%"><b>Remarks : </b></td>
                    <td width="60%">'.$data1['remarks'].'
                    
                    
                    </td>  
                    </tr>


                    
                </table>
';	
	


          
                $output .='
                    <table>
                       
                    <tr>
                    <td style="font-family: bangla; font-size: 25px; text-align:center">
                    
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ভর্তিচ্ছু রোগীদের জন্য নির্দেশনা</td>
</tr>
                    
                        <tr>
                            <td><div style="font-family: bangla; font-size: 18px;"> 
                            
                          

** ভর্তির সময়ে সাবালক রোগীগণ জাতীয় পরিচয়পত্র এবং নাবালক রোগীগণ জন্ম নিবন্ধন সনদ সাথে রাখবেন। <br>
** ভর্তি ফরমে প্রদানকৃত তথ্যাদি, যেমন – নিজ নাম, পিতা-মাতার নাম, বয়স, জন্মতারিখ ইত্যাদি যেন জাতীয় পরিচয়পত্র (সাবালক) এবং জন্ম নিবন্ধন সনদের (নাবালক) সাথে সামঞ্জস্যপূর্ণ হয় সেদিকে বিশেষ খেয়াল রাখবেন।<br>
** ভর্তি রোগীর সাথে কোন মূল্যবান দ্রব্যাদি না রাখার জন্য অনুরোধ করা হল (যেমন – টাকা-পয়সা, ডেবিট বা ক্রেডিট কার্ড, গহনা, মোবাইল ফোন, ট্যাব/প্যাড বা অন্যান্য মূল্যবান ইলেকট্রনিক সামগ্রী ইত্যাদি)।<br>
** মূল্যবান দ্রব্যাদি বাসায় রেখে আসবেন অথবা পরিবারের লোকের কাছে হস্তান্তর করবেন।<br>
** ভর্তি হবার সময়ে তার সাথে কি কি রয়েছে তা উল্লেখ করে রোগী একটি "পেশেন্ট প্রপার্টি ডিসক্লেইমার ফর্ম” অবশ্যই পূরন করবেন। দায়িত্বরত স্টাফ নার্স/ইনচার্জ সঠিকভাবে এটি পূরণ করাবেন। এর একটি কপি রোগীর ফাইলে, একটি কপি ওয়ার্ডে এবং একটি কপি রোগীর কাছে সরক্ষিত থাকবে।<br>
** রোগীর সাথে একান্তই কোন মূল্যবান দ্রব্যাদি থেকে থাকলে তা উক্ত ফর্মে অবশ্যই উল্লেখ করবেন এবং নিরাপত্তার স্বার্থে তা দায়িত্বরত স্টাফ নার্স/ইনচার্জের কাছে হস্তান্তর করবেন এবং তাঁরা জমাকৃত দ্রব্যাদি নির্দিষ্ট নিরাপদ স্থানে সংরক্ষন করবেন।<br>
** দায়িত্বরত স্টাফ নার্স/ইনচার্জের কাছে হস্তান্তরকৃত দ্রব্যাদি হাসপাতাল ত্যাগের সময় “পেশেন্ট প্রপার্টি ডিসক্লেইমার ফর্ম” অনুযায়ী রোগীকে ফেরত দেয়া হবে।<br>
** যদি কোন রোগী মূল্যবান দ্রব্যাদি দায়িত্বরত স্টাফ নার্স/ইনচার্জের কাছে হস্তান্তর না করে নিজের কাছেই রাখতে চান, তাহলে তিনি অবশ্যই এই মর্মে একটি ফর্মে স্বাক্ষর করবেন যে, উক্ত দ্রব্যাদি হারিয়ে গেলে বা ক্ষতিসাধন হলে কর্তৃপক্ষ দায়ী নয়।<br>
** রোগী তার ব্যক্তিগত ব্যবহার্য দ্রব্যাদি, যেমন – ব্যক্তিগত ঔষধ, চশমা, পোষাক ইত্যাদি সাথে নিয়ে আসবেন। রোগীর ব্যক্তিগত দ্রব্যাদি রাখার জন্য ব্যক্তিগত লকার/ওয়ারড্রোবের ব্যবস্থা রয়েছে।<br>



                            </div>
                            
                            
                            </td>
                        </tr>

</table>
<table>
                       
                        <tr>
                            <td><div style="font-family: bangla; font-size: 18px;"> 



                        ** হাসপাতাল প্রাঙ্গনে কোন ধরনের ভোঁতা বা ধারালো অস্ত্র, আগ্নেয়াস্ত্র, নেশাজাতীয় দ্রব্য ইত্যাদি (বিড়ি, সিগারেট, তামাক ইত্যাদি) বহন এবং সংরক্ষন সম্পুর্ণরূপে নিষিদ্ধ।<br>
** কোন নির্দিষ্ট ঔষধ বা খাবারে এলার্জি থাকলে তা অবশ্যই ভর্তির সময় অবহিত করবেন।<br>
** ভর্তিকৃত সকল রোগীদেরকে খাদ্য বিশেষজ্ঞের পরামর্শ অনুযায়ী নিয়মিত স্বাস্থ্যকর এবং মান-সম্মত খাবার সরবরাহ করা হয়। তাই রোগীদের জন্য বাইরে থেকে যে কোন ধরনের খাবার, ফল-মূল, জুস, ড্রিংকস ইত্যাদি আনা সম্পূর্ণভাবে নিষিদ্ধ।<br>
** চিকিৎসা সংক্রান্ত কোন প্রশ্ন থাকলে দায়িত্বরত স্টাফ নার্স/চিকিৎসককে জিজ্ঞাসা করবেন।<br>
** ভর্তি থাকাকালীন যে কোন ধরনের সমস্যা বা অসুবিধা বা অভিযোগ তৎক্ষণাৎ দায়িত্বরত স্টাফ নার্স/ইনচার্জকে অবহিত করুন।<br>
** ওয়ার্ড/কেবিন/ওয়াশরুমের দ্রব্যাদি যত্ন সহকারে ব্যবহার করুন।<br>
** রুমে/ওয়াশরুমে অবস্থান না করলে লাইট, ফ্যান, পানির কল ইত্যাদি বন্ধ রাখুন।<br>
** যেখানে, সেখানে ময়লা-আবর্জনা না ফেলে নির্দিষ্ট স্থানে/ডাস্টবিনে ফেলুন।<br>
** একসাথে অধিক অতিথি যেন ওয়ার্ড/কেবিনে প্রবেশ না করে সে ব্যাপারে অনুরোধ করা হল। এতে চিকিৎসা কার্যক্রম ব্যহত হয় এবং জীবানু সংক্রমনের সম্ভাবনা থাকে।<br>
** হাসপাতালের পরিবেশ রক্ষার্থে এবং অন্যান্য রোগীদের অসুবিধা রোধে আগত অতিথিদের সাথে উচ্চৈঃস্বরে আলাপচারিতাকে নিরুৎসাহিত করা হচ্ছে।<br>
** শিশুদের রোগ প্রতিরোধ ক্ষমতা কম হওয়ায়, তাদের ক্ষেত্রে হাসপাতাল হতে জীবাণু সংক্রমণের হার এবং রোগাক্রান্ত হবার সম্ভাবনা অত্যন্ত বেশি। তাই শিশুদেরকে হাসপাতালে না আনতে অনুরোধ করা হচ্ছে।<br>
** হাসপাতাল ত্যাগের ছাড়পত্র (ডিসচার্জ সার্টিফিকেট), জন্ম সনদ (বার্থ সার্টিফিকেট), মৃত্যু সনদ (ডেথ সার্টিফিকেট), চিকিৎসা সনদ (মেডিকেল সার্টিফিকেট) ইত্যাদি যে কোন ধরনের সনদ গ্রহনের সময় সেখানে প্রদানকৃত তথ্যাদি আপনার জাতীয় পরিচয়পত্র (সাবালক)/জন্ম নিবন্ধন সনদের (নাবালক) সাথে মিলিয়ে নিন। কোন ভুল/অমিল পরিলক্ষিত হলে সাথে সাথে অবহিত করুন।<br>

                    </table>
                '; 
            

           


            $output .= '<p align="right">Computer Generated Summary, No Signature Required</p> ';
            $mpdf = new \Mpdf\Mpdf([
                // 'default_font' => 'bangla',
                'default_font' => 'Roboto',
                'default_font_size' => 9,
                'mode' => 'utf-8',
				'margin_left' => 23
            ]);
           /* $mpdf->SetWatermarkImage(
                '1001.jpg',
                5,
                '',
                array(177,43)
            );*/
            $mpdf->showWatermarkImage = true;
            $mpdf->setAutoTopMargin = 'stretch';
            $mpdf->setAutoBottomMargin = 'stretch';
            $mpdf->SetHTMLHeader('
                <table width="100%">
                    <tr>
                        <td width="15%"><img src="2.png"></td>
                        <td width="70%" align="center" style="text-align: center; font-weight: bold; font-size:17px;">
                        KPJ SPECIALIZED HOSPITAL <br>
                        C/12, Tetuibari, Kashimpur, Gazipur, Bangladesh. </td>
						
                        <td width="15%" style="text-align: right;"></td>
                    </tr>
                </table>
                <hr>

                <table width="100%">
                    <tr>
                        <td width="23%"></td>
                        <td width="50%"><b><h1 align="laft">ADMISSION REQUEST FORM <br></h1> </b></td>
                       
                    </tr>
                </table>
               
                <table>
                    <tr>
                        <td width="30%" ><h2 align="laft"><b>Consultant Name:</b></h2></td>
                        <td width="70%" style="font-weight: bold !important;"><h2 align="laft"><b>'.$data1['dname'].'</h2></b></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>'.$data3['degree'].'</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>'.$data3['Discipline'].'</td>
                    </tr>
                </table>
            
			<table width="100%">
			<tr>
			<td width="10%" align="center">
			<barcode code="'.$data1['pmrn'].'" type="C128A" class="barcode" />
			MRN-'.$data1['pmrn'].'
			</td>
					<td width="80%" align="center">
					
					</td>
					
					<td class="verticalTableHeader" width="10%" align="center">
					<barcode code="'.$data1['id'].'" type="C128A" class="barcode" />
					REQUEST ID-'.$data1['id'].'
					</td>
					</tr>
			</table>
			
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td> <b>Patient Name : '.$data1['pname'].'</b></td>
                        <td><b>MRN :'.$data1['pmrn'].'</b></td>
                        <td><b>GENDER :</b>'.$data1['psex'].'</td>
                        <td><b>AGE :</b>'.$data1['page'].'</td>
                    </tr>
                </table>
            
                <table style="border: 1px solid black" width="100%">
                    <tr>
                        <td><b>Address :</b> '.$data1['padd'].'</td>
                        
                    </tr>
                </table>
            ');

            $mpdf->SetHTMLFooter('
                <table width="100%">
                    <tr>
                        <td width="25%" align="center">Page-{PAGENO}/{nbpg}</td>
                    </tr>
                    <tr>
                        <td width="100%" style="color:red; font-size:10px;">Contact Numbers: Ambulance: 01810008074, +880244077029, Appointments: 01810008080, +880244077030 | (SFMMKPJSH/OPD/MR-01)</td>
                    </tr>
                </table>
            ');
            
            $mpdf->WriteHTML($output);
            $fileName = $data['pname'].'-'.$data['pmrn'].'.pdf';
            ob_clean(); 
            $mpdf->Output();
        ?>
        </div>
    </div>
</div>

</body>
</html>

<!-- http://localhost/sfmm/ticket/pdf_p.php?pmrn=123456&eid=3&date=07/20/2018&dname=Dr.%20Razeeb%20Hassan -->