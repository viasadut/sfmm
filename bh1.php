<?php
require('bh.php');

$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

$html='<table border="1">
<tr>
<td width="50%" height="30">cell 1 sdkjhfkjdsh djshf kjhds fjh dfkjshd fjk hsdhfjhdsj fdsf  sdf sd f sdhfh dksfj ds hfkj dsjf hksd hkjfh</td><td width="200" height="30" bgcolor="#D0D0FF">cell 2</td>
</tr>
<tr>
<td width="200" height="30">cell 3</td><td width="200" height="30">cell 4</td>
</tr>
</table>';

$pdf->WriteHTML($html);
$pdf->Output();
?>