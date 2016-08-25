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
	$last_id = $conn->insert_id;
	$komentar = $_POST['isi'];
	$nama_admin = $_POST['nama_admin'];
	/*$tanggal = $_POST['tanggal'];*/
	$id_chat = $_POST['id_chat'];
	$id_admin = $_POST['id_admin'];

	$sql = "SELECT max(id_detail_chat) as id FROM detail_chatting";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $idBaru = $nourut;

  $q = "SELECT * FROM detail_chatting  join chatting on detail_chatting.id_chat=chatting.id_chat
join pelapor on chatting.id_pelapor=pelapor.id_pelapor

where chatting.id_chat='$id_chat' order by detail_chatting.id_detail_chat desc";
$sql = $conn->query($q);

  $row = $sql->fetch_assoc(); 

	$sql = "INSERT INTO detail_chatting VALUES ('$idBaru','$id_chat','$id_admin',1,now(),'$komentar')";
/*	print_r($sql);
  	die();*/
  	$s = $conn->query($sql);
  	if($s){
  		    ?>
      <div class=" col-md-offset-5 ">
      <div class="col-md-2 col-xs-4">

        <div class="image">

          <span class="fa fa-user"></span>

        </div>

      </div>

      <div class="col-md-10 col-xs-8 text"> <strong><?php echo $nama_admin ?></strong>
        &#45; <em><?php echo $row['tanggal']; ?></em>
        <br />
        <p><?php echo $komentar ?></p>
        <br/>
       </div> 
      </div> <?php 	}else{
  		print_r($conn->error) ;
  		die();
  	}
}
?>

<!-- Cannot add or update a child row: a foreign key constraint fails (`jitc5`.`detail_chatting`, CONSTRAINT `detail_chatting_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE) -->