<?php
include 'conf/koneksi.php';

if(isset($_POST['kirim'])){
	$id = $_POST['id'];
	$id_chat = $_POST['id_chat'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$telp = $_POST['telp'];
	$ktp = $_POST['ktp'];

$cek = "SELECT * FROM pelapor JOIN chatting on pelapor.id_pelapor=chatting.id_pelapor 
		where pelapor.id_pelapor='$id' and chatting.id_chat='$id_chat'";

$sql = $conn->query($cek);
$row = $sql->fetch_assoc();
if($row['email'] > 1){
		
		echo "<script>alert('Email tersebut sudah ada silahkan mendaftar dengan email lain')</script>";
		
		echo "<script>location='index.php';</script>";
		
}
if($sql->num_rows > 0){
  $sql = "SELECT max(id_pelapor) as id FROM pelapor";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $id = $nourut; 
/*  print_r($id);
  die();*/




/*print_r($sql);
die();*/
/*$sql = "START TRANSACTION;
INSERT INTO pelapor VALUES ('$id', '$email', '$password', '$nama', '', '$telp', '$ktp', 'aktif');
insert into chatting VALUES ('$idBaru','$id');
COMMIT;";*/
$sql = "INSERT INTO pelapor VALUES ('$id', '$email', '$password', '$nama', '', '$telp', '$ktp', 'aktif')";


/*
for ($x=0; $x < 1; $x++) { 
	if($x = 0){$TableToWrite='pelapor';}
	if($x = 1){$TableToWrite='chatting';}
		$sql = "INSERT INTO ".$TableToWrite." VALUES ('$id', '$email', '$password', '$nama', '', '$telp', '$ktp', 'aktif','$id', '$email', '$password', '$nama', '', '$telp', '$ktp', 'aktif')";
}*/

	$s = $conn->query($sql);
	if($s){


		echo "<script>alert('Terimakasih sudah mendaftar, silahkan Login')</script>";
		/*header("location: index.php");*/
		echo "<script>location='index.php';</script>";
		/*}*/
		
		}
}else{

	
$sql = "SELECT max(id_pelapor) as id FROM pelapor";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $id = $nourut; 



/*$cek = "SELECT * FROM pelapor 
		where id_pelapor='$id'";
$sql = $conn->query($cek);
$row = $sql->fetch_assoc();
if($row['email'] > 1){
		
		echo "<script>alert('Email tersebut sudah ada silahkan mendaftar dengan email lain')</script>";
		
		echo "<script>location='index.php';</script>";
	*/	
/*}*/
$sql = "INSERT INTO pelapor VALUES ('$id', '$email', '$password', '$nama', '', '$telp', '$ktp', 'aktif')";
/*print_r($sql);
die();*/
	$s = $conn->query($sql);
	if($s){
		/*$sql2 = "insert into chatting VALUES ('$idBaru','$id')";
		$s2 = $conn->query($sql2);
		*/
		/*if($s2){*/
			
		echo "<script>alert('Terimakasih sudah mendaftar, silahkan Login')</script>";
		/*header("location: index.php");*/
		echo "<script>location='index.php';</script>";
		/*}*/
		}else{
echo "<script>alert('Email tersebut sudah ada silahkan daftar dengan email lain')</script>";
		
		echo "<script>location='index.php';</script>";
		}
	}

}
?>