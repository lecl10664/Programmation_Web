<?php
    $dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
    chdir($dir2.DIRECTORY_SEPARATOR);
    /*
    echo __DIR__."<br>";
    echo __FILE__."<br>";
    echo $_SERVER['SCRIPT_FILENAME']."<br>";
    echo $_SERVER['SCRIPT_NAME']."<br>";
    echo $dir2.DIRECTORY_SEPARATOR."<br>";
    echo getcwd()."<br>";
    */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PageAdministrateur</title>
    <link rel="stylesheet" href='/css/pageAdministrateur.css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <?php include_once('./php/header.php');?>

    <!--  <div id="content1">

        <div id="users">
            <h3 class="users-titre">UTILISATEURS</h3>
            <div class="users-colonnes">
                <div class="users-texte">
                    <p>Nom Prénom</p>
                    <p>Age</p>
                    <p>Date de naissance</p>
                    <p>Adresse</p>
                </div>
            </div>
        </div>

        <div id="profil-admin">
            <h3 class="profil-admin-titre">MON PROFIL</h3>
            <div class="profil-admin-colonnes">
                <div class="profil-admin-texte">
                    <p>Nom Prénom</p>
                    <p>Age</p>
                    <p>Date de naissance</p>
                    <p>Adresse</p>
                </div>
                <img class="profil-admin-photo" src="/images/profil_400x400.png" title="profil_admin"></img>
            </div>
        </div>
    </div>
    -->

    <div id="conteneur1">
        <div id="menu">
            <a href="#" class="active">Menu</a>
            <a href="mesDonneesUtilisateurs.php">Mes données</a>
            <a href="utilisateur.php">Mes rendez-vous</a>
            <a href="faq.php">FAQ</a>
            <a href="contact.php">Nous contacter</a>
        </div>

        <div id="main">
            Couleurs à modifier ?

        </div>

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

    <?php include_once("./php/footer.php");?>



</body>
</html>
