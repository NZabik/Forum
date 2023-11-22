<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once "../includes/head.php";
require_once "../controllers/connexiondb.php";
?>
<link rel="stylesheet" href="../CSS/sujet.css">
<div id="accueil">
    <?php
    if (isset($_SESSION['user']) && $_SESSION['user'] == 1) {
        echo '<div>Vous vous êtes connecté le ' . $_SESSION['date']->format('d/m/Y à H:i:s') . '</div>';
    }
    ?>
</div>
<?php 
$con = connectdb();
date_default_timezone_set('Europe/Paris');
$req = "SELECT sujet.Id_SUJET,sujet.Nom_sujet FROM sujet where sujet.Id_SUJET='" . $_GET['id'] . "'";
$req2 = "SELECT discussion.Id_DISCUSSION,discussion.commentaire,discussion.datecommentaire,sujet.Id_SUJET,utilisateur.Nom,utilisateur.Prénom,sujet.Nom_sujet FROM sujet join discussion on discussion.Id_SUJET = sujet.Id_SUJET join utilisateur on utilisateur.Id_UTILISATEUR = discussion.id_UTILISATEUR WHERE sujet.Id_SUJET='" . $_GET['id'] . "' ORDER BY discussion.Id_DISCUSSION";
$response = $con->query( $req );
$response2 = $con->query( $req2 );
$row2= $response->fetch();
$rows= $response2->fetchAll();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comm = $_POST['commentaire'];
    $date3 = new DateTime();
    if ($comm == "") {

        header("Refresh:0");
} else {
    $req = $con->prepare("INSERT INTO discussion (commentaire,datecommentaire,Id_SUJET,id_UTILISATEUR) VALUES (?,?,?,?)");
		$req->execute(array($comm,$date3->format('d/m/Y à H:i:s'),$_GET['id'],$_SESSION['idUser']));
        header("Refresh:0");
}
}
echo '<h1 id="register-title">' . $row2['Nom_sujet'] . '</h1>';
?>

<table class="table table-striped" id="myTable">
    <thead>
        <tr>
            <th class="sujet">Commentaire</th>
            <th class="modif">Date commentaire</th>
            <th class="auteur">Auteur</th>
        </tr>
    </thead>
    <tbody id="tableBody">
        <?php
        // boucle foreach pour afficher chaque ligne de la requête
        foreach ($rows as $row) {
            echo '<tr>
            <td>' . $row['commentaire'] . '</td>
            <td>' . $row['datecommentaire'] . '</td>
            <td>' . $row['Nom'] . ' ' . $row['Prénom'] . '</td>
                </tr>';
        }
        ?>
    </tbody>
</table>
<form action="" method="post" id="formulaire">
    <div id="ajout" class="form-field">
        <input type="text" id="sujet" name="commentaire" placeholder="Ajouter un commentaire">
        <input type="submit" id="btn" value="Ajouter">
    </div>
</form>
<script>
    let h1s = document.querySelector("h1").innerText;
    document.title = h1s;
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>