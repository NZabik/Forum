<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once "../includes/head.php";
require_once "../controllers/categ1controller.php";
?>
<link rel="stylesheet" href="../CSS/categorie1.css">
<div id="accueil">
    <?php
    if (isset($_SESSION['user']) && $_SESSION['user'] == 1) {
        echo '<div>Vous vous êtes connecté le ' . $_SESSION['date']->format('d/m/Y à H:i:s') . '</div>';
    }
    ?>
</div>
<h1 id="register-title">Les caractéristiques</h1>

<form action="../controllers/categ1controller.php" method="post" id="formulaire">
    <div id="ajout" class="form-field">
        <input type="text" id="sujet" name="sujet" placeholder="Ajouter un sujet">
        <input type="submit" id="btn" value="Ajouter">
    </div>
</form>


<table class="table table-striped" id="myTable">
    <thead>
        <tr>
            <th class="sujet">Sujet</th>
            <th class="modif">date de création</th>
            <th class="auteur">Auteur</th>
            <th class="lien">lien</th>
        </tr>
    </thead>
    <tbody id="tableBody">
        <?php
        // boucle foreach pour afficher chaque ligne de la requête
        foreach ($lignes as $ligne) {
            echo '<tr>
            <td>' . $ligne['Nom_sujet'] . '</td>
            <td>' . $ligne['date'] . '</td>
            <td>' . $ligne['Nom'] . ' ' . $ligne['Prénom'] . '</td>
            <td align="center" width ="100"><a href="sujet.php?id=' . $ligne['Id_SUJET'] . '"><button class="btn btn-primary mx-1">Aller</button></a></td>
                </tr>';
        }
        ?>
    </tbody>

</table>
<script>
    let h1s = document.querySelector("h1").innerText;
    document.title = h1s;
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>