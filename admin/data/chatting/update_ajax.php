<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'jitc5';

$conn = new Mysqli($host,$user,$pass,$db);

if($conn->connect_error){
	echo "Gagal Koneksi";
}

if($_POST['type'] == 'update'){

$pelapor = $_POST['pelapor'];
$id_admin = $_POST['id_admin'];

$sql = "SELECT * FROM detail_chatting join chatting on detail_chatting.id_chat=chatting.id_chat 
		where status = 1 and chatting.id_pelapor='$pelapor' and id_admin=0";
$s = $conn->query($sql);
$row = $s->fetch_assoc();
$sql2 = "UPDATE detail_chatting set status=2 where id_chat='$row[id_chat]' ";
/*print_r($sql2) ;
die();*/
$s2 = $conn->query($sql2);


}
?>