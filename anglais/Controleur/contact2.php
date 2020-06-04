<?php
    $dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
    chdir($dir2.DIRECTORY_SEPARATOR);
    //echo getcwd()."<br>";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Contact us</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../Vue/contact.css">
    <head>
    <header>
            <?php include "header2.php" ?>
    </header>
    <body>
    <h1>
        Contact us
    </h1>
        <div id = content>
            <ul>
                <li>Contact an administrator :</li>
                    <p>
                        <a href="mailto:test@gmail.com">Send an email</a><br /><br />
                        Phone number : 06 00 00 00 00
                    </p>
                <li>Contact Infinite Measures :</li>
                    <p>
                        <a href="mailto:test@gmail.com">Send an email</a><br /><br />
                        Phone number : 06 00 00 00 00<br /><br />
                        Head office address : 10 Rue de Vanves, 92130 Issy-les-Moulineaux
                    </p>
            </ul>
        </div>
    </body>
    <footer>
        <?php include "footer2.php" ?>
    </footer>

</html>
