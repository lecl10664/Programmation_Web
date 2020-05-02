<?php
$dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
chdir($dir2.DIRECTORY_SEPARATOR);
//echo getcwd()."<br>";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <?php include "./php/header.php" ?>
    <link rel="stylesheet" href="../css/gestionnaire_rechercheAdmin.css" />
    <script src="https://kit.fontawesome.com/8bfc90242a.js" crossorigin="anonymous"></script>
    <title>Recherche des administrateurs</title>
</head>

<div id="conteneur1">
    <div id="menu">
        <a href="#" class="active">Menu</a>
        <a href="gestionnaire.php">Lancer un test</a>
        <a href="../php/ajout_resultats_tests.php">Nouveau résultat</a>
        <a href="gestionnaire_rechercheAdmin.php">Utilisateurs</a>
        <a href="">Forum</a>
    </div>

    <div id="main">
        <h1> Rechercher un administrateur</h1>
        <h2> Quel type de recherche voulez-vous effectuer ?</h2>
        <div id="boutons">
            <button class="button_bar"> Effectuer une recherche par nom </button>
            <button class="button_critere"> Effectuer une recherche par critères </button>
        </div>
    </div>

    <div id="profil">
        <h3 class="profil-titre">MON PROFIL</h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p>Nom</p>
                <p>Prénom</p>
                <p>Adresse du centre</p>
            </div>
            <img class="profil-photo" src="/images/profil_400x400.png"></img>
        </div>
    </div>

</div>

<div id="recherche">
    <div class="searchbar">
        <h1>Rechercher un utilisateur par nom</h1>
        <form action=""  method="post">
            <input type="search" name="utilisateur" size="30" placeholder=""/>
            <input class="button" type="button" value="ok" />
        </form>
    </div>

    <div id="recherche_criteres">
        <h1>Rechercher un utilisateur par critères</h1>
        <label for="age">Age :</label> <input type="text" name="age" id="age" />
        <label for="ville">Ville :</label> <input type="text" name="ville" id="ville" />
        <label for="agence">Agence :</label> <input type="text" name="agence" id="agence" />
    </div>
</div>

<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
</script>

<script>
    $('.button_bar').click(function(e) {
        e.preventDefault();
        $('.searchbar').toggleClass('active');
    })

    $('.button_critere').click(function(e) {
        e.preventDefault();
        $('#recherche_criteres').toggleClass('active');
    })
</script>

</body>

<footer>
    <?php include "./php/footer.php" ?>
</footer>

</html>
