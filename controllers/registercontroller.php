<?php 
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once "connexiondb.php";
$con = connectdb();

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
	move_uploaded_file($_FILES['profil']['tmp_name'],$uploadfile);
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
		$req = $con->prepare("INSERT INTO utilisateur (Nom,Prénom,email,mdp,profil) VALUES (?,?,?,?,?)");
		$req->execute(array($nom, $prenom, $mail, $mdp_hashed,$uploadfile));
		$_SESSION['erreur1'] = 0;
		$_SESSION['erreur2'] = 0;
		$_SESSION['erreur3'] = 0;
		$_SESSION['erreur4'] = 0;
		$_SESSION['erreur5'] = 0;
		$_SESSION['erreur6'] = 0;
		$_SESSION['success'] = 1;
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
?>
