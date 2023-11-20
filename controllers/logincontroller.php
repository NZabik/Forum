<?php  session_start();
require_once "connexiondb.php";
$con = connectdb();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = $_POST['mail'];
	$mailExist = $con->prepare("SELECT * FROM utilisateur where email=?");
	$mailExist->execute([$mail]);
	$user = $mailExist->fetch();
    $mdp = $_POST['password'];
    $pass = 'SELECT MDP FROM utilisateur WHERE email= "' . $_POST['mail'] . '"';
    $response = $con->query($pass);
    $row = $response->fetch();
    $dt = getdate();
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
        $_SESSION['user'] = $mail;
        $_SESSION['date'] = $dt;
		header("Refresh:0; url= ../views/login.php");
		exit;
    }
}
if (isset($_POST['reset'])) {
	$_SESSION['erreur7'] = 0;
	$_SESSION['erreur8'] = 0;
	$_SESSION['success2'] = 0;
	header("Refresh:0; url= ../views/login.php");
}
?>