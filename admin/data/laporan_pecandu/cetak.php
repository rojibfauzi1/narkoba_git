<?php 

ob_clean();
/*flush();*/ 







//PANGGIL FPDF
require_once('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->addPage();
$pdf->setAutoPageBreak(false);
$pdf->setFont('Arial','',12);






$sql = $conn->query("SELECT * FROM pecandu where id_pecandu='$_GET[id]'");
$row = $sql->fetch_assoc();
$no_rekam_medis1 = $row['no_rekam_medis'];


$pdf->Cell(1,30,'SISTEM INFORMASI REHABILITASI NARKOBA','0','C');
$pdf->Cell(12,40,'Untuk Pelaporan Pada BNNP DIY','0','C');

$no_rekam_medis = 'No Rekam Medis : ' .$no_rekam_medis1;
$nama1 = $row['nama'];
$ktp = $row['no_ktp/sim'];
$ibu = $row['nama_ibu'];
$ayah = $row['nama_ayah'];
$tgllahir = $row['tgl_lahir'];
$umur = $row['umur'];
$jk = $row['jenis_kelamin'];
$agama = $row['agama'];
$suku = $row['suku'];
$status_menikah = $row['status_menikah'];
$pekerjaan = $row['pekerjaan'];
$alamat_ktp = $row['alamat_ktp'];
$alamat_domisili = $row['alamat_domisili'];
$golongan = $row['golongan_darah'];
$tlp = $row['no_telp'];
$pdf->Ln();
$i = 1;
$no = 1;
$max = 31;
$row = 6;

$yi = 50;
$ya = 50;


$pdf->SetFont('Times','I',16);
$pdf->Ln();
$pdf->setXY(10,$ya);
$pdf->setFillColor(255,255,255);
$pdf->Cell(60,10,'',0,0);
$pdf->Cell(60,10,'',0,0);
$pdf->Cell(60,10,$no_rekam_medis,1,0);
$pdf->Ln();
$pdf->Ln();
$pdf->CELL(60,10,'1.  Nama : ',1,0);
$pdf->CELL(120,10,' '.$nama1,1,1);

$pdf->Cell(60,10,'2.  No Ktp/Sim : ',1,0);
$pdf->Cell(120,10,' '.$ktp,1,1);

$pdf->Cell(60,10,'3.  Tanggal lahir : ',1,0);
$pdf->Cell(120,10,' '.$tgllahir,1,1);

$pdf->Cell(60,10,'4.  Umur : ',1,0);
$pdf->Cell(120,10,' '.$umur,1,1);

$pdf->Cell(60,10,'5.  Nama Ayah : ',1,0);
$pdf->Cell(120,10,' '.$ayah,1,1);

$pdf->Cell(60,10,'6.  Nama Ibu : ',1,0);
$pdf->Cell(120,10,' '.$ibu,1,1);

$pdf->Cell(60,10,'7.  Agama : ',1,0);
$pdf->Cell(120,10,' '.$agama,1,1);

$pdf->Cell(60,10,'8.  Jenis Kelamin : ',1,0);
$pdf->Cell(120,10,' '.$jk,1,1);

$pdf->Cell(60,10,'9.  Suku : ',1,0);
$pdf->Cell(120,10,' '.$suku,1,1);

$pdf->Cell(60,10,'10. Status Menikah : ',1,0);
$pdf->Cell(120,10,' '.$status_menikah,1,1);

$pdf->Cell(60,10,'11. Pekerjaan : ',1,0);
$pdf->Cell(120,10,' '.$pekerjaan,1,1);

$pdf->Cell(60,10,'12. No Telepon : ',1,0);
$pdf->Cell(120,10,' '.$tlp,1,1);

$pdf->Cell(60,10,'13. Golongan Darah : ',1,0);
$pdf->Cell(120,10,' '.$golongan,1,1);

$pdf->Cell(60,10,'14. Alamat KTP : ',1,0);
$pdf->Cell(120,10,' '.$alamat_ktp,1,1);

$pdf->Cell(60,10,'15. Alamat Domisili : ',1,0);
$pdf->Cell(120,10,' '.$alamat_domisili,1,1);
$ya = $yi + $row;




$sql = $conn->query("SELECT * FROM  pecandu 
        WHERE id_pecandu='$_GET[id]'");

$tgl = date('d-m-Y');

while($data = $sql->fetch_assoc()){





$dm['id_pecandu'] = $data['no_rekam_medis'];

}
/*$pdf->Ln();
$pdf->text(120,$ya+6,"Yogyakarta , ".$tgl);
$pdf->text(120,$ya+18,"PIMPINAN");*/




$pdf->output();


/*ob_end_flush();*/
?>