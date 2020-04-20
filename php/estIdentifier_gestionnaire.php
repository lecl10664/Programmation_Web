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
            background-color: rgb(161,215,171);
            box-shadow: 10px 10px 10px gray;
        }

    </style>
</head>

<body>

<?php
if (isset($_POST['nom_auto_ecole'])) {
    $reqInscription = $bdd->prepare('SELECT `Nom_auto_ecole` FROM `gestionnaire`
 WHERE `Nom_auto_ecole` = :nom ');
    $reqInscription->execute(array(
        'nom' => $_POST['nom_auto_ecole'],
    ));
    $donnees = $reqInscription -> fetch();

    if ($donnees['Nom_auto_ecole'] == $_POST['nom_auto_ecole']) {
        echo '<br><p>Cette auto-école à déjà été inscrite<br></p>';
    } else {


// Hachage du mot de passe
        $pass_hache = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

// Insertion des elements du nouveau utilisateur
        $reqInscription = $bdd->prepare('INSERT INTO `gestionnaire`(`Mot_de_passe`, `Nom_auto_ecole`, `adresse_auto_ecole`, `mail_auto_ecole`)
VALUES (:Mot_de_passe, :Nom, :Adresse, :Adresse_email)');
        $reqInscription->execute(array(
            'Mot_de_passe' => $pass_hache,
            'Nom' => $_POST['nom_auto_ecole'],
            'Adresse_email' => $_POST['mail_auto_ecole'],
            'Adresse' => $_POST['adresse_auto_ecole']
        ));

        ?>
        <div class="inscrit">
            <p>Votre auto-école <strong><?php echo $_POST['nom_auto_ecole']?></strong> est maintenant inscrite</p>
            <p><strong>Vos informations :</strong>  <br>
                Adresse de l'auto-école : <?php echo $_POST['adresse_auto_ecole']; ?><br>
                Mail : <?php echo $_POST['mail_auto_ecole']; ?> <br>
                <br>
                Vous pouvez maitenant vous connecter à la plateforme et faire passer des tests!
                <br>
            </p>
        </div>
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