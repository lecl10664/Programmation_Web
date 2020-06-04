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
    <title>S'identifier</title>
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
    <form action="estIdentifier_utilisateur1.php" method="post">
        <p><strong>创建您的Infinites Measures账号</strong><br>* = 必填项</p>
        <br>
        <label>姓*<br><input type="text" name="nom" required maxlength="30" ></label>
        <br>
        <label>名*<br><input type="text" name="prenom" required maxlength="30"></label>
        <br>
        <label>生日*<br><input type="date" name="date_de_naissance" required></label>
        <br>
        <label>电话号码*<br><input type="tel" minlength="10" maxlength="10" name="telephone" required></label>
        <br>
        <label>地址*<br><input type="text" name="adresse"  required maxlength="150"></label>
        <br>
        <label>电子邮箱*<br><input type="email" name="mail"  required maxlength="100"></label>
        <br>
        <label>密码*<br><input type="password" name="mot_de_passe" required></label>
        <br>
        <input type="checkbox" name="cgu" required/><label>我同意我了解 <a href="cgu1.php">用户协议</a> de Infinites Measures</label>
        <br/>
        <input type="submit" value="S’inscrire">
        <br>
    </form>
    <br>
    <p>您已有账户 ?</p>
    <a href="se_connecter1.php">登录 </a>
</div>

<footer>
    <?php include "footer1.php" ?>
</footer>

</body>
</html>
