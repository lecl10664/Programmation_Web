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
// Hachage du mot de passe
$pass_hache = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

// Insertion des elements du nouveau utilisateur
$reqInscription = $bdd->prepare('INSERT INTO utilisateur(`Mot_de_passe`, `Nom`, `Prenom`, `Date_de_naissance`, `Adresse_email`) 
VALUES(:Mot_de_passe, :Nom, :Prenom, :Date_de_naissance, :Adresse_email)');
$reqInscription->execute(array(
    'Mot_de_passe' => $pass_hache,
    'Nom' => $_POST['nom'],
    'Prenom' => $_POST['prenom'],
    'Adresse_email' => $_POST['mail'],
    'Date_de_naissance' => $_POST['date_de_naissance']
));


?>

    <p>Vous êtes maintenant inscrit !</p>
    <p> Identifiant de connexion <br>
        Mail : <?php echo $_POST['mail']; ?> <br>
        Mot de passe : <?php echo $_POST['mot_de_passe']; ?> <br>
        <br>
        Vous pouvez maitenant vous connecter à la plateforme et prendre rdv pour passer un test !
        <br>
    </p>

<footer>
    <?php include "./php/footer.php" ?>
</footer>

</body>

</html>