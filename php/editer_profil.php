<?php
    $dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
    chdir($dir2.DIRECTORY_SEPARATOR);
    //echo getcwd()."<br>";

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=appg9b;port=3308;charset=utf8', 'root', '');
    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    session_start();

    $reponse = $bdd->prepare('SELECT * FROM `utilisateur` WHERE `Adresse_email` = :mail');
    $reponse->execute(array(
        'mail' => $_SESSION['mailUtilisateur']));

    $donnees = $reponse->fetch();

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
                    <p>Modifier le nom : <?php echo $donnees['Nom'] ?></p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau nom" name="surnameButton">
                </li>
                <br />
                <hr />
                <li>
                    <p>Modifier le prénom : <?php echo $donnees['Prenom'] ?></p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau prénom" name="nameButton">
                </li>
                <br />
                <hr />
                <li>
                    <p>Modifier l'adresse mail : <?php echo $donnees['Adresse_email'] ?></p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouvelle adresse mail" name="emailButton">
                </li>
                <br />
                <hr />
                <li>
                    <p>Modifier la date de naissance : <?php echo $donnees['Date_de_naissance'] ?></p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouvelle date de naissance" name="birthDateButton">
                </li>
                <br />
                <hr />
                <li>
                    <p>Modifier le numéro de téléphone : <?php echo $donnees['N°_de_telephone'] ?></p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau numéro de téléphone" name="telephoneButton">
                </li>
                <br />
                <hr />
                <li>
                    <p>Modifier l'adresse : <?php echo $donnees['Adresse'] ?></p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouvelle adresse" name="addressButton">
                </li>
                <br />
                <hr />
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
        <?php include "./php/footer.php" ?>
    </footer>
</html>