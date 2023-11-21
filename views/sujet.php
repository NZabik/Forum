<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once "../includes/head.php";
require_once "../controllers/sujetcontroller.php";
?>
<link rel="stylesheet" href="../CSS/sujet.css">
<div id="accueil">
    <?php
    if (isset($_SESSION['user']) && $_SESSION['user'] == 1) {
        echo '<div>Vous vous êtes connecté le ' . $_SESSION['date']->format('d/m/Y à H:i:s') . '</div>';
    }
    ?>
</div>
<!-- <?php echo '<h1 id="register-title">' . $rows['Nom_sujet'] . '</h1>'?> -->

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
<form action="../controllers/sujetcontroller.php" method="post" id="formulaire">
    <div id="ajout" class="form-field">
        <input type="text" id="commentaire" name="commentaire" placeholder="Ajouter un commentaire">
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