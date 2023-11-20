<?php
require_once "../includes/head.php";
require_once "../controllers/logincontroller.php";
?>
<link rel="stylesheet" href="../CSS/login.css">
<div>
<?php echo ($_SESSION['date']->format('d-m-Y H:i:s'));?>
</div>
<h1 id="register-title">Connexion</h1>
<div id="register-form-wrapper">
    <div id="register-form">
    
        <form action="../controllers/logincontroller.php" method="post" id="formulaire">
            <div id="form-container">
                <div id="label">
                    <label class="label-style" for="mail">Adresse E-mail:</label>
                    <?php
                    if ($_SESSION['erreur7'] == 1) {
                        echo '<p id="erreur">Adresse E-mail incorrecte</p>';
                    }
                    ?>
                </div>
                <input class="input-style" type="text" name="mail" id="mail" placeholder="Votre E-mail" />
                <div id="label">
                    <label class="label-style" for="password">Mot de passe:</label>
                    <?php
                    if ($_SESSION['erreur8'] == 1) {
                        echo '<p id="erreur">Mot de passe incorrect</p>';
                    }
                    ?>
                </div>
                <input class="input-style" type="password" name="password" id="password" placeholder="Votre mot de passe" />
                <?php
                if ($_SESSION['success2'] == 1) {
                    echo '<p id="success">Vous vous êtes connecté !</p>';
                }
                ?>
                <div id="btn-container">
                    <input id="btn2" class="input-style" type="submit" name="reset" value="Reset" />
                    <input id="btn" class="input-style" type="submit" value="Connexion" />
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