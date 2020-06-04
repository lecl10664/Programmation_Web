<?php
$dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
chdir($dir2.DIRECTORY_SEPARATOR);
//echo getcwd()."<br>";


//On se connecte à la BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=appg9b;charset=utf8', 'id13853313_user', 'Passwordpassword0!');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
    /*
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=appg9b;port=3308;charset=utf8','root','');
    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    */
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Identify</title>
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
    <form action="estIdentifier_utilisateur.php" method="post">
        <p><strong>Create your Infinite Measures account</strong><br>* = Required fields</p>
        <br>
        <label>Last Name*<br><input type="text" name="nom" required maxlength="30" ></label>
        <br>
        <label>First name*<br><input type="text" name="prenom" required maxlength="30"></label>
        <br>
        <label>Birth date*<br><input type="date" name="date_de_naissance" required></label>
        <br>
        <label>Phone*<br><input type="tel" minlength="10" maxlength="10" name="telephone" required></label>
        <br>
        <label>Address*<br><input type="text" name="adresse"  required maxlength="150"></label>
        <br>
        <label>Email*<br><input type="email" name="mail"  required maxlength="100"></label>
        <br>
        <label>Password*<br><input type="password" name="mot_de_passe" required></label>
        <br>
        <input type="checkbox" name="cgu" required/><label>I have read and accepted the <a href="cgu.php">Terms and Conditions</a> of Infinites Measures</label>
        <br/>
        <input type="submit" value="Sign up">
        <br>
    </form>
    <br>
    <p>You already have an account ?</p>
    <a href="se_connecter.php">Login </a>
</div>

<footer>
    <?php include "footer.php" ?>
</footer>

</body>
</html>
