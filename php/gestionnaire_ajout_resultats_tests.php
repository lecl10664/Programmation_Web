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
    <title>Ajout résultats test</title>
    <?php include "header.php" ?>
    <link rel="stylesheet" href="../css/gestionnaire.css" />

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
            width: 75%;
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
        <a href="gestionnaire.php">Lancer un test</a>
        <a href="ajout_resultats_tests.php">Nouveau résultat de tests</a>
        <a href="gestionnaire_rechercheUtilisateur.php">Afficher utilisateurs</a>
        <a href="gestionnaire_rechercheTests.php">Afficher tests</a>
    </div>

    <div class="box1">
        <form action="../php/ajout_resultats_tests_BDD.php" method="post">
            <h2>Vous souhaitez ajouter les résultats d'un test passé par un utilisateur</h2>
            <p><strong>Veuillez ajouter les résultats du tests</strong><br>* = Champ obligatoire</p>
            <br>
            <label>Mail de l'utilisateur*<br><input type="email" name="mail_utilisateur" required size="50" maxlength="150" ></label>
            <br>
            <label>Date du test*<br><input type="date" name="date" required></label>
            <br>
            <label>Score total*<br><input type="number" name="score_total" required min="0" >PTS</label>
            <br>
            <label>Fréquence cardiaque avant-test<br><input type="number" name="freq_avant" min="0" >BPM</label>
            <br>
            <label>Fréquence cardiaque après-test<br><input type="number" name="freq_apres" min="0" >BPM</label>
            <br>
            <label>Température avant-test<br><input type="number" name="temp_avant" min="0" >°C</label>
            <br>
            <label>Température après-test<br><input type="number" name="temp_apres" min="0" >°C</label>
            <br>
            <label>Score rythme visuel<br><input type="number" name="rythme_visuel" min="0" >PTS</label>
            <br>
            <label>Score stimulus visuel<br><input type="number" name="stimulus_visuel" min="0" >PTS</label>
            <br>
            <label>Score rythme sonore<br><input type="number" name="rythme_sonore" min="0" >PTS</label>
            <br>
            <label>Score stimulus sonore<br><input type="number" name="stimulus_sonore" min="0" >PTS</label>
            <br>
            <label>Score reproduction sonore<br><input type="number" name="reproduction_sonore" min="0" >PTS</label>
            <br>
            <input type="submit" value="Enregistrer les resultats">
            <br>
        </form>
    </div>

    <div id="profil">
        <h3 class="profil-titre">MON PROFIL AUTO-ECOLE</h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p>Nom de l'auto-école : <?php echo $donneesProfil['Nom_auto_ecole']?></p>
                <p>Adresse du centre : <?php echo $donneesProfil['adresse_auto_ecole']?></p>
                <p>Adresse mail : <?php echo $donneesProfil['mail_auto_ecole']?></p>
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
