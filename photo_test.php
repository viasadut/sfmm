$pdf->AddPage();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(270,6,'I. Photo Gallery:',1,1,'L',1);
$pdf->Ln(2);
$pdf->SetFont('Arial', 'I', 9);
$pdf->SetFillColor(255,255,255);
$sqlc = "SELECT id, image, thumb, caption, site_no, rate, img_date FROM images WHERE site_no=$site ORDER BY img_date";
$resultc = $dbcon->query($sqlc);
$rowc = mysqli_fetch_array($resultc);
foreach($resultc as $runImage)
{
$array[] =$runImage;

$image_height = 36;
$image_width = 48;

//get current X and Y
$start_x = $pdf->GetX();
$start_y = $pdf->GetY();

if(empty($image)){
}else{
  
if($start_x > 240) {
  $pdf->Ln(40);
}

// place image and move cursor to proper place. "+ 2" added for buffer
$pdf->MultiCell(48, 3, $runImage['img_date'] . ' - ' . $runImage['caption'] . $pdf->Image('uploads/thumbs/'.$runImage['image'],$pdf->GetX(), $pdf->GetY(),$image_width,$image_height, 'jpg'), 0, 1, 'L');

$pdf->SetXY($start_x + $image_width + 2, $start_y);
} // End of Gallery else Statement
} // End of Gallery foreach Statement