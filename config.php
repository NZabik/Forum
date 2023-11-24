<?php
require_once 'vendor/autoload.php';
require_once "controllers/connexiondb.php";
$con = connectdb();
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

// init configuration
$google_app_id='votre application ID';
$google_app_secret='votre application SECRET';
$google_callbackurl='http://localhost:3000/callback.php';
// create Client Request to access Google API
$http = new GuzzleHttp\Client(['verify' => 'C:/wamp64/bin/php/php8.2.0/extras/ssl/cacert.pem']);
$google_client=new Google_Client(); 
$google_client->setHttpClient($http);
$google_client -> setClientId ( $google_app_id ); 
$google_client -> setClientSecret ( $google_app_secret ); 
$google_client -> setRedirectUri ( $google_callbackurl ); 
$google_client -> addScope ( 'email');
$google_client -> addScope ( 'profile');
$google_client -> addScope ( 'https://www.googleapis.com/auth/photoslibrary.readonly'); 




?>
 
