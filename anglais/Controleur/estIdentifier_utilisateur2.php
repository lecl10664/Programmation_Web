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
    <?php include "header.php" ?>
    <style>
        body{
            background-color:rgb(232,232,232);
            font-family: open_sansregular, sans-serif ;
        }
        @font-face {
            font-family: 'open_sansregular';
            src: url('../fonts/OpenSans-Regular-webfont.eot');
            src: url('../fonts/OpenSans-Regular-webfont.eot?#iefix') format('embedded-opentype'),
            url('../fonts/OpenSans-Regular-webfont.woff') format('woff'),
            url('../fonts/OpenSans-Regular-webfont.ttf') format('truetype'),
            url('../fonts/OpenSans-Regular-webfont.svg#open_sansregular') format('svg');
            font-weight: normal;
            font-style: normal;
        }
        .inscrit {
            width: 30%;
            border: 1px solid black;
            text-align: center;
            padding: 10px;
            margin : 5% auto 12% auto;
            background-color: rgb(113, 113, 179);
            box-shadow: 10px 10px 10px gray;
        }

    </style>
</head>

<body>

<?php


if (isset($_POST['mail'])) {

    // recupère l'email si email sasie deja existant
    $reqInscription = $bdd->prepare('SELECT `Adresse_email` FROM `utilisateur`
 WHERE `Adresse_email` = :Adresse_email ');
    $reqInscription->execute(array(
        'Adresse_email' => $_POST['mail'],
    ));
    $donnees = $reqInscription -> fetch();

    if ($donnees['Adresse_email'] == $_POST['mail']) {  // Vérifie si l'utilisateur existe deja
        echo '<p>- Adresse email déjà existante, <a href="s_identifier_utilisateur.Controleur">veuillez réessayer</a><br></p>';
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
        <div class="inscrit">
            <p>Vous êtes maintenant inscrit !</p>
            <p><strong>Identifiant de connexion</strong> <br>
                Mail : <?php echo $_POST['mail']; ?> <br>
                <br>
                Vous pouvez maitenant vous connecter à la plateforme et prendre rendez-vous pour passer un test !
                <br>
            <p><strong><a href="se_connecter.php">Se connecter !</a></strong></p>
            </p>
        </div>
        <?php

    }

} else {
    echo '<p>Pas de données d\'inscription saisies <br></p>';
}

?>

<footer>
    <?php include "footer.php" ?>
</footer>

</body>

</html>