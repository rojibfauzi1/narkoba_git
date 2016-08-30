<?php
/**

 */

require_once 'messages.php';

//site specific configuration declartion
define( 'BASE_PATH', 'http://localhost/Jfolder%20jitc/jitc4/narkoba_git/admin/pelapor.php');
define( 'DB_HOST', 'localhost' );
define( 'DB_USERNAME', 'root');
define( 'DB_PASSWORD', '');
define( 'DB_NAME', 'jitc5');

//Google App Details
define('GOOGLE_APP_NAME', 'CultivatingHappyness Google+ login');
define('GOOGLE_OAUTH_CLIENT_ID', '107503762677-1mor454998415u8j0tocpt7c45ije7p9.apps.googleusercontent.com');
define('GOOGLE_OAUTH_CLIENT_SECRET', 'm-segEVnWn6XWE9yf08knx_b');
define('GOOGLE_OAUTH_REDIRECT_URI', 'http://localhost/Jfolder%20jitc/jitc4/narkoba_git/admin/pelapor.php');
define("GOOGLE_SITE_NAME", 'YOUR SITE URL'); 

function __autoload($class)
{
	$parts = explode('_', $class);
	$path = implode(DIRECTORY_SEPARATOR,$parts);
	require_once $path . '.php';
}
