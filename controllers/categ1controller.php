<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once "connexiondb.php";
$con = connectdb();
date_default_timezone_set('Europe/Paris');
$req = "SELECT sujet.Id_SUJET,sujet.Nom_sujet,sujet.date,sujet.Id_UTILISATEUR,utilisateur.Nom,utilisateur.Prénom from sujet join utilisateur on utilisateur.Id_UTILISATEUR = sujet.Id_UTILISATEUR WHERE Id_CATEGORIE = 1 order by Id_SUJET";
// avoir la réponse de la requête dans une autre requête qui se connecte à la BDD
$res = $con->query($req);
// on récupère toutes les lignes de la requête
$lignes = $res->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sujet = $_POST['sujet'];
    $date2 = new DateTime();
    if ($sujet == "") {

        header("Refresh:0; url= ../views/categorie1.php");
} else {
    $req = $con->prepare("INSERT INTO sujet (Nom_sujet,Id_UTILISATEUR,Id_CATEGORIE,date) VALUES (?,?,?,?)");
		$req->execute(array($sujet,$_SESSION['idUser'],1,$date2->format('d/m/Y à H:i:s')));
        header("Refresh:0; url= ../views/categorie1.php");
}
}