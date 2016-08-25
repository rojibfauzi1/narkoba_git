<?php 

ob_clean();
/*flush();*/ 







//PANGGIL FPDF
require_once('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->addPage();
$pdf->setAutoPageBreak(false);
$pdf->setFont('Arial','',12);






$sql = $conn->query("SELECT * FROM pelapor where id_pelapor='$_GET[id]'");
$row = $sql->fetch_assoc();
$nama_pelapor = $row['nama_pelapor'];

$pdf->Cell(1,30,'SISTEM INFORMASI REHABILITASI NARKOBA','0','C');
$pdf->Cell(12,40,'Untuk Pelaporan Pada BNNP DIY','0','C');

$nama = 'Nama Pelapor : ' .$nama_pelapor;
$pdf->Cell(0,60,$nama,'0','C');
$i = 1;
$no = 1;
$max = 31;
$row = 6;


$yi = 50;
$ya = 50;
$pdf->setFont('Arial','',9);
$pdf->setFillColor(222,222,222);
$pdf->setXY(10,$ya);
$pdf->CELL(6,6,'NO',1,0,'C',1);
$pdf->CELL(30,6,'NO REKAM MEDIS',1,0,'C',1);
$pdf->CELL(50,6,'NAMA PECANDU',1,0,'C',1);
$pdf->CELL(50,6,'STATUS',1,0,'C',1);
$ya = $yi + $row;


$sql = $conn->query("SELECT * FROM  pecandu 
        WHERE id_pelapor='$_GET[id]'");

$tgl = date('d-m-Y');

while($data = $sql->fetch_assoc()){

if($data['status']==1){ 
$pdf->setXY(10,$ya);
$pdf->setFont('arial','',9);
$pdf->setFillColor(255,255,255);
$pdf->cell(6,6,$no,1,0,'C',1);
$pdf->cell(30,6,$data['no_rekam_medis'],1,0,'L',1);
$pdf->cell(50,6,$data['nama'],1,0,'L',1);
$pdf->CELL(50,6,'Tidak diterima',1,0,'C',1);
$ya = $ya+$row;
}elseif($data['no_rekam_medis']==2){
	$pdf->setXY(10,$ya);
$pdf->setFont('arial','',9);
$pdf->setFillColor(255,255,255);
$pdf->cell(6,6,$no,1,0,'C',1);
$pdf->cell(30,6,$data['no_rekam_medis'],1,0,'L',1);
$pdf->cell(50,6,$data['nama'],1,0,'L',1);
$pdf->CELL(50,6,'Diterima',1,0,'C',1);
$ya = $ya+$row;
}else{
	$pdf->setXY(10,$ya);
$pdf->setFont('arial','',9);
$pdf->setFillColor(255,255,255);
$pdf->cell(6,6,$no,1,0,'C',1);
$pdf->cell(30,6,$data['no_rekam_medis'],1,0,'L',1);
$pdf->cell(50,6,$data['nama'],1,0,'L',1);
$pdf->CELL(50,6,'Menunggu',1,0,'C',1);
$ya = $ya+$row;
}

$no++;
$i++;
$dm['id_pecandu'] = $data['no_rekam_medis'];

}
$pdf->text(100,$ya+6,"Yogyakarta , ".$tgl);
$pdf->text(100,$ya+18,"PIMPINAN");





$pdf->output();


/*ob_end_flush();*/
?>