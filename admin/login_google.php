<?php
session_start();
ob_start();

/*login with google*/
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
/*$client = new Google_Client();
$client->setClientId('{107503762677-1mor454998415u8j0tocpt7c45ije7p9}.apps.googleusercontent.com');
$client->setClientSecret('{m-segEVnWn6XWE9yf08knx_b}');
$client->setRedirectUri('{http://localhost/Jfolder%20jitc/jitc4/narkoba_git/index.php}');
//next two line added to obtain refresh_token
$client->setAccessType('offline');
$client->setApprovalPrompt('force');
$client->setScopes(array('https://www.googleapis.com/auth/gmail.readonly'));*/
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
            header("Refresh: 0; URL=pelapor.php");
      }
    } catch (Exception $e) {
      $error = $e->getMessage();
    }
  }
?>