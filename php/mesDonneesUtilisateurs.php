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
    <link rel="stylesheet" href="../css/mesDonneesUtilisateur.css" />
    <title>Mes Données utilisateur</title>
</head>
<body>

<div id="conteneur1">
    <div class="header"></div>
    <div class="footer"></div>
    <div id="conteneur2">
    <div class="menu"></div>
    <div class="main"></div>
    <div class="right"></div>
    </div>
</div>

<header>

</header>

<menu>
    <ul id="menu">
            <li><a href="#">Menu</a>
            <ul>
                <li><a href="#">Mes données</a></li>
                <li><a href="#">Prendre rendez-vous</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Nous contacter</a></li>
            </ul>
            </li>
    </ul>
</menu>

<right>
    <p class = "profil"> Mon Profil </p>
    <ul class = "info_profil">
        <li>Nom</li>
        <li>Prénom</li>
        <li>Adresse du centre</li>
        <li>Date du dernier rdv</li>
        <li>Date du prochain rdv</li>
        <li>Score moyen</li>
        <li>Niveau</li>
    </ul>
</right>

<main>
    <p><a href="#">Test auditif</a></p>
    <p><a href="#">Test visuel</a></p>
</main>

<footer>
    <?php include "./php/footer.php" ?>
</footer>

</body>
</html>