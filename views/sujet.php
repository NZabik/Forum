<?php
require_once "../includes/head.php";
?>
<link rel="stylesheet" href="../CSS/sujet.css">
    <div id="accueil">
        <p>Bienvenue <span id="prenom"></span></p>
        <p>Nous sommes le <span id="date"></span></p>
        <p>Vous vous êtes connecté à: <span id="heure"></span></p>
    </div>
    <h1 id="register-title"></h1>
    
    <table class="table table-striped" id="myTable">
        <thead>
            <tr>
                <th class="sujet">Commentaire</th>
                <th class="modif">Date commentaire</th>
                <th class="auteur">Auteur</th>
            </tr>
        </thead>
        <tbody id="tableBody">

        </tbody>
    </table>
    <form>
        <div id="ajout" class="form-field">
            <input type="text" id="sujet" placeholder="Ajouter un commentaire">
            <input type="submit" id="btn" value="Ajouter">
        </div>
    </form>
    <script>
        let h1s = document.querySelector("h1").innerText;
        document.title = h1s;
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>