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
    <title>Se connecter</title>
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
        .box{
            width: 30%;
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
            font-size: 103%;
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
        strong {
            font-size: large;
        }

    </style>
</head>
<body>

<div class="box">
    <form action="../Modele/estConnecte.php" method="post">
        <p><strong>Portail de connexion<br></strong><br>(* = Champs obligatoire)</p>
        <br>
        <label>Adresse mail* : <input type="email" name="mailConnexion" placeholder="Adresse mail" required></label>
        <br>
        <label>Mot de passe* : <input type="password" name="mdpConnexion" placeholder="Mot de passe" required></label>
        <br>
        <input type="submit" value="Se connecter">
        <br>
        <p>Vous n'avez pas de compte ?</p>
        <a href="s_identifier_utilisateur.php">Se créer un compte utilisateur</a>
        <br>
        <a href="s_identifier_gestionnaire.php">Se créer un compte auto-école</a>
    </form>
</div>

<footer>
    <?php include "footer.php" ?>
</footer>
</body>
</html>
