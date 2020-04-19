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
    <meta charset="UTF-8">
    <title>Se connecter</title>
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
        .box2{
            width: 30%;
            border: 1px solid black;
            text-align: center;
            padding: 10px;
            margin : 3% auto 10% auto;
            background-color:rgb(79,116,135);
            box-shadow: 10px 10px 10px gray;
        }
        input {
            margin: 1%;
            padding: 1%;
        }
        .mdpIncorrect {
            color: red;
        }

    </style>
</head>
<body>

<div class="box2">
    <form action="estConnecte.php" method="post">
        <p> Portail de connexion</p>
        <br>
        <input type="email" name="mailConnexion" placeholder="Adresse mail" required>
        <br>
        <input type="password" name="mdpConnexion" placeholder="Mot de passe" required>
        <br>
        <input type="submit" value="Se connecter">
        </br>
    </form>
    <?php
    if(!isset($_SESSION['mailUtilisateur'])) { ?>
    <p class="mdpIncorrect"><strong>Identifiant ou mot de passe incorrect</strong></p>
    <?php }


    ?>
</div>

<footer>
    <?php include "./php/footer.php" ?>
</footer>
</body>
</html>
