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
    <title>S'identifier</title>
    <?php include "./php/header.php" ?>
    <style>
        body{

            background-color:rgb(232,232,232);
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
                <input  type="submit" value="S’inscrire">
                <br>
            </form>
        </div>

    <footer>
        <?php include "./php/footer.php" ?>
    </footer>

</body>
</html>
