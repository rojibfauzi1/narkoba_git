<?php
require_once('conf/koneksi.php');
if(!empty($_POST['login'])){
  $nip1 = $_POST['nip'];
  $pass1 = $_POST['password'];

  

  $s1 = "SELECT * FROM admin WHERE nip='$nip1' and password='$pass1'";
  $sql1 = $conn->query($s1);
  






  $cek1 = $sql1->num_rows;
  if($cek1){
    $row = $sql1->fetch_assoc();
    if($cek1 > 0){
      $_SESSION['login'] = 1;
      $_SESSION['username'] = $nip1;
      $_SESSION['password'] = $pass1;
    /*  $_SESSION['level'] = $row['level'];*/
      $_SESSION['gambar'] = $row['foto'];
      $_SESSION['status'] = $row['status'];
      $_SESSION['nama'] = $row['nama'];
      $_SESSION['id_admin'] = $row['id_admin'];
    /*  if($_SESSION['level']=='admin'){*/
        header("Refresh: 0; URL=index1.php?p=dasboard_admin");
       
     /* } */  
     /* elseif ($_SESSION['level']=='guru') {
        
        header("Refresh: 0; URL=../admin/guru.php");
      }*/
    }

   
  }else{
      echo "
<script>window.alert('gagal login username / password salah')</script>
";
    }
}
?>