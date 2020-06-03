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

if ($_SESSION['profilConnecte'] == "utilisateur") {

    $req = $bdd->prepare('UPDATE utilisateur SET Nom = :nvnom, Prenom = :nvprenom, N°_de_telephone = :nvntelephone, Adresse = :nvadresse, Date_de_naissance = :nvdatedenaissance WHERE Adresse_email = :mail');
    $req->execute(array(
        ':mail' => $_SESSION['mailConnecte'],
        ':nvnom' => $_POST['surnameButton'],
        ':nvprenom' => $_POST['nameButton'],
        ':nvntelephone' => $_POST['phoneButton'],
        ':nvadresse' => $_POST['addressButton'],
        ':nvdatedenaissance' => $_POST['birthDateButton'],
    ));

    header('location: ../Controleur/mesDonneesUtilisateurs.php');

} else if ($_SESSION['profilConnecte'] == "gestionnaire") {

    $req = $bdd->prepare('UPDATE gestionnaire SET Nom_auto_ecole = :nvnom, adresse_auto_ecole = :nvadresse, 
mail_auto_ecole = :nvmail WHERE mail_auto_ecole = :mail');
    $req->execute(array(
        ':mail' => $_SESSION['mailConnecte'],
        ':nvnom' => $_POST['nvnom'],
        ':nvadresse' => $_POST['nvadresse'],
        ':nvmail' => $_POST['nvmail'],
    ));
    $_SESSION['mailConnecte'] = $_POST['nvmail'];
    header('location: ../Controleur/gestionnaire.php');

} else if($_SESSION['profilConnecte'] = "administrateur"){

}

