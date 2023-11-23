<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once "connexiondb.php";
$con = connectdb();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$mail = $_POST['mail'];
	$mailExist = $con->prepare("SELECT * FROM utilisateur where email=?");
	$mailExist->execute([$mail]);
	$user = $mailExist->fetch();
	$regnom = '/^([a-zA-Z]){3,}$/i';
	$regmail = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
	$regpass = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[#\^\+\-\[\]])(?=.{8,})/';
	$mdp = $_POST['password'];
	$mdp_hashed = password_hash($mdp, PASSWORD_BCRYPT);
	$mdp2 = $_POST['password2'];
	$uploaddir = '../images/profil/';
	$uploadfile = $uploaddir . basename($_FILES['profil']['name']);
	move_uploaded_file($_FILES['profil']['tmp_name'], $uploadfile);
	date_default_timezone_set('Europe/Paris');
	if (!preg_match($regnom, $nom) || $nom == "") {
		$_SESSION['erreur1'] = 1;
		$_SESSION['erreur2'] = 0;
		$_SESSION['erreur3'] = 0;
		$_SESSION['erreur4'] = 0;
		$_SESSION['erreur5'] = 0;
		$_SESSION['erreur6'] = 0;
		$_SESSION['success'] = 0;
		header("Refresh:0; url= ../views/register.php");
	} else if (!preg_match($regnom, $prenom) || $prenom == "") {
		$_SESSION['erreur1'] = 0;
		$_SESSION['erreur2'] = 1;
		$_SESSION['erreur3'] = 0;
		$_SESSION['erreur4'] = 0;
		$_SESSION['erreur5'] = 0;
		$_SESSION['erreur6'] = 0;
		$_SESSION['success'] = 0;
	} else if (!preg_match($regmail, $mail) || $mail == "") {
		$_SESSION['erreur1'] = 0;
		$_SESSION['erreur2'] = 0;
		$_SESSION['erreur3'] = 1;
		$_SESSION['erreur4'] = 0;
		$_SESSION['erreur5'] = 0;
		$_SESSION['erreur6'] = 0;
		$_SESSION['success'] = 0;
		header("Refresh:0; url= ../views/register.php");
	} else if ($user) {
		$_SESSION['erreur1'] = 0;
		$_SESSION['erreur2'] = 0;
		$_SESSION['erreur3'] = 0;
		$_SESSION['erreur4'] = 1;
		$_SESSION['erreur5'] = 0;
		$_SESSION['erreur6'] = 0;
		$_SESSION['success'] = 0;
		header("Refresh:0; url= ../views/register.php");
	} else if (!preg_match($regpass, $mdp) || $mdp == "") {
		$_SESSION['erreur1'] = 0;
		$_SESSION['erreur2'] = 0;
		$_SESSION['erreur3'] = 0;
		$_SESSION['erreur4'] = 0;
		$_SESSION['erreur5'] = 1;
		$_SESSION['erreur6'] = 0;
		$_SESSION['success'] = 0;
		header("Refresh:0; url= ../views/register.php");
	} else if ($mdp != $mdp2) {
		$_SESSION['erreur1'] = 0;
		$_SESSION['erreur2'] = 0;
		$_SESSION['erreur3'] = 0;
		$_SESSION['erreur4'] = 0;
		$_SESSION['erreur5'] = 0;
		$_SESSION['erreur6'] = 1;
		$_SESSION['success'] = 0;
		header("Refresh:0; url= ../views/register.php");
	} else {
		$date = new DateTime();
		$req = $con->prepare("INSERT INTO utilisateur (Nom,Prénom,email,mdp,profil,date_inscription) VALUES (?,?,?,?,?,?)");
		$req->execute(array($nom, $prenom, $mail, $mdp_hashed, $uploadfile, $date->format('d/m/Y')));
		$_SESSION['erreur1'] = 0;
		$_SESSION['erreur2'] = 0;
		$_SESSION['erreur3'] = 0;
		$_SESSION['erreur4'] = 0;
		$_SESSION['erreur5'] = 0;
		$_SESSION['erreur6'] = 0;
		$_SESSION['success'] = 1;

		$mail_body = "
   <p>Salut " . $prenom . ",</p>
   <p>Merci pour votre inscription. Votre mot de passe est: " . $mdp . ",</p>
   <p>Cordialement</p>
   ";
		$mail2 = new PHPMailer();
		$mail2->IsSMTP();        //Sets Mailer to send message using SMTP
		$mail2->Host = 'smtp.laposte.net';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
		$mail2->Port = '465';        //Sets the default SMTP server port
		$mail2->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
		$mail2->Username = 'testmailPHP';     //Sets SMTP username
		$mail2->Password = 'cLH:dQek7vrKMEd';     //Sets SMTP password
		$mail2->SMTPSecure = 'ssl';       //Sets connection prefix. Options are "", "ssl" or "tls"
		$mail2->From = 'testmailphp@laposte.net';   //Sets the From email address for the message
		$mail2->FromName = 'Nicolas Zabik';     //Sets the From name of the message
		$mail2->AddAddress($mail);  //Adds a "To" address   
		$mail2->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
		$mail2->IsHTML(true);       //Sets message type to HTML    
		$mail2->Subject = 'Email Verification';   //Sets the Subject of the message
		$mail2->Body = $mail_body;       //An HTML or plain text message body
		if ($mail2->Send())        //Send an Email. Return true on success or false on error
		{
			header("Refresh:0; url= ../views/register.php");
			exit;
		}
	}
	if (isset($_POST['reset'])) {
		$_SESSION['erreur1'] = 0;
		$_SESSION['erreur2'] = 0;
		$_SESSION['erreur3'] = 0;
		$_SESSION['erreur4'] = 0;
		$_SESSION['erreur5'] = 0;
		$_SESSION['erreur6'] = 0;
		$_SESSION['success'] = 0;
		header("Refresh:0; url= ../views/register.php");
	}
}
