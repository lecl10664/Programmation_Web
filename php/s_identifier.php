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
            width: 30%;
            border: 1px solid black;
            text-align: center;
            padding: 10px;
            margin : 3% auto 10% auto;
            background-color: rgb(161,215,171);
            box-shadow: 10px 10px 10px gray;
        }

        input {
            margin: 1%;
            padding: 1%;
            font-family: open_sansregular, sans-serif ;
            font-size: 103%;

        }
        .envoie {
            border: none;
            padding:2% 3%;
            border-radius: 8px;
            background-color:rgb(79,116,135);
            color: white;
            cursor: pointer;
            margin-top: 3%;
        }

    </style>
</head>
<body>

        <div class="box1">
            <form action="estIdentifier.php" method="post">
                <p>Créer votre compte Infinites Measures</p>
                <br>
                <input type="text" name="nom" placeholder="Votre nom" required>
                <br>
                <input type="text" name="prenom" placeholder="Votre prénom" required>
                <br>
                <input type="email" name="mail"  placeholder="Votre adresse mail" required>
                <br>
                <input type="date" name="date_de_naissance" placeholder="Votre date de naissance" required>
                <br>
                <input type="password" name="mot_de_passe" placeholder="Votre mot de passe" required>
                <br>
                <input type="tel" name="telephone" placeholder="Votre numero de téléphone" required>
                <br>
                <input type="text" name="adresse" placeholder="Votre adresse">
                <br>
                <input class="envoie" type="submit" value="S’inscrire">
                <br>
            </form>
            <br>
            <p>Vous avez déjà un compte ?</p>
            <a href="se_connecter.php">Connectez-vous </a>
        </div>

    <footer>
        <?php include "./php/footer.php" ?>
    </footer>

</body>
</html>
