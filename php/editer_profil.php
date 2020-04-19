<?php
    $dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
    chdir($dir2.DIRECTORY_SEPARATOR);
    //echo getcwd()."<br>";
?>
<!DOCTYPE html>
<html>
    <head>
          <title>Editer son profil</title>
          <meta charset="utf-8" />
          <link rel="stylesheet" href="/css/editer_profil.css">
    <head>
    <header>
        <?php include "./php/header.php" ?>
    </header>
    <body>
        <div id = content>
        <p>
            Changer le nom : "afficher nom"
            <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau nom">
        </p>
        <p>
            Changer le prénom : "afficher prénom"
            <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau prénom">
        </p>
        <p>
            Changer le mot de passe : "afficher mot de passe caché"
            <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau mot de passe">
        </p>
        <p>
            Changer l'adresse mail : "afficher mail"
            <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau mail">
        </p>
        <p>
            Changer la date de naissance : "afficher JJ/MM/AAAA"
            <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="JJ">/<input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="MM">/<input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="AAAA">
        </p>
        <p>
            Changer l'adresse : "afficher adresse"
            <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouvelle adresse">
        </p>
        <input style="margin-top:10px; box-shadow: 0 1px 0 gray;"type="submit" value="Sauvegarder le profil">
        </div>
    </body>
    <footer>
        <?php include "./php/footer.php" ?>
    </footer>
</html>