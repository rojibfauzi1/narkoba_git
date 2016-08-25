<?php
/*include_once '../narkoba/conf/koneksi.php';*/
/*
if(!isset($_SESSION['login1'] || $_SESSION['login'])){
	die('0');
}*/

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'jitc5';

$conn = new Mysqli($host,$user,$pass,$db);

if($conn->connect_error){
	echo "Gagal Koneksi";
}


if($_POST['type'] == 'insert'){
	
	$sql = "SELECT max(id_detail_chat) as id FROM detail_chatting";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  
  $nourut = (int)$idku;
  $nourut++;
  $idBaru = $nourut;
	
	$komentar = $_POST['isi_komentar'];
	$nama = $_POST['nama'];
	/*$tanggal = $_POST['tanggal_baru'];*/
	$id_chat = $_POST['id_chat'];
  $id_pelapor = $_POST['id_pelapor'];
	$sql = "INSERT INTO detail_chatting VALUES ('$idBaru','$id_chat',0,1,now(),'$komentar')";

  $q1 = "SELECT detail_chatting.id_admin,isi,tanggal,detail_chatting.id_chat FROM detail_chatting  join chatting on detail_chatting.id_chat=chatting.id_chat

where chatting.id_pelapor='$id_pelapor' order by detail_chatting.id_detail_chat desc";
$sql1 = $conn->query($q1);
$row = $sql1->fetch_assoc();

/*	print_r($sql);
  	die();*/
  	$s = $conn->query($sql);
  	if($s){
  		echo "      
      <div class=\" col-md-offset-6 \">
      <div class=\"col-md-2 col-xs-4\">

        <div class=\"image\">

          <span class=\"fa fa-user\"></span>

        </div>

      </div>

      <div class=\"col-md-10 col-xs-8 text\"> <strong>". $nama ."</strong>
        &#45; <em>". $row['tanggal'] ."</em>
        <br />
        <p>". $komentar ."</p>
        <br/>
        <hr>
      </div>
      </div>";  	}else{
  		print_r($conn->error) ;
  		die();
  	}
}
?>

<!-- Cannot add or update a child row: a foreign key constraint fails (`jitc5`.`detail_chatting`, CONSTRAINT `detail_chatting_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE) -->