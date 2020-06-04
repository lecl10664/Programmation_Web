<?php
$dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
chdir($dir2.DIRECTORY_SEPARATOR);
//echo getcwd()."<br>";

if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../Vue/header.css">
</head>


<body>
<header>
    <p class="cgu_header">
        Language : <a class="linkHeader" href="../../Controleur/pageAccueil.php">FR</a>
        -
        <a class="linkHeader" href="pageAccueil2.php">EN </a>
        -
        <a class="linkHeader" href="../../chinois/Controleur/pageAccueil1.php">CN </a>
        -
        <a class="linkHeader" href="cgu2.php">Terms and Conditions</a>
        -
        <a class="linkHeader" href="mentionslegales2.php">Legal Mentions</a>
        -
        <a class="linkHeader" href="contact2.php">Contact us</a>

    </p>

    <div class="deuxieme_partie">
        <div id="logo">
            <a href="pageAccueil2.php">
                <img src="../images/Infinite_measures_logo.png"
                     width="150" height="151"
                     alt="logo"/>
            </a>
        </div>
        <div class="title">
            <img src="../images/Infinite_measures.png" alt="logoTexte"/>
        </div>

        <div class="menu">
            <a class="linkmenu" href="forumAccueil2.php">FORUM</a>
            <a class="linkmenu" href="faq2.php">Q&A</a>
            <?php
            if (isset($_SESSION['mailConnecte']) && $_SESSION['profilConnecte'] == "utilisateur")
            { ?>
                <a class="linkmenu" href="../Modele/deconnexion.php">Log Out</a>
                <a class="linkmenu" href="mesDonneesUtilisateurs2.php">MY PROFILE</a>

                <?php
            }
            else if (isset($_SESSION['mailConnecte']) && $_SESSION['profilConnecte'] == "gestionnaire")
            { ?>
                <a class="linkmenu" href="../Modele/deconnexion.php">Log Out</a>
                <a class="linkmenu" href="gestionnaire2.php">MY PROFILE</a>

                <?php
            }
            else if (isset($_SESSION['mailConnecte']) && $_SESSION['profilConnecte'] == "administrateur")
            { ?>
                <a class="linkmenu" href="../Modele/deconnexion.php">Log Out</a>
                <a class="linkmenu" href="pageAdministrateur2.php">MY PROFILE</a>
                <a class="linkmenu" href="gererFAQ2.php">MANAGE Q&A</a>
                <?php
            }else { ?>
                <a class="linkmenu" href="se_connecter2.php">LOGIN</a>

            <?php }
            ?>


        </div>
    </div>
</header>
</body>
</html>
