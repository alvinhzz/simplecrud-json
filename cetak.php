<?php

require "fpdf/fpdf.php";

$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);


$pdf->Image('uad.png', 10, 5, 20, 20);
$pdf->Image('kuning.png', 50, 50, 100, 100);

$pdf->Cell(190,7,"FAKULTAS TEKNOLOGI INDUSTRI", 0, 1, 'C');
$pdf->Cell(190,7,"UNIVERSITAS AHMAD DAHLAN", 0, 1, 'C');
$pdf->Cell(190,7,"2019", 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190,7,"MEETING MEMBERS", 0, 1, 'C');

$pdf->Cell(190,7,"", 0, 1);
$pdf->SetDrawColor(250, 0, 0);

$pdf->SetFont('Arial','', 10);
$pdf->Cell(100,2,'Tanggal : '.date("d-m-Y"), 0, 1);
$pdf->Cell(175,2,'www.fti.uad.ac.id', 0, 1, 'R');

$pdf->Cell(190,7,"", 0, 1);

$pdf->Cell(25,8,"ID Member", 1, 0, 'C');
$pdf->Cell(50,8,"Name", 1, 0, 'C');
$pdf->Cell(50,8,"Email", 1, 1, 'C');

$pdf->SetFont('Arial','', 10);

include 'database.php';
$data = mysqli_query($connect, "SELECT * FROM members");

while ($row = mysqli_fetch_array($data)) {
    $pdf->Cell(25,8,$row['member_id'], 1, 0);
    $pdf->Cell(50,8,$row['member_name'], 1, 0);
    $pdf->Cell(50,8,$row['member_email'], 1, 1);
}

$pdf->Output();
?>