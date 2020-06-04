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

    $reponse = $bdd->prepare('SELECT * FROM `utilisateur` WHERE `Adresse_email` = :mail');
    $reponse->execute(array(
        'mail' => $_SESSION['mailConnecte']));

    $donnees = $reponse->fetch();

?>

<!DOCTYPE html>
<html>
    <head>
          <title>Edit profile</title>
          <meta charset="utf-8" />
          <link rel="stylesheet" href="../Vue/editer_profil.css">
    <head>
    <header>
        <?php include "header2.php" ?>
    </header>
    <body>
        <h1>
            Edit profile
        </h1>
        <div id = content>
        <form action="profilEdite.php" method="post">
            <ol>
                <li>
                    <p>Edit surname : <?php echo $donnees['Nom'] ?></p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="New surname" name="surnameButton" value=<?php echo $donnees['Nom'] ?>>
                </li>
                <br />
                <hr />
                <li>
                    <p>Edit name : <?php echo $donnees['Prenom'] ?></p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="New name" name="nameButton" value=<?php echo $donnees['Prenom'] ?>>
                </li>
                <br />
                <hr />
                <li>
                    <p>Edit birthdate : <?php echo $donnees['Date_de_naissance'] ?></p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="New birthdate" name="birthDateButton" value=<?php echo $donnees['Date_de_naissance'] ?>>
                </li>
                <br />
                <hr />
                <li>
                    <p>Edit number : <?php echo $donnees['N°_de_telephone'] ?></p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="New number" name="phoneButton" value=<?php echo $donnees['N°_de_telephone'] ?>>
                </li>
                <br />
                <hr />
                <li>
                    <p>Edit address : <?php echo $donnees['Adresse'] ?></p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="New address" name="addressButton" value=<?php echo $donnees['Adresse'] ?>>
                </li>
                <br />
                <hr />
                <input style="margin-top:10px; box-shadow: 0 1px 0 gray;"type="submit" value="Save profile" class="saveButton">
            </ol>
        </form>
        <form action="modifierMotDePasse.php">
            <ol>
                <input style="margin-top:10px; box-shadow: 0 1px 0 gray;"type="submit" value="Edit password" class="saveButton">
            </ol>
        </form>
        </div>
    </body>
    <footer>
        <?php include "footer2.php" ?>
    </footer>
</html>