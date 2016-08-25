<?php
include '../conf/koneksi.php';




$s = "DELETE FROM berita WHERE id_berita='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=berita");
}
?>