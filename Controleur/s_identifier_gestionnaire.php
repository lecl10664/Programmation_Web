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
    <title>S'identifier</title>
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
        .box1{
            width: 30%;
            border: 1px solid black;
            text-align: center;
            padding: 10px;
            margin : 3% auto 10% auto;
            background-color: rgb(113, 113, 179);
            box-shadow: 10px 10px 10px gray;
        }

        input{
            margin: 1% 0% 4% 0%;
            padding: 1%;
            font-family: open_sansregular, sans-serif ;
            font-size: 103%;
            border-radius: 5px;
        }
        input:focus {
            border: 3px solid #555;
        }
        input[type=checkbox] {
            margin-right: 5%;
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

<div class="box1">
    <form action="estIdentifier_gestionnaire.php" method="post">
        <p><h3>Créer votre compte pour l'auto-école</h3>* = Champs obligatoire</p>
        <br>
        <label>Nom de l'auto-école*<br><input type="text" placeholder="Nom de l'auto-école" name="nom_auto_ecole" required maxlength="100" ></label>
        <br>
        <label>Adresse de l'auto-école*<br><input type="text" name="adresse_auto_ecole" placeholder="Adresse de l'auto-école" required maxlength="150"></label>
        <br>
        <label>Adresse mail de l'auto-école*<br><input type="email" name="mail_auto_ecole"  placeholder="auto-ecole@gmail.com" required></label>
        <br>
        <label>Mot de passe*<br><input type="password" name="mot_de_passe" placeholder="mot de passe" required></label>
        <br>
        <input type="checkbox" name="cgu" required/><label>J'accepte et je comprends les <a href="cgu.php">Conditions générales d'utilisation</a> de Infinites Measures</label>
        <br/>
        <input class="envoie" type="submit" value="S’inscrire">
        <br>
    </form>
    <br>
    <p>Vous avez déjà un compte auto-école ?</p>
    <a href="se_connecter.php">Connectez-vous </a>
</div>

<footer>
    <?php include "footer.php" ?>
</footer>

</body>
</html>
