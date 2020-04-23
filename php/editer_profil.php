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
        <h1>
            Editer son profil
        </h1>
        <div id = content>
        <form action="profilEdite.php" method="post">
            <ol>
                <li>
                    <p>Changer le nom : "afficher nom"</p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau nom">
                </li>
                <p></p>
                <li>
                    <p>Changer le prénom : "afficher nom"</p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau prénom">
                </li>
                <p></p>
                <li>
                    <p>Changer l'adresse mail : "afficher nom"</p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouvelle adresse mail">
                </li>
                <p></p>
                <li>
                    <p>Changer la date de naissance : "afficher nom"</p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouvelle date de naissance">
                </li>
                <p></p>
                <li>
                    <p>Changer le numéro de téléphone : "afficher nom"</p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau numéro de téléphone">
                </li>
                <p></p>
                <li>
                    <p>Changer l'adresse : "afficher nom"</p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouvelle adresse">
                </li>
                <p></p>
                <input style="margin-top:10px; box-shadow: 0 1px 0 gray;"type="submit" value="Sauvegarder le profil">
                

                </ol>
            

        </form>
        </div>
    </body>
    <footer>
        <?php include "./php/footer.php" ?>
    </footer>
</html>