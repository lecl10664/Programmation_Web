<?php
$dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
chdir($dir2.DIRECTORY_SEPARATOR);
//echo getcwd()."<br>";


//On se connecte à la BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=id13958611_appg9b;charset=utf8', 'id13958611_user', 'Passwordpassword0!');

}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// recuperation donnee utilisateur
$reqUtilisateur = $bdd->prepare('SELECT * FROM `utilisateur`
WHERE `Adresse_email` = :mail');
$reqUtilisateur->execute(array(
    'mail' => $_POST['mailConnexion']));

$donneesUtilisateur = $reqUtilisateur->fetch();
$reqUtilisateur->closeCursor();


//  Récupération donnes gestionnaire
$reqGestionnaire = $bdd->prepare('SELECT * FROM `gestionnaire`
WHERE `mail_auto_ecole` = :mail');
$reqGestionnaire->execute(array(
    'mail' => $_POST['mailConnexion']));
$donneesGestionnaire = $reqGestionnaire->fetch();
$reqGestionnaire->closeCursor();


//  Récupération donnees admin
$reqAdmin = $bdd->prepare('SELECT * FROM `administrateur`
WHERE `mail_administrateur` = :mail');
$reqAdmin->execute(array(
    'mail' => $_POST['mailConnexion']));

$donneesAdmin = $reqAdmin->fetch();
$reqAdmin->closeCursor();




// Pour se connecter

// à un utilisateur

if ($_POST['mailConnexion'] == $donneesUtilisateur['Adresse_email']) {

// Comparaison du pass envoyé via le formulaire avec la base

    if (password_verify($_POST['mdpConnexion'], $donneesUtilisateur['Mot_de_passe'])) {
        header("location: ../Controleur/mesDonneesUtilisateurs2.php");
        session_start();
        $_SESSION['mailConnecte'] = $donneesUtilisateur['Adresse_email'];
        $_SESSION['profilConnecte'] = "utilisateur";
    } else {
        header("location: ../Controleur/se_connecter_avec_mdp_incorrect2.php");
    }

}
        //à un gestionnaire
else if ($_POST['mailConnexion'] == $donneesGestionnaire['mail_auto_ecole']) {


// Comparaison du pass envoyé via le formulaire avec la base

    if (password_verify($_POST['mdpConnexion'], $donneesGestionnaire['Mot_de_passe'])) {
        header("location: ../Controleur/gestionnaire.php");
        session_start();
        $_SESSION['mailConnecte'] = $donneesGestionnaire['mail_auto_ecole'];
        $_SESSION['profilConnecte'] = "gestionnaire";
    } else {
        header("location: ../Controleur/se_connecter_avec_mdp_incorrect2.php");
    }
}

//à un admin
else if ($_POST['mailConnexion'] == $donneesAdmin['mail_administrateur']) {

// Comparaison du pass envoyé via le formulaire avec la base

    if ($_POST['mdpConnexion'] == $donneesAdmin['Mot_de_passe']) {
        header("location: ../Controleur/pageAdministrateur2.php");
        session_start();
        $_SESSION['mailConnecte'] = $donneesAdmin['mail_administrateur'];
        $_SESSION['profilConnecte'] = "administrateur";
    } else {
        header("location: ../Controleur/se_connecter_avec_mdp_incorrect2.php");
    }
}
else {
    header("location: ../Controleur/se_connecter_avec_mdp_incorrect2.php");
}

