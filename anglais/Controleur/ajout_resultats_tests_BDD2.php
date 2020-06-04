<?php
$dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
chdir($dir2.DIRECTORY_SEPARATOR);
//echo getcwd()."<br>";


//On se connecte à la BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=appg9b;charset=utf8', 'id13853313_user', 'Passwordpassword0!');
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
    <?php include "header2.php" ?>
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
        p {
            text-align: center;
            font-size: large;
            margin: 10% 0% 14% 0%;
        }

    </style>
</head>

<body>


<?php

if (isset($_POST['mail_utilisateur'])) {

    // recupère l'email si email sasie deja existant
    $req = $bdd->prepare('SELECT `Adresse_email` FROM `utilisateur`
 WHERE `Adresse_email` = :Adresse_email ');
    $req->execute(array(
        'Adresse_email' => $_POST['mail_utilisateur'],
    ));
    $donnees = $req -> fetch();

    if (!$donnees['Adresse_email'] == $_POST['mail_utilisateur']) {  // Vérifie si l'utilisateur existe
        echo 'existe pas, <a href="gestionnaire_ajout_resultats_tests.Controleur">veuillez réesayer</a><br></p>';
    } else {


// Insertion des résultats du test
        $reqInscription = $bdd->prepare('INSERT INTO `test`(`mail_utilisateur`, `mail_gestionnaire`, `Date`,
 `Score_total`, `Res_freq_card_avant_test`, `Res_freq_card_apres_test`, `Res_temp_avant_test`, `Res_temp_apres_test`, 
 `Res_rythme_visuel`, `Res_stimulus_visuel`, `Res_rythme_sonore`, `Res_stimulus_sonore`, `Res_reprod_sonore`)
 VALUES (:mail_utilisateur, :mail_gestionnaire, :Date_test, :Score_total, :Res_freq_card_avant_test, 
 :Res_freq_card_apres_test, :Res_temp_avant_test, :Res_temp_apres_test, :Res_rythme_visuel, :Res_stimulus_visuel,
  :Res_rythme_sonore, :Res_stimulus_sonore, :Res_reprod_sonore)');
        $reqInscription->execute(array(
            'mail_utilisateur' => $_POST['mail_utilisateur'],
            'mail_gestionnaire' => $_SESSION['mailConnecte'],
            'Date_test' => $_POST['date'],
            'Score_total' => $_POST['score_total'],
            'Res_freq_card_avant_test' => $_POST['freq_avant'],
            'Res_freq_card_apres_test' => $_POST['freq_apres'],
            'Res_temp_avant_test' => $_POST['temp_avant'],
            'Res_temp_apres_test' => $_POST['temp_apres'],
            'Res_rythme_visuel' => $_POST['rythme_visuel'],
            'Res_stimulus_visuel' => $_POST['stimulus_visuel'],
            'Res_rythme_sonore' => $_POST['rythme_sonore'],
            'Res_stimulus_sonore' => $_POST['stimulus_sonore'],
            'Res_reprod_sonore' => $_POST['reproduction_sonore'],
        ));

        ?>
        <p>Results have been added to the user profile <strong><?php echo $_POST['mail_utilisateur']?></strong>
        <br>
            <a href="gestionnaire.php">Return to the driving school page</a>
        </p>



        <?php

    }

} else {
    echo '<p>No inscription data <br></p>';
}

?>

<footer>
    <?php include "footer2.php" ?>
</footer>

</body>

</html>