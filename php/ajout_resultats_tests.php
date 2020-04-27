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
    <title>Ajout résultats test</title>
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
        .box1{
            width: 75%;
            border: 1px solid black;
            text-align: center;
            padding: 10px;
            margin : 3% auto 10% auto;
            background-color: rgb(0, 95, 122);
            border-radius: 10px;
        }

        input{
            margin: 0.5% 0% 3% 0%;
            padding: 1%;
            font-family: open_sansregular, sans-serif ;
            font-size: 100%;
            border-radius: 5px;
        }
        input:focus {
            border: 3px solid #555;
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
        strong {
            font-size: large;
        }

    </style>
</head>
<body>

<div class="box1">
    <form action="../php/ajout_resultats_tests_BDD.php" method="post">
        <p><strong>Veuillez ajouter les résultats du tests</strong><br>* = Champ obligatoire</p>
        <br>
        <label>Mail du l'auto-école*<br><input type="email" name="mail_gestionnaire" required size="80" maxlength="150" ></label>
        <br>
        <label>Mail de l'utilisateur*<br><input type="email" name="mail_utilisateur" required size="80" maxlength="150" ></label>
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

<footer>
    <?php include "./php/footer.php" ?>
</footer>

</body>
</html>
