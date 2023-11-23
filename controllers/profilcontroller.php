<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once "connexiondb.php";
$con = connectdb();
$req = "SELECT * from sujet WHERE Id_UTILISATEUR = '" . $_SESSION['idUser'] . "' order by Id_SUJET";
$response = $con->query( $req );
$rows= $response->fetchAll();
$req2 = "SELECT * from discussion WHERE id_UTILISATEUR = '" . $_SESSION['idUser'] . "' order by Id_DISCUSSION";
$response2 = $con->query( $req2 );
$lignes= $response2->fetchAll();
