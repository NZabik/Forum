<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once "../includes/head.php";
require_once "connexiondb.php";
$con = connectdb();
?>
<link rel="stylesheet" href="../CSS/categorie1.css">
<?php
if (count($_POST) > 0) {
    global $con;
    $req = "DELETE FROM discussion WHERE discussion.Id_discussion='" . $_GET['id'] . "'";
    $response = $con->query($req);
    header("location: ../views/forum.php");
}
$req2 = "SELECT * FROM discussion WHERE discussion.Id_discussion='" . $_GET['id'] . "'";
$response = $con->query($req2);
$row = $response->fetch();
?>
<html>

<head>
    <title>supression</title>
</head>

<body>
    <form name="supp" method="post" action="">
        N° discussion: <br>
        <?php echo $row['Id_DISCUSSION']; ?>
        <br>
        Commentaire: <br>
        <?php echo $row['commentaire']; ?>
        <br>
        <div id="space">
            <input type="submit" name="submit" value="Supprimer" class="btn btn-danger mx-1">
        </div>
    </form>
    <div id="space"><a href="livres.php"><button class="btn btn-outline-dark mx-1">retour</button></a></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>