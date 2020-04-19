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

    </style>
</head>
<body>

<div class="box2">
    <form action="estConnecte.php" method="post">
        <p> Portail de connexion</p>
        <br>
        <input type="email" name="mailConnexion" placeholder="Adresse mail">
        <br>
        <input type="password" name="mdpConnexion" placeholder="Mot de passe">
        <br>
        <input type="submit" value="Se connecter">
        </br>
    </form>
</div>

<footer>
    <?php include "./php/footer.php" ?>
</footer>
</body>
</html>
