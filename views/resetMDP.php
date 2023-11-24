<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once "../includes/head.php";
require_once "../controllers/connexiondb.php";
?>
<link rel="stylesheet" href="../CSS/register.css">
<div id="accueil">
    <?php
    if (isset($_SESSION['user']) && $_SESSION['user'] == 1) {
        echo '<div>Vous vous êtes connecté le ' . $_SESSION['date']->format('d/m/Y à H:i:s') . '</div>';
    }
    $con = connectdb();
    $req = 'SELECT * FROM utilisateur WHERE token="' . $_GET['token'] . '"';
    $response = $con->query($req);
    $row = $response->fetch();
    $token = $_GET['token'];
    var_dump($token);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $token = $_GET['token'];
        $tokenExist = $con->prepare("SELECT * FROM utilisateur where token=?");
        $tokenExist->execute([$token]);
        $user = $tokenExist->fetch();
        $regpass = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[#\^\+\-\[\]])(?=.{8,})/';
        $mdp = $_POST['password'];
        $mdp_hashed = password_hash($mdp, PASSWORD_BCRYPT);
        $mdp2 = $_POST['password2'];
        if (!preg_match($regpass, $mdp) || $mdp == "") {
            $_SESSION['erreur10'] = 1;
            $_SESSION['erreur11'] = 0;
            $_SESSION['erreur12'] = 0;
            $_SESSION['success4'] = 0;
            header("refresh:0");
        } else if (!$user) {
            header("refresh:0");
            $_SESSION['erreur10'] = 0;
            $_SESSION['erreur11'] = 0;
            $_SESSION['erreur12'] = 1;
            $_SESSION['success4'] = 0;
        } else if ($mdp != $mdp2) {
            $_SESSION['erreur10'] = 0;
            $_SESSION['erreur11'] = 1;
            $_SESSION['erreur12'] = 0;
            $_SESSION['success4'] = 0;
            header("refresh:0");
        } else {
            $req = $con->query("UPDATE utilisateur SET mdp='$mdp_hashed',token='' WHERE token='$token'");
            $_SESSION['erreur10'] = 0;
            $_SESSION['erreur11'] = 0;
            $_SESSION['erreur12'] = 0;
            $_SESSION['success4'] = 1;
            header("location: ../views/login.php");
        }
    }
    ?>
</div>
<h1 id="register-title">Réinitialisation du mot de passe</h1>
<div id="register-form-wrapper">
    <div id="register-form">

        <form action="" method="post" id="formulaire">
            <div id="form-container">
                <div id="label">
                    <label class="label-style" for="password">Mot de passe:</label>
                    <?php
                    if (isset($_SESSION['erreur10']) && $_SESSION['erreur10'] == 1) {
                        echo '<p id="erreur">Mot de passe requis ! Il doit contenir au moins 8 caractères incluant 1 minuscule, 1 majuscule, 1 nombre et 1 caractère spécial (#+-^[])</p>';
                    }
                    if (isset($_SESSION['erreur12']) && $_SESSION['erreur12'] == 1) {
                        echo '<p id="erreur">Changement du mot de passe interdit</p>';
                    }
                    ?>
                </div>
                <input class="input-style" type="password" name="password" id="password" placeholder="Votre mot de passe" />
                <div id="label">
                    <label class="label-style" for="password2">Confirmation mot de passe:</label>
                    <?php
                    if (isset($_SESSION['erreur11']) && $_SESSION['erreur11'] == 1) {
                        echo '<p id="erreur">Le mot de passe ne correspond pas !</p>';
                    }
                    ?>
                </div>
                <input class="input-style" type="password" name="password2" id="password2" placeholder="Votre mot de passe" />
            </div>

    </div>
    <div id="btn-container">
        <input id="btn" class="input-style" type="submit" value="Changer le mot de passe" />
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