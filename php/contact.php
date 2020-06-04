<?php
    $dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
    chdir($dir2.DIRECTORY_SEPARATOR);
    //echo getcwd()."<br>";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Nous contacter</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/contact.css">
    <head>
    <header>
            <?php include "header.php" ?>
    </header>
    <body>
    <h1>
        Nous contacter
    </h1>
        <div id = content>
            <ul>
                <li>Contacter un administrateur :</li>
                    <p>
                        <a href="mailto:test@gmail.com">Envoyer un mail</a><br /><br />
                        Numéro de téléphone : 06 00 00 00 00
                    </p>
                <li>Contacter Infinite Measures :</li>
                    <p>
                        <a href="mailto:test@gmail.com">Envoyer un mail</a><br /><br />
                        Numéro de téléphone : 06 00 00 00 00<br /><br />
                        Adresse du siège social : 10 Rue de Vanves, 92130 Issy-les-Moulineaux
                    </p>
            </ul>
        </div>
    </body>
    <footer>
        <?php include "footer.php" ?>
    </footer>

</html>
