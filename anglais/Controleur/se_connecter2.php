<?php
$dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
chdir($dir2.DIRECTORY_SEPARATOR);
//echo getcwd()."<br>";


//On se connecte à la BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=id13958611_appg9b;charset=utf8', 'id13958611_user', 'Passwordpassword0!');

}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <?php include "header2.php" ?>
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
        <p><strong>Connection Portal<br></strong><br>(* = Required fields)</p>
        <br>
        <label>email* : <input type="email" name="mailConnexion" placeholder="email" required></label>
        <br>
        <label>password* : <input type="password" name="mdpConnexion" placeholder="password" required></label>
        <br>
        <input type="submit" value="Login">
        <br>
        <p>You don't have an account ?</p>
        <a href="s_identifier_utilisateur.php">Sign in as user</a>
        <br>
        <a href="s_identifier_gestionnaire.php">Sign in as a driving school</a>
    </form>
</div>

<footer>
    <?php include "footer2.php" ?>
</footer>
</body>
</html>
