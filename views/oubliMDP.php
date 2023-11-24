<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once "../includes/head.php";
require_once "../controllers/oubliMDPcontroller.php";

?>
<link rel="stylesheet" href="../CSS/login.css">
<div id="accueil">
    <?php
    if (isset($_SESSION['user']) && $_SESSION['user'] == 1) {
        echo '<div>Vous vous êtes connecté le ' . $_SESSION['date']->format('d/m/Y à H:i:s') . '</div>';
    }
    ?>
</div>
<h1 id="register-title">Récupération de mot de passe</h1>
<div id="register-form-wrapper">
    <div id="register-form">

        <form action="../controllers/oubliMDPcontroller.php" method="post" id="formulaire">
            <div id="form-container">
                <div id="label">
                    <label class="label-style" for="mail">Adresse E-mail:</label>
                    <?php
                    if (isset($_SESSION['erreur9']) && $_SESSION['erreur9'] == 1) {
                        echo '<p id="erreur">Adresse E-mail incorrecte</p>';
                    }
                    ?>
                </div>
                <input class="input-style" type="text" name="mail" id="mail" placeholder="Votre E-mail" />
                <?php
                if (isset($_SESSION['success3']) && $_SESSION['success3'] == 1) {
                    echo '<p id="success">Mail envoyé</p>';
                }
                ?>
                <div id="btn-container">
                    <input id="btn" class="input-style" type="submit" value="Envoyer" />

                </div>
        </form>
    </div>
</div>
<script>
    let h1s = document.querySelector("h1").innerText;
    document.title = h1s;
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>