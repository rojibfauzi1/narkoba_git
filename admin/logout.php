<?php
session_start();
/*unset($_SESSION['login']);
unset($_SESSION['login1']);
unset($_SESSION['nama_pelapor']);
unset($_SESSION['nama_ad']);
unset($_SESSION['nis']);
unset($_SESSION['nip']);
unset($_SESSION['email']);
unset($_SESSION['username']);
unset($_SESSION['password']);*/
session_destroy();
header("Refresh: 0; URL=../index.php");

?>