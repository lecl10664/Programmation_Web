<?php
    $dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
    chdir($dir2.DIRECTORY_SEPARATOR);
    //echo getcwd()."<br>";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/header.css">
    </head>


    <body>
        <header>
            <div id="logo">
                <a href="/php/pageAccueil.php">
                    <img src="/images/Infinite_measures_logo.png"
                     width="202" height="176"
                     alt="logo"/>
                </a>
            </div>
            <div class="title">
                <img src="/images/Infinite_measures.png" alt="logoTexte"/>
            </div>

            <div class="menu">
                <a class="linkmenu" href="/php/faq.php">FAQ</a>
                <?php
                if (isset($_SESSION['mailGestionnaire']))
                { ?>
                    <a class="linkmenu" href="pageAccueil.php">SE DECONNECTER</a>

               <?php } else { ?>


                    <a class="linkmenu" href="se_connecter.php">SE CONNECTER</a>

               <?php }
                ?>

            </div>

        </header>
    </body>
</html>
