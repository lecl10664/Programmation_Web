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

session_start();


// récupération des infos du gestionnaire connecté

$reqProfil = $bdd->prepare('SELECT * FROM `gestionnaire` WHERE `mail_auto_ecole` = :mail');
$reqProfil->execute(array(
    'mail' => $_SESSION['mailConnecte']));

$donneesProfil = $reqProfil->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add test results</title>
    <?php include "header.php" ?>
    <link rel="stylesheet" href="../Vue/gestionnaire.css" />

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
        .box1{
            width: 100%;
            border: 1px solid black;
            text-align: center;
            padding: 10px;
            margin : 3% 3% 10% 3%;
            background-color: rgb(0, 95, 122);
            border-radius: 10px;
        }

        input{
            margin: 0.3% 0% 3% 0%;
            padding: 1%;
            font-family: open_sansregular, sans-serif ;
            font-size: 100%;
            border-radius: 5px;
        }
        input:focus {
            border: 3px solid #000097;
        }
        input[type=submit] {
            border: none;
            padding:2% 3%;
            border-radius: 8px;
            background-color:rgb(79,116,135);
            color: white;
            cursor: pointer;
            margin-top: 3%;
        }
        input[type=submit]:hover {
            background-color: rgb(49, 80, 99);
            transition-duration: 1s;
        }

    </style>
</head>
<body>

<div id="conteneur1">
    <div id="menu">
        <a href="#" class="active">Menu</a>
        <a href="gestionnaire.php">Start a test</a>
        <a href="gestionnaire_ajout_resultats_tests.php">New test results</a>
        <a href="gestionnaire_rechercheUtilisateur.php">Display users</a>
        <a href="gestionnaire_rechercheTests.php">Display tests</a>
    </div>

    <div class="box1">
        <form action="ajout_resultats_tests_BDD.php" method="post">
            <h2>You wish to add the test results of a user</h2>
            <p><strong>Please add the results</strong><br>* = Required</p>
            <br>
            <label>User email*<br><input type="email" name="mail_utilisateur" required size="50" maxlength="150" ></label>
            <br>
            <label>Date*<br><input type="date" name="date" required></label>
            <br>
            <label>Total score*<br><input type="number" name="score_total" required min="0" >PTS</label>
            <br>
            <label>Heart rate before test<br><input type="number" name="freq_avant" min="0" >BPM</label>
            <br>
            <label>Heart rate after test<br><input type="number" name="freq_apres" min="0" >BPM</label>
            <br>
            <label>Temperature before test<br><input type="number" name="temp_avant" min="0" >°C</label>
            <br>
            <label>Temperature after test<br><input type="number" name="temp_apres" min="0" >°C</label>
            <br>
            <label>Score visual rythm<br><input type="number" name="rythme_visuel" min="0" >PTS</label>
            <br>
            <label>Score visual stimulus<br><input type="number" name="stimulus_visuel" min="0" >PTS</label>
            <br>
            <label>Score hearing rythm<br><input type="number" name="rythme_sonore" min="0" >PTS</label>
            <br>
            <label>Score hearing stimulus<br><input type="number" name="stimulus_sonore" min="0" >PTS</label>
            <br>
            <label>Score sound reproduction<br><input type="number" name="reproduction_sonore" min="0" >PTS</label>
            <br>
            <input type="submit" value="Save results">
            <br>
        </form>
    </div>

    <div id="profil">
        <h3 class="profil-titre">MY DRIVING SCHOOL PROFILE</h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p>Driving school name : <?php echo $donneesProfil['Nom_auto_ecole']?></p>
                <p>Address : <?php echo $donneesProfil['adresse_auto_ecole']?></p>
                <p>Email : <?php echo $donneesProfil['mail_auto_ecole']?></p>
            </div>
            <!--<img class="profil-photo" src="/images/profil_400x400.png"></img>   -->
        </div>
    </div>

</div>



<footer>
    <?php include "footer.php" ?>
</footer>

</body>
</html>
