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
    <?php include "header1.php" ?>
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
    <form action="estConnecte1.php" method="post">
        <p><strong>登录<br></strong><br>(* = 必填项)</p>
        <br>
        <label>电子邮箱* : <input type="email" name="mailConnexion" placeholder="Adresse mail" required></label>
        <br>
        <label>密码* : <input type="password" name="mdpConnexion" placeholder="Mot de passe" required></label>
        <br>
        <input type="submit" value="登录">
        <br>
        <p>您还没有注册吗 ?</p>
        <a href="s_identifier_utilisateur1.php">注册用户账号</a>
        <br>
        <a href="s_identifier_gestionnaire1.php">注册驾校账号</a>
    </form>
</div>

<footer>
    <?php include "footer1.php" ?>
</footer>
</body>
</html>
