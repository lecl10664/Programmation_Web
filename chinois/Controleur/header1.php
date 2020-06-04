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

        Langue : <a class="linkHeader" href="/APPG9B/Controleur/pageAccueil.php">FR</a> 
        -
        <a class="linkHeader" href="/APPG9B/chinois/Controleur/pageAccueil1.php">CN </a>
        - 
        <a class="linkHeader" href="/APPG9B/anglais/Controleur/pageAccueil2.php">EN </a>
        - 
        <a class="linkHeader" href="cgu1.php">用户协议</a>
        -
        <a class="linkHeader" href="mentionslegales1.php">法律信息</a>
        -
        <a class="linkHeader" href="contact1.php">联系我们</a>

    </p>

    <div class="deuxieme_partie">
        <div id="logo">
            <a href="pageAccueil1.php">
                <img src="../images/Infinite_measures_logo.png"
                     width="150" height="151"
                     alt="logo"/>
            </a>
        </div>
        <div class="title">
            <img src="../images/Infinite_measures.png" alt="logoTexte"/>
        </div>

        <div class="menu">
            <a class="linkmenu" href="forumAccueil1.php">论坛</a>
            <a class="linkmenu" href="faq1.php">FAQ</a>
            <?php
            if (isset($_SESSION['mailConnecte']) && $_SESSION['profilConnecte'] == "utilisateur")
            { ?>
                <a class="linkmenu" href="deconnexion1.php">登出</a>
                <a class="linkmenu" href="mesDonneesUtilisateurs1.php">我的账户</a>

                <?php
            }
            else if (isset($_SESSION['mailConnecte']) && $_SESSION['profilConnecte'] == "gestionnaire")
            { ?>
                <a class="linkmenu" href="deconnexion1.php">登出</a>
                <a class="linkmenu" href="gestionnaire1.php">我的账户</a>

                <?php
            }
            else if (isset($_SESSION['mailConnecte']) && $_SESSION['profilConnecte'] == "administrateur")
            { ?>
                <a class="linkmenu" href="deconnexion1.php">登出</a>
                <a class="linkmenu" href="pageAdministrateur1.php">我的账户</a>
                <?php
            }else { ?>
                <a class="linkmenu" href="se_connecter1.php">登录</a>

            <?php }
            ?>


        </div>
    </div>
</header>
</body>
</html>
