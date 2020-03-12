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

<div id="conteneur">

<div id="menu">
    <li><a href="#">Menu</a>
        <ul>
            <li><a href="#">Mes données</a></li>
            <li><a href="#">Prendre rendez-vous</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Nous contacter</a></li>
        </ul>
    </li>
</div>

<div id="main">
    <p><a href="#">Test auditif</a></p>
    <p><a href="#">Test visuel</a></p>
</div>

<div id="content">
    <div id="profil">
        <h3 class="profil-titre">MON PROFIL</h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p>Nom Prénom</p>
                <p>Age</p>
                <p>Adresse du centre</p>
                <p>Prochain rdv</p>
                <p>Score moyen</p>
                <p>Niveau</p>
            </div>
            <img class="profil-photo" src="/images/profil_400x400.png" title="profil_admin"></img>
        </div>
    </div>
</div>

</div>

</body>

<footer>
    <?php include "./php/footer.php" ?>
</footer>

</html>