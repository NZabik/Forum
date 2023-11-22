<!DOCTYPE html>
<html lang="fr">
<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
$_SESSION['erreur1'] = 0;
$_SESSION['erreur2'] = 0;
$_SESSION['erreur3'] = 0;
$_SESSION['erreur4'] = 0;
$_SESSION['erreur5'] = 0;
$_SESSION['erreur6'] = 0;
$_SESSION['success'] = 0;
$_SESSION['erreur7'] = 0;
$_SESSION['erreur8'] = 0;
$_SESSION['success'] = 0;
$_SESSION['success2'] = 0;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="CSS/ResetCSS.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/Style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon bg-light"></span>
                </button>
                <div class="collapse navbar-collapse text-white" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active text-white mx-2" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                        <?php if (isset($_SESSION['user']) && $_SESSION['user'] == 1) {
                                echo '<a class="nav-link active text-white mx-2" id="deco2" href="/views/forum.php">Forum</a>';
                        } else { echo '<a class="nav-link disabled text-secondary mx-2" id="deco2" href="/views/forum.php">Forum</a>';
                        }    ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white mx-2" href="./views/register.php">S'enregistrer</a>
                        </li>
                        <li class="nav-item">
                        <?php if (isset($_SESSION['user']) && $_SESSION['user'] == 1) {
                                echo '<a class="nav-link disabled text-secondary mx-2" id="deco3" href="/views/login.php">Se connecter</a>';
                        } else { echo '<a class="nav-link active text-white mx-2" id="deco3" href="/views/login.php">Se connecter</a>';
                        }    ?>
                        </li>
                        <li class="nav-item">
                        <?php if (isset($_SESSION['user']) && $_SESSION['user'] == 1) {
                                echo '<a class="nav-link active text-white mx-2" id="deco" href="/controllers/deco.php">Se déconnecter</a>';
                        } else { echo '<a class="nav-link disabled text-secondary mx-2" id="deco" href="/controllers/deco.php">Se déconnecter</a>';
                        }    ?>
                        </li>
                    </ul>
                    <div id="profilNav" class="position-absolute top-0 end-0">
                        <div></div>
                        <div id="login">
                            <?php if (isset($_SESSION['user']) && $_SESSION['user'] == 1) {
                                echo '<div id="nomProfil" class="mx-2">' . $_SESSION['nom'] . ' ' . $_SESSION['prenom'] . '</div>';
                                echo '<div id="divProfil" class="mx-2"><img id="profil" class="" src="' . $_SESSION['profil'] . '"alt="profil"></div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <h1 id="register-title">FORUM DES FANS DE LA MARQUE UNIQUE</h1>

    <div class="accueil position-absolute bottom-0 start-50 translate-middle-x">
        <div id="btn-container">
            <a href="/views/register.php" id="btn2" class="input-style">S'enregistrer</a>
            <a href="/views/login.php" id="btn" class="input-style">Se connecter</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>