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

    </style>
</head>
<body>

        <div class="box1">
            <form action="estIdentifier.php" method="post">
                <p>Créer votre compte Infinites Measures</p>
                <br>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" name="prenom" placeholder="prénom">
                <br>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" name="nom" placeholder="nom">
                <br>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="email" name="mail"  placeholder="mail">
                <br>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="date" name="date_de_naissance" placeholder="date de naissance">
                <br>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="password" name="mot_de_passe" placeholder="mot de passe">
                <br>
                <input style="margin-top:10px; box-shadow: 0 1px 0 gray;" type="submit" value="S’inscrire">
                <br>
            </form>
        </div>

    <footer>
        <?php include "./php/footer.php" ?>
    </footer>

</body>
</html>
