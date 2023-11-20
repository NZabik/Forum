<?php
require_once "../includes/head.php";
?>
<link rel="stylesheet" href="../CSS/categorie1.css">
    <div id="accueil">
        <p>Bienvenue <span id="prenom"></span></p>
        <p>Nous sommes le <span id="date"></span></p>
        <p>Vous vous êtes connecté à: <span id="heure"></span></p>
    </div>
    <h1 id="register-title">Les caractéristiques</h1>

    <form>
        <div id="ajout" class="form-field">
            <input type="text" id="sujet" placeholder="Ajouter un sujet">
            <input type="submit" id="btn" value="Ajouter">
        </div>
    </form>


    <table class="table table-striped" id="myTable">
        <thead>
            <tr>
                <th class="nb">#</th>
                <th class="sujet">Sujet</th>
                <th class="modif">Dernière modification</th>
                <th class="auteur">Auteur</th>
            </tr>
        </thead>
        <tbody id="tableBody">

        </tbody>

    </table>
    <p id="indic">Cliquez sur la ligne du sujet qui vous intéresse pour entrer dans la page de discussion</p>
    <script>
        let h1s = document.querySelector("h1").innerText;
        document.title = h1s;
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>

    </html>