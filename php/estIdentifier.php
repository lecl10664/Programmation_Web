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

?>

<!DOCTYPE html>
<html>
<head>
    <!-- En-tête de la page -->
    <meta charset="utf-8" />
    <title>TechReflex</title>
    <?php include "./php/header.php" ?>
</head>

<body>

<?php
if (isset($_POST['mail'])) {
    $reqInscription = $bdd->prepare('SELECT `Adresse_email` FROM `utilisateur`
 WHERE `Adresse_email` = :Adresse_email ');
    $reqInscription->execute(array(
        'Adresse_email' => $_POST['mail'],
    ));
    $donnees = $reqInscription -> fetch();

    if (

        $donnees['Adresse-mail'] == $_POST['mail']) {
        echo '<p>Adresse email déjà existante <br></p>';
    } else {


// Hachage du mot de passe
        $pass_hache = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

// Insertion des elements du nouveau utilisateur
        $reqInscription = $bdd->prepare('INSERT INTO `utilisateur`(`Mot_de_passe`, `Nom`, `Prenom`, `Date_de_naissance`, `N°_de_telephone`, `Adresse`, `Adresse_email`)
VALUES (:Mot_de_passe, :Nom, :Prenom, :Date_de_naissance, :Telephone, :Adresse, :Adresse_email)');
        $reqInscription->execute(array(
            'Mot_de_passe' => $pass_hache,
            'Nom' => $_POST['nom'],
            'Prenom' => $_POST['prenom'],
            'Adresse_email' => $_POST['mail'],
            'Date_de_naissance' => $_POST['date_de_naissance'],
            'Telephone' => $_POST['telephone'],
            'Adresse' => $_POST['adresse']
        ));

        ?>

        <p>Vous êtes maintenant inscrit !</p>
        <p> Identifiant de connexion <br>
            Mail : <?php echo $_POST['mail']; ?> <br>
            <br>
            Vous pouvez maitenant vous connecter à la plateforme et prendre rdv pour passer un test !
            <br>
        </p>

        <?php

    }

} else {
    echo '<p>Pas de données d\'inscription saisies <br></p>';
}

?>

<footer>
    <?php include "./php/footer.php" ?>
</footer>

</body>

</html>