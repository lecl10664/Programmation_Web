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
    <link rel="stylesheet" href="../css/gestionnaire.css" />
    <script src="https://kit.fontawesome.com/8bfc90242a.js" crossorigin="anonymous"></script>
    <title>Mes Données utilisateur</title>
</head>

<body>

<div id="conteneur1">
    <div id="menu">
        <a href="#" class="active">Menu</a>
        <a href="">Lancer un test</a>
        <a href="">Utilisateurs</a>
        <a href="">Forum</a>
    </div>

    <div id="main">
        <button class="button_play"> <i class="fas fa-play"></i> Lancer un test ! </button>
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

</body>

<footer>
    <?php include "./php/footer.php" ?>
</footer>

</html>