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
        header("Location: ../php/mesDonneesUtilisateurs.php");
        session_start();
        $_SESSION['mailConnecte'] = $donneesUtilisateur['Adresse_email'];
    } else {
        header("Location:../php/se_connecter_avec_mdp_incorrect.php");
    }

}
        //à un gestionnaire
else if ($_POST['mailConnexion'] == $donneesGestionnaire['mail_auto_ecole']) {


// Comparaison du pass envoyé via le formulaire avec la base

    if (password_verify($_POST['mdpConnexion'], $donneesGestionnaire['Mot_de_passe'])) {
        header("Location: ../php/gestionnaire.php");
        session_start();
        $_SESSION['mailConnecte'] = $donneesGestionnaire['mail_auto_ecole'];
    } else {
        header("Location:../php/se_connecter_avec_mdp_incorrect.php");
    }
}

//à un admin
else if ($_POST['mailConnexion'] == $donneesAdmin['mail_administrateur']) {

// Comparaison du pass envoyé via le formulaire avec la base

    if (password_verify($_POST['mdpConnexion'], $donneesAdmin['Mot_de_passe'])) {
        header("Location: ../php/pageAdministrateur.php");
        session_start();
        $_SESSION['mailConnecte'] = $donneesAdmin['mail_administrateur'];
    } else {
        header("Location:../php/se_connecter_avec_mdp_incorrect.php");
    }
}
else {
    header("Location:../php/se_connecter_avec_mdp_incorrect.php");
}

