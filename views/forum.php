<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once "../includes/head.php";
?>
<link rel="stylesheet" href="../CSS/forum.css">
<div id="accueil">
    <?php
    if (isset($_SESSION['user']) && $_SESSION['user'] == 1) {
        echo '<div>Vous vous êtes connecté le ' . $_SESSION['date']->format('d/m/Y à H:i:s'). '</div>';
    }
    ?>
</div>
<h1 id="register-title">FORUM DES FANS DE LA MARQUE UNIQUE</h1>
<div class="normal">
    <div class="card position-absolute top-50 start-0 translate-middle-y" style="width: 25rem;" id="card1">
        <div class="card-body">
            <h5 class="card-title">Les caractéristiques</h5>
            <p class="card-text">Venez discuter des caractéristiques des différentes armes</p>
            <a href="../views/categorie1.php" class="card-link"><input type="button" id="carabtn" value="J'y vais"></a>
        </div>
    </div>
    <div class="card position-absolute top-50 start-50 translate-middle" style="width: 25rem;" id="card2">
        <div class="card-body">
            <h5 class="card-title">Les accessoires</h5>
            <p class="card-text">Venez discuter des accessoires des différentes armes</p>
            <a href="../views/categorie2.php" class="card-link"><input type="button" id="carabtn" value="J'y vais"></a>
        </div>
    </div>
    <div class="card position-absolute top-50 end-0 translate-middle-y" style="width: 25rem;" id="card3">
        <div class="card-body">
            <h5 class="card-title">Vente entre particuliers</h5>
            <p class="card-text">Vendez différentes armes</p>
            <a href="../views/categorie3.php" class="card-link"><input type="button" id="carabtn" value="J'y vais"></a>
        </div>
    </div>
</div>
<div class="hidden">
    <div class="card " style="width: 25rem;" id="card1">
        <div class="card-body">
            <h5 class="card-title">Les caractéristiques</h5>
            <p class="card-text">Venez discuter des caractéristiques des différentes armes</p>
            <a href="../views/categorie1.php" class="card-link"><input type="button" id="carabtn" value="J'y vais"></a>
        </div>
    </div>
    <div class="card " style="width: 25rem;" id="card2">
        <div class="card-body">
            <h5 class="card-title">Les accessoires</h5>
            <p class="card-text">Venez discuter des accessoires des différentes armes</p>
            <a href="../views/categorie2.php" class="card-link"><input type="button" id="carabtn" value="J'y vais"></a>
        </div>
    </div>
    <div class="card " style="width: 25rem;" id="card3">
        <div class="card-body">
            <h5 class="card-title">Vente entre particuliers</h5>
            <p class="card-text">Vendez différentes armes</p>
            <a href="../views/categorie3.php" class="card-link"><input type="button" id="carabtn" value="J'y vais"></a>
        </div>
    </div>
</div>
<script>
    let h1s = document.querySelector("h1").innerText;
    document.title = h1s;
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>