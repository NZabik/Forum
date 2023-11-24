<?php 
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once "connexiondb.php";
$con = connectdb();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = $_POST['mail'];
	$mailExist = $con->prepare("SELECT * FROM utilisateur where email=?");
	$mailExist->execute([$mail]);
	$user = $mailExist->fetch();
    $mdp = $_POST['password'];
    $pass = 'SELECT * FROM utilisateur WHERE email= "' . $_POST['mail'] . '"';
    $response = $con->query($pass);
    $row = $response->fetch();
    date_default_timezone_set('Europe/Paris');
    if (!$user){
        $_SESSION['erreur7'] = 1;
		$_SESSION['erreur8'] = 0;
		$_SESSION['success2'] = 0;
        header("Refresh:0; url= ../views/login.php");
    } else if (!password_verify($mdp, $row['MDP'])) {
        $_SESSION['erreur7'] = 0;
		$_SESSION['erreur8'] = 1;
		$_SESSION['success2'] = 0;
        header("Refresh:0; url= ../views/login.php");
    } else {
		$_SESSION['erreur7'] = 0;
		$_SESSION['erreur8'] = 0;
		$_SESSION['success2'] = 1;
        $_SESSION['user'] = 1;
        $_SESSION['idUser'] = $row['Id_UTILISATEUR'];
        $_SESSION['nom'] = $row['Nom'];
        $_SESSION['prenom'] = $row['Prénom'];
        $_SESSION['profil'] = $row['profil'];
        $_SESSION['date'] = new DateTime();
        $_SESSION['dateins'] = $row['Date_inscription'];
        $_SESSION['email'] = $row['email'];
		header("Refresh:0; url= ../views/forum.php");
		exit;
    }
}
if (isset($_POST['reset'])) {
	$_SESSION['erreur7'] = 0;
	$_SESSION['erreur8'] = 0;
	$_SESSION['success2'] = 0;
	header("Refresh:0; url= ../views/login.php");
}
if (isset($_POST['MDP'])) {
	header("Refresh:0; url= ../views/oubliMDP.php");
}
?>