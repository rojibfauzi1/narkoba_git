<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'jitc5';

$conn = new Mysqli($host,$user,$pass,$db);

if($conn->connect_error){
	echo "Gagal Koneksi";
}


$sql = "SELECT * from pecandu where id_pecandu='$_GET[id]'";
$s = $conn->query($sql);

foreach ($s as $row) {
	if($row['status'] == 2 $ow['status'] == 1){
		echo '<a id="status" class="btn btn-danger disabled">Tidak Diterima</a>';
	}else{
		echo '<a id="status" class="btn btn-danger" href="?p=ubahpecandu2&id='.$row['id_pecandu'].'">Tidak Diterima</a>';
	} 

	if($row['status'] == 2 $ow['status'] == 1){
		echo '<a id="status" class="btn btn-primary disabled">Tidak Diterima</a>';
	}else{
		echo '<a id="status" class="btn btn-primary" href="?p=ubahpecandu2&id='.$row['id_pecandu'].'">Tidak Diterima</a>';
	} 

} 
?>