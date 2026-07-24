<?php
//index.php
//include autoloader

require_once 'Dompdf/autoload.inc.php';
require('db1.php');
// reference the Dompdf namespace

use Dompdf\Dompdf;

//initialize dompdf class




//$document->loadHtml($html);
//$page = file_get_contents("cat.html");

//$document->loadHtml($page);

//$connect = mysqli_connect("localhost", "root", "Godiloveu16", "sfmmkpjnew");

$pmrn=$_REQUEST['pmrn'];
            $dname=$_REQUEST['dname'];
            
            $eid=$_REQUEST['eid'];
			
			
$query = mysqli_query($con,"select * from radreport where pmrn='$pmrn' and eid='$eid'");
            $data = mysqli_fetch_array($query);
                       
            $query3 = mysqli_query($con,"select * from doctor1 where dname='$dname'");
            $data3 = mysqli_fetch_array($query3);
			
			
$html="";

$output .= "
 
<table>
  <tr>
                        <td><b>Detail Report : </b></td>
                    </tr>
					

";

$output .= '
		<tr>
			<td>'.$data["report"].'</td>
			
		</tr>
				
	';

$output .= '</table>';


//$output .= '</table>';

//echo $output;
$document = new Dompdf();
$document->loadHtml($output);

//set page size and orientation

$document->setPaper('A4', 'portrait');

//Render the HTML as PDF

$document->render();

//Get output of generated pdf in Browser

$document->stream("", array("Attachment"=>0));
//1  = Download
//0 = Preview


?>
