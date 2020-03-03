<?php
    //$dir = $_SERVER["DOCUMENT_ROOT"];
    //$dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
    $dir2 = substr(__FILE__, 0, -strlen($_SERVER['SCRIPT_NAME']));
    echo $dir2.'<br>';
    chdir($dir2);
    echo getcwd().'<br>';
    //echo getcwd().'/pageAdministrateur/pageAdministrateur.css';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PageAdministrateur</title>
    <link rel="stylesheet" href='/pageAdministrateur/pageAdministrateur.css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <?php include_once "./header/header.html" ?>
    <div id="content">

        <div id="profil">
            <h3 class="profil-titre">MON PROFIL</h3>

            <div class="profil-colonnes">
                <div class="profil-texte">
                    <p>Nom Prénom</p>
                    <p>Age</p>
                    <p>Date de naissance</p>
                    <p>Adresse</p>
                </div>
                <img class="profil-photo" src="/images/profil_400x400.png" title="profil_admin"></img>
            </div>

        </div>

    </div>
    <?php include_once "./footer/footer.html" ?>



</body>
</html>
