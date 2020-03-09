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
                <img src="/images/Infinite_measures_logo.png"
                     width="213" height="185"
                     alt="logo"
                     href="/images/pageAccueil.php"</img>
            </div>
            <div class="title">
                <img src="/images/Infinite_measures.png" alt="logoTexte"/>
            </div>

            <div class="menu">

                <a class="linkmenu" href="/php/faq.php">FAQ</a>
                <a class="linkmenu" href="/php/contact.php">NOUS CONTACTER</a>
                <a class="linkmenu" href="/php/se_connecter.php">SE CONNECTER</a>
            </div>
        </header>

    </body>
</html>
