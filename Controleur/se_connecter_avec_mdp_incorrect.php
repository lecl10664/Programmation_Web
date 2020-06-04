<?php
$dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
chdir($dir2.DIRECTORY_SEPARATOR);
//echo getcwd()."<br>";


//On se connecte à la BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=appg9b;port=3308;charset=utf8','root','');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Se connecter</title>
    <?php include "header.php" ?>
    <link rel="stylesheet" href="../Vue/se_connecter.css">
</head>
<body>

<div class="box">
    <form action="../Modele/estConnecte.php" method="post">
        <p><strong>Portail de connexion<br></strong><br>(* = Champs obligatoire)</p>
        <p class="mdpIncorrect">Identifiant ou mot de passe incorrect, veuillez réessayer</p>
        <label>Adresse mail* : <input type="email" name="mailConnexion" placeholder="Adresse mail" required></label>
        <br>
        <label>Mot de passe* : <input type="password" name="mdpConnexion" placeholder="Mot de passe" required></label>
        <br>
        <input type="submit" value="Se connecter">
        <br>
        <p>Vous n'avez pas de compte ?</p>
        <a href="s_identifier_utilisateur.php">Se créer un compte utilisateur</a>
        <br>
        <a href="s_identifier_gestionnaire.php">Se créer un compte auto-école</a>
    </form>
</div>

<footer>
    <?php include "footer.php" ?>
</footer>
</body>
</html>
