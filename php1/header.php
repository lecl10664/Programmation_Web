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
    <link rel="stylesheet" href="../css/header.css">
</head>


<body>
<header>
    <p class="cgu_header">
        <a class="linkHeader" href="">Langue : CN  </a>
        - 
        <a class="linkHeader" href="cgu.php">用户协议</a>
        -
        <a class="linkHeader" href="mentionslegales.php">法律信息</a>
        -
        <a class="linkHeader" href="contact.php">联系我们</a>

    </p>

    <div class="deuxieme_partie">
        <div id="logo">
            <a href="pageAccueil.php">
                <img src="../images/Infinite_measures_logo.png"
                     width="150" height="151"
                     alt="logo"/>
            </a>
        </div>
        <div class="title">
            <img src="../images/Infinite_measures.png" alt="logoTexte"/>
        </div>

        <div class="menu">
            <a class="linkmenu" href="forumAccueil.php">论坛</a>
            <a class="linkmenu" href="faq.php">FAQ</a>
            <?php
            if (isset($_SESSION['mailConnecte']) && $_SESSION['profilConnecte'] == "utilisateur")
            { ?>
                <a class="linkmenu" href="deconnexion.php">登出</a>
                <a class="linkmenu" href="mesDonneesUtilisateurs.php">我的账户</a>

                <?php
            }
            else if (isset($_SESSION['mailConnecte']) && $_SESSION['profilConnecte'] == "gestionnaire")
            { ?>
                <a class="linkmenu" href="deconnexion.php">登出</a>
                <a class="linkmenu" href="gestionnaire.php">我的账户</a>

                <?php
            }
            else if (isset($_SESSION['mailConnecte']) && $_SESSION['profilConnecte'] == "administrateur")
            { ?>
                <a class="linkmenu" href="deconnexion.php">登出</a>
                <a class="linkmenu" href="pageAdministrateur.php">我的账户</a>
                <?php
            }else { ?>
                <a class="linkmenu" href="se_connecter.php">登录</a>

            <?php }
            ?>


        </div>
    </div>
</header>
</body>
</html>
