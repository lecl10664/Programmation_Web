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
        'mail' => $_SESSION['mailConnecte']));

    $donnees = $reponse->fetch();

?>

<!DOCTYPE html>
<html>
    <head>
          <title></title>
          <meta charset="utf-8" />
          <link rel="stylesheet" href="../css/editer_profil.css">
    <head>
    <header>
        <?php include "header.php" ?>
    </header>
    <body>
        <h1>
            修改个人信息
        </h1>
        <div id = content>
        <form action="profilEdite.php" method="post">
            <ol>
                <li>
                    <p>修改姓 : <?php echo $donnees['Nom'] ?></p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau nom" name="surnameButton" value=<?php echo $donnees['Nom'] ?>>
                </li>
                <br />
                <hr />
                <li>
                    <p>修改名 : <?php echo $donnees['Prenom'] ?></p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau prénom" name="nameButton" value=<?php echo $donnees['Prenom'] ?>>
                </li>
                <br />
                <hr />
                <li>
                    <p>修改生日 : <?php echo $donnees['Date_de_naissance'] ?></p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouvelle date de naissance" name="birthDateButton" value=<?php echo $donnees['Date_de_naissance'] ?>>
                </li>
                <br />
                <hr />
                <li>
                    <p>修改电话 : <?php echo $donnees['N°_de_telephone'] ?></p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau numéro de téléphone" name="phoneButton" value=<?php echo $donnees['N°_de_telephone'] ?>>
                </li>
                <br />
                <hr />
                <li>
                    <p>修改地址 : <?php echo $donnees['Adresse'] ?></p>
                    <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouvelle adresse" name="addressButton" value=<?php echo $donnees['Adresse'] ?>>
                </li>
                <br />
                <hr />
                <input style="margin-top:10px; box-shadow: 0 1px 0 gray;"type="submit" value="保存修改" class="saveButton">
            </ol>
        </form>
        <form action="modifierMotDePasse.php">
            <ol>
                <input style="margin-top:10px; box-shadow: 0 1px 0 gray;"type="submit" value="保存密码" class="saveButton">
            </ol>
        </form>
        </div>
    </body>
    <footer>
        <?php include "footer.php" ?>
    </footer>
</html>