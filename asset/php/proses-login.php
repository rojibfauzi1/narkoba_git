<?php
session_start();
ob_start();
require_once ('../narkoba/conf/koneksi.php');
/*include '../narkoba/proses_login.php';*/
require_once '../narkoba_git/google_login/config.php'; 

//initalize user class
$user_obj = new Cl_User();


/*******Google ******/
require_once '../narkoba_git/google_login/Google/src/config.php';
require_once '../narkoba_git/google_login/Google/src/Google_Client.php';
require_once '../narkoba_git/google_login/Google/src/contrib/Google_PlusService.php';
require_once '../narkoba_git/google_login/Google/src/contrib/Google_Oauth2Service.php'; 


 $client = new Google_Client();
$client->setScopes(array('https://www.googleapis.com/auth/plus.login','https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.me'));
$client->setApprovalPrompt('auto');

$plus       = new Google_PlusService($client);
$oauth2     = new Google_Oauth2Service($client);
//unset($_SESSION['access_token']);

if(isset($_GET['code'])) {
  $client->authenticate(); // Authenticate
  $_SESSION['access_token'] = $client->getAccessToken(); // get the access token here
  header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
}

if(isset($_SESSION['access_token'])) {
  $client->setAccessToken($_SESSION['access_token']);
}

if ($client->getAccessToken()) {
  $_SESSION['access_token'] = $client->getAccessToken();
  $user         = $oauth2->userinfo->get();
  try {
    $user_obj->google_login( $user );
  }catch (Exception $e) {
    $error = $e->getMessage();
  }
}  
/*******Google ******/
?>
<?php 
  if( !empty( $_POST )){
    try {
      
      $data = $user_obj->login( $_POST );
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
        header('Location: admin/pelapor.php');
      }
    } catch (Exception $e) {
      $error = $e->getMessage();
    }
  }
  //print_r($_SESSION);
/*  if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
    header('Location: home.php');
  }*/

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
         <a class="btn btn-default google" href="<?php echo $client->createAuthUrl();?>"> <i class="fa fa-google-plus modal-icons"></i> Sign In with Google+ </a>  
        
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