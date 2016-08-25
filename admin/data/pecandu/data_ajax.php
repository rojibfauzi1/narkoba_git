<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'jitc5';

$conn = new Mysqli($host,$user,$pass,$db);

if($conn->connect_error){
	echo "Gagal Koneksi";
}


$sql = "SELECT count(id_pecandu) as notif from pecandu where status=3";
$s = $conn->query($sql);

foreach ($s as $row) {
if($row['notif']== 0 ){
	echo "";
}else{

echo $row['notif'];
}


 } ?>