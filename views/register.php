<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once "../includes/head.php";
require_once "../controllers/registercontroller.php";

?>
<link rel="stylesheet" href="../CSS/register.css">
<div id="accueil">
    <?php
    if (isset($_SESSION['user']) && $_SESSION['user'] == 1) {
        echo '<div>Vous vous êtes connecté le ' . $_SESSION['date']->format('d/m/Y à H:i:s'). '</div>';
    }
    ?>
</div>
<h1 id="register-title">S'enregistrer</h1>
<div id="register-form-wrapper">
    <div id="register-form">

        <form action="../controllers/registercontroller.php" method="post" id="formulaire" enctype="multipart/form-data">
            <div id="form-container">
                <div id="label">
                    <label class="label-style" for="nom">Nom:</label>
                    <?php
                    if (isset ($_SESSION['erreur1']) && $_SESSION['erreur1'] == 1) {
                        echo '<p id="erreur">Nom incorrect ou trop court (3 caractères minimum et sans chiffres) !</p>';
                    }
                    ?>
                </div>
                <input class="input-style" type="text" name="nom" id="nom" placeholder="Votre nom" />
                <div id="label">
                    <label class="label-style" for="prenom">Prénom:</label>
                    <?php
                    if (isset ($_SESSION['erreur2']) && $_SESSION['erreur2'] == 1) {
                        echo '<p id="erreur">Prénom incorrect ou trop court (3 caractères minimum et sans chiffres) !</p>';
                    }
                    ?>
                </div>
                <input class="input-style" type="text" name="prenom" id="prenom" placeholder="Votre prenom" />
                <div id="label">
                    <label class="label-style" for="mail">Adresse E-mail:</label>
                    <?php
                    if (isset ($_SESSION['erreur3']) && $_SESSION['erreur3'] == 1) {
                        echo '<p id="erreur">E-mail requis ou au bon format !</p>';
                    }
                    if (isset ($_SESSION['erreur4']) && $_SESSION['erreur4'] == 1) {
                        echo '<p id="erreur">Cet E-mail existe déjà !</p>';
                    }
                    ?>
                </div>
                <input class="input-style" type="text" name="mail" id="mail" placeholder="Votre E-mail" />
                <div id="label">
                    <label class="label-style" for="password">Mot de passe:</label>
                    <?php
                    if (isset ($_SESSION['erreur5']) && $_SESSION['erreur5'] == 1) {
                        echo '<p id="erreur">Mot de passe requis ! Il doit contenir au moins 8 caractères incluant 1 minuscule, 1 majuscule, 1 nombre et 1 caractère spécial (#+-^[])</p>';
                    }
                    ?>
                </div>
                <input class="input-style" type="password" name="password" id="password" placeholder="Votre mot de passe" />
                <div id="label">
                    <label class="label-style" for="password2">Confirmation mot de passe:</label>
                    <?php
                    if (isset ($_SESSION['erreur6']) && $_SESSION['erreur6'] == 1) {
                        echo '<p id="erreur">Le mot de passe ne correspond pas !</p>';
                    }
                    ?>
                </div>
                <input class="input-style" type="password" name="password2" id="password2" placeholder="Votre mot de passe" />
            </div>
            <div id="label">
                <label class="label-style" for="profil">Image de profil:</label>
            </div>
            <input class="input-style" type="file" name="profil"/>

            <?php
            if (isset ($_SESSION['success']) && $_SESSION['success'] == 1) {
                echo '<p id="success">Vous vous êtes enregistré !</p>';
            }
            ?>
    </div>
    <div id="btn-container">
        <input id="btn2" class="input-style" type="submit" name="reset" value="Reset" />
        <input id="btn" class="input-style" type="submit" value="S'enregistrer" />
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