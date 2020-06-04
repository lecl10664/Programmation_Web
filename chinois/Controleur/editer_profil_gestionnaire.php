<?php
    $dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
    chdir($dir2.DIRECTORY_SEPARATOR);
    //echo getcwd()."<br>";

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=id13958611_appg9b;charset=utf8', 'id13958611_user', 'Passwordpassword0!');
    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    session_start();

    $reponse = $bdd->prepare('SELECT * FROM `gestionnaire` WHERE `mail_auto_ecole` = :mail');
    $reponse->execute(array(
        'mail' => $_SESSION['mailConnecte']));

    $donnees = $reponse->fetch();
    $reponse->closeCursor();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editer son profil Auto-école</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../Vue/editer_profil.css">
<head>
<header>
    <?php include "header.php" ?>
</header>
<body>
    <h1>
        Editer son profil Auto-école
    </h1>
    <div id = content>
        <form action="../Modele/profilEdite.php" method="post">
            <ol>
                <li>
                    <p>Modifier le nom de l'auto-école : <?php echo $donnees['Nom_auto_ecole'] ?></p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau nom" name="nvnom" value="<?php echo $donnees['Nom_auto_ecole'] ?>">
                </li>
                <br />
                <hr />
                <li>
                    <p>Modifier l'adresse du centre : <?php echo $donnees['adresse_auto_ecole'] ?></p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouvelle adresse" name="nvadresse" value="<?php echo $donnees['adresse_auto_ecole'] ?>">
                </li>
                <br />
                <hr />
                <li>
                    <p>Modifier l'adresse mail : <?php echo $donnees['mail_auto_ecole'] ?></p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="email" placeholder="Nouveau mail" name="nvmail" value='<?php echo $donnees['mail_auto_ecole'] ?>'>
                </li>
                <br />
                <hr />
                <li>
                <input style="margin-top:10px; box-shadow: 0 1px 0 gray;"type="submit" value="Sauvegarder le profil" class="saveButton">
            </ol>
        </form>
        <form action="modifierMotDePasse.php">
            <ol>
                <input style="margin-top:10px; box-shadow: 0 1px 0 gray;"type="submit" value="Modifier le mot de passe" class="saveButton">
            </ol>
        </form>
    </div>
</body>
<footer>
    <?php include "footer.php" ?>
</footer>
</html>
