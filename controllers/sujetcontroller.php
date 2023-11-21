<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once "connexiondb.php";
$con = connectdb();
date_default_timezone_set('Europe/Paris');
$req2 = "SELECT discussion.Id_DISCUSSION,discussion.commentaire,discussion.datecommentaire,discussion.Id_SUJET,utilisateur.Nom,utilisateur.Prénom,sujet.Nom_sujet FROM discussion join utilisateur on utilisateur.Id_UTILISATEUR = discussion.id_UTILISATEUR join sujet on sujet.Id_SUJET = discussion.Id_SUJET WHERE discussion.Id_SUJET='" . $_GET['id'] . "'";
$response = $con->query( $req2 );
$rows= $response->fetchAll();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comm = $_POST['commentaire'];
    $date3 = new DateTime();
    if ($comm == "") {

        header("location= ../views/sujet.php");
} else {
    $req = $con->prepare("INSERT INTO discussion (commentaire,datecommentaire,Id_SUJET,id_UTILISATEUR) VALUES (?,?,?,?)");
		$req->execute(array($comm,$date3->format('d/m/Y à H:i:s'),$_GET['id'],$_SESSION['idUser']));
        header("location= ../views/sujet.php");
}
}