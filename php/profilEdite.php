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
    $questions = $bdd->query('SELECT * FROM utilisateur');
    session_start();
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Gérer la FAQ</title>
        <?php include "header.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/editer_profil.css">
    </head>
    <body>
        <?php
            $req = $bdd->prepare('UPDATE utilisateur SET Nom = :nvnom, Prenom = :nvprenom, N°_de_telephone = :nvntelephone, Adresse = :nvadresse, Date_de_naissance = :nvdatedenaissance WHERE Adresse_email = :mail');
            $req->execute(array(
                ':mail' => $_SESSION['mailConnecte'],
                ':nvnom' => $_POST['surnameButton'],
                ':nvprenom' => $_POST['nameButton'],
                ':nvntelephone' => $_POST['phoneButton'],
                ':nvadresse' => $_POST['addressButton'],
                ':nvdatedenaissance' => $_POST['birthDateButton'],
                ));
        ?>
    </body>
    <h1><?php echo "Le profil a bien été édité."; ?></h1>
    <footer>
        <?php include "footer.php" ?>
    </footer>
</html>

