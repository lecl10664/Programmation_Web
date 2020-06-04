<?php
$dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
chdir($dir2.DIRECTORY_SEPARATOR);
//echo getcwd()."<br>";


//On se connecte à la BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=appg9b;port=3308;charset=utf8', 'root', '');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

session_start();



// Insertion du rdv dans la bdd pour l'utilisateur connecté
$reqRdv = $bdd->prepare('UPDATE `utilisateur` SET `date_rdv`=:date_rdv, `lieu_rdv`=:lieu_rdv
WHERE `Adresse_email` = :adresse_email');
$reqRdv->execute(array(
    'date_rdv' => $_POST['date_rdv'],
    'lieu_rdv' => $_POST['lieu_rdv'],
    'adresse_email' => $_SESSION['mailConnecte'],
));

header('location: ..anglais/Controleur/utilisateur_rdv2.php');


