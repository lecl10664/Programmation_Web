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
            background-color: rgb(113, 113, 179);
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
        <p>Créer votre compte pour l'auto-école</p>
        <br>
        <input type="text" name="nom_auto_ecole" placeholder="Nom de l'auto-école" required>
        <br>
        <input type="email" name="mail"  placeholder="Adresse mail" required>
        <br>
        <input type="password" name="mot_de_passe" placeholder="Votre mot de passe" required>
        <br>
        <input type="text" name="adresse" placeholder="Adresse de l'auto-école">
        <br>
        <input class="envoie" type="submit" value="S’inscrire">
        <br>
    </form>
    <br>
    <p>Vous avez déjà un compte auto-école ?</p>
    <a href="se_connecter.php">Connectez-vous </a>
</div>

<footer>
    <?php include "./php/footer.php" ?>
</footer>

</body>
</html>
