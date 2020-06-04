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



$req = $bdd->prepare('DELETE FROM `utilisateur` WHERE Adresse_email = :mail');
$req->execute(array(
    ':mail' => $_POST['suppr'],

));

header('location: ../Controleur/pageAdministrateur2.php');
