<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once "../includes/head.php";
require_once "../controllers/profilcontroller.php";
?>
<link rel="stylesheet" href="../CSS/profil.css">
<div id="accueil">
    <?php
    if (isset($_SESSION['user']) && $_SESSION['user'] == 1) {
        echo '<div>Vous vous êtes connecté le ' . $_SESSION['date']->format('d/m/Y à H:i:s') . '</div>';
    }
    ?>
</div>
<h1 id="register-title">Page profil utilisateur</h1>
<table class="table table-striped" id="myTableProfil">
    <tbody id="tableBody"></tbody>
    <td id="tableTitle">Nom:</td>
    <?php echo '<td>' . $_SESSION['nom'] . '</td>' ?>
    <tr>
        <td id="tableTitle">Prénom:</td>
        <?php echo '<td>' . $_SESSION['prenom'] . '</td>' ?>
    <tr>
        <td id="tableTitle">Date d'inscription:</td>
        <?php echo '<td>' . $_SESSION['dateins'] . '</td>' ?>
    <tr>
        <td id="tableTitle">Photo de profil:</td>
        <?php echo '<td id ="divProfil2"><img id="profil2" class="" src="' . $_SESSION['profil'] . '"alt="profil"</td>' ?>
</table>
<table class="table table-striped" id="myTable">
    <thead>
        <tr>
            <th colspan="2" id="tableTitle2">Sujets créés</th>
        </tr>
    </thead>
    <tbody id="tableBody">
    <?php
        foreach ($rows as $row) {
            echo '<tr>
            <td>' . $row['Nom_sujet'] . '</td>
            </tr>';
        }
        ?>
    </tbody>
</table>
</table>
<table class="table table-striped" id="myTable">
    <thead>
        <tr>
            <th colspan="2" id="tableTitle2">Commentaires créés</th>
        </tr>
    </thead>
    <tbody id="tableBody">
    <?php
        foreach ($lignes as $ligne) {
            echo '<tr>
            <td>' . $ligne['commentaire'] . '</td>
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