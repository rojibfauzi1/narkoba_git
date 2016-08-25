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


$id_admin = $_POST['id_admin'];

$sql = "SELECT count(detail_chatting.id_detail_chat) as notif FROM detail_chatting join chatting on detail_chatting.id_chat=chatting.id_chat 
		where detail_chatting.status = 1 and id_admin=0";
$s = $conn->query($sql);

	foreach ($s as $row) {

		if($row['notif'] == 0){
			echo "";
		}else{

		echo $row['notif'];
		}

	} 
}
?>