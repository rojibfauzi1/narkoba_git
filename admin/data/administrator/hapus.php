<?php
include '../conf/koneksi.php';



$s = "DELETE FROM admin WHERE id_admin='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=admin");
}
?>