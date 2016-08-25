<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'jitc5';

$conn = new Mysqli($host,$user,$pass,$db);

if($conn->connect_error){
	echo "Gagal Koneksi";
}

if($_POST['type'] == 'load_notif'){

$id_pelapor = $_POST['pelapor'];
/*$id_admin = $_POST['id_admin'];*/

$sql = "SELECT count(id_detail_chat) as notif FROM detail_chatting join chatting on detail_chatting.id_chat=chatting.id_chat 
		where status = 1 and chatting.id_pelapor='$id_pelapor' and id_admin=0";
$s = $conn->query($sql);
	foreach ($s as $row) {
/*print_r($row['notif']);
die();*/

		if($row['notif'] == 0){
			echo "";
		}else{

		echo $row['notif'];
		}

	} 
}
?>