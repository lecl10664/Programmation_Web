<?php
    $dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
    chdir($dir2.DIRECTORY_SEPARATOR);
    //echo getcwd()."<br>";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Nous contacter</title>
        <?php include "./php/header.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/css/bodyAccueil.css">
    <head>
    <ul>
        <li>Contacter un administrateur :</li>
        <p>
            <a href="mailto:test@gmail.com">Envoyer un mail</a><br /><br />
            Numéro de téléphone : 06 00 00 00 00
        </p>
        <li>Contacter InfiniteMeasures :</li>
        <p>
            <a href="mailto:test@gmail.com">Envoyer un mail</a><br /><br />
            Numéro de téléphone : 06 00 00 00 00<br /><br />
            Adresse du siège social : 10 Rue de Vanves, 92130 Issy-les-Moulineaux
        </p>
    </ul>

    <footer>
        <?php include "./php/footer.php" ?>
    </footer>

</html>