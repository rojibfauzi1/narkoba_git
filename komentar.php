<?php
include 'conf/koneksi.php';

if(isset($_POST['kirim'])){
  $komentar = $_POST['komentar'];
  $id_chat = $_POST['id'];
  $idtanya = $_POST['id_tanya'];
  $hp = $_POST['hp'];
  $ktp = $_POST['ktp'];
  $id = $_POST['id'];
  $id_pelapor = $_POST['id_pelapor'];
  $nama_pelapor = $_POST['nama_pelapor'];
/*  $tanggal = now();*/
  
  $sql = "SELECT max(id_komentar) as id FROM komentar";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $idBaru = $nourut;

/*  if($nama_pelapor && $id_pelapor){
  	 $id_pelapor1 = $id_pelapor;
  	 $pelapor = $nama_pelapor;  
  }elseif($nama_admin && $id_admin){
  	 $id_admin1 = $id_admin;
  	 $admin = $nama_admin;

  }*/



  $sql = "INSERT INTO komentar VALUES ('$idBaru','','$idtanya','$id_pelapor','$nama_pelapor','$hp','$ktp','$komentar')";

/*print_r($sql);
die();*/
  $s = $conn->query($sql);

 if($s){
  echo "<script>location='tanya-jawab.php';</script>";
  }
}
?>