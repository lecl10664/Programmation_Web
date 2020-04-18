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
// Pour se connecter

//  Récupération de l'utilisateur et de son pass hashé
$reponse = $bdd->prepare('SELECT * FROM `utilisateur`
WHERE `Adresse_email` = :mail');
$reponse->execute(array(
    'mail' => $_POST['mailConnexion']));

$donnees = $reponse->fetch();


// Comparaison du pass envoyé via le formulaire avec la base

if (password_verify($_POST['mdpConnexion'], $donnees['Mot_de_passe'])) {
    echo 'Vous êtes maintenant connecté !';
    session_start();
    $_SESSION['mailGestionnaire'] = $donnees['Adresse_email'];
} else {
    echo 'Identifiant ou mot de passe incorrect';
}
?>



<footer>
    <?php include "./php/footer.php" ?>
</footer>

</body>

</html>
