<?php
require_once 'config.php';
require_once 'controllers/connexiondb.php';


$con = connectdb();
date_default_timezone_set('Europe/Paris');
if (isset($_GET['code'])) {
    
   $token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);
   $google_client->setAccessToken($token['access_token']);
 
   // get profile info
   $google_oauth = new Google\Service\Oauth2($google_client);
   $google_account_info = $google_oauth->userinfo->get();
   $email =  $google_account_info->email;
   $id=  $google_account_info->id;
   $name =  $google_account_info->familyName;
   $firstName=  $google_account_info->givenName;
   $picture=  $google_account_info->picture;

	$idExist = $con->prepare("SELECT * FROM utilisateur where google_id=?");
	$idExist->execute([$id]);
	$user = $idExist->fetch();
   if ($user) {
      $_SESSION['user'] = 1;
        $_SESSION['idUser'] = $user['Id_UTILISATEUR'];
        $_SESSION['nom'] = $name;
        $_SESSION['prenom'] = $firstName;
        $_SESSION['profil'] = $picture;
        $_SESSION['date'] = new DateTime();
        $_SESSION['email'] = $email;
        $_SESSION['dateins'] = $user['Date_inscription'];
		header("Refresh:0; url= ../views/forum.php");

   } else {
      $date = new DateTime();

   $req = $con->prepare("INSERT INTO utilisateur ( google_id, Nom, Prénom, email, profil, date_inscription) VALUES (?,?,?,?,?,?)");
         $req->execute(array($id,$name,$firstName,$email,$picture,$date->format('d/m/Y')));

   header("location: /views/login.php");
} }


?>
