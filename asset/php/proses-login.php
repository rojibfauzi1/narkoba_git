<?php
session_start();
ob_start();
require_once ('../narkoba/conf/koneksi.php');
/*include '../narkoba/proses_login.php';*/
if(isset($_POST['masuk'])){
 $email = $_POST['email'];
  $pass3 = $_POST['password'];

$s3 = "SELECT * FROM pelapor WHERE email='$email' and password='$pass3'";
  $sql3 = $conn->query($s3);
$cek3 = $sql3->num_rows;


    if($cek3 > 0){
    $row = $sql3->fetch_assoc();
      $_SESSION['login1'] = 'pelapor';
      $_SESSION['email'] = $email;
      $_SESSION['password'] = $pass3;
      $_SESSION['nama_pelapor'] = $row['nama_pelapor'];
      $_SESSION['status'] = $row['status'];
      $_SESSION['id_pelapor'] = $row['id_pelapor'];
      $_SESSION['no_ktp'] = $row['no_ktp/sim'];
      $_SESSION['no_hp'] = $row['no_telp'];

        header("Refresh: 0; URL=admin/pelapor.php?p=dasboard_pelapor");
       
   
    }else{
      echo "
<script>window.alert('gagal login username / password salah')</script>
";
    }
}
?>





<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <form action="" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Login Pelapor</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-danger">Reset</button>
          <input type="submit" class="btn btn-primary" name="masuk" value="login" />
        </div>
      </form>
      </div>
     
    </div>
  </div>
</div>  
<?php


?>