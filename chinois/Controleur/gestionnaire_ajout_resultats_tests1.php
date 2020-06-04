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

session_start();


// récupération des infos du gestionnaire connecté

$reqProfil = $bdd->prepare('SELECT * FROM `gestionnaire` WHERE `mail_auto_ecole` = :mail');
$reqProfil->execute(array(
    'mail' => $_SESSION['mailConnecte']));

$donneesProfil = $reqProfil->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ajout résultats test</title>
    <?php include "header1.php" ?>
    <link rel="stylesheet" href="../Vue/gestionnaire.css" />

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
            width: 75%;
            border: 1px solid black;
            text-align: center;
            padding: 10px;
            margin : 3% 3% 10% 3%;
            background-color: rgb(0, 95, 122);
            border-radius: 10px;
        }

        input{
            margin: 0.3% 0% 3% 0%;
            padding: 1%;
            font-family: open_sansregular, sans-serif ;
            font-size: 100%;
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

    </style>
</head>
<body>

<div id="conteneur1">
    <div id="menu">
        <a href="#" class="active">菜单</a>
        <a href="gestionnaire1.php">开始一项测试</a>
        <a href="ajout_resultats_tests1.php">新的测试结果</a>
        <a href="gestionnaire_rechercheUtilisateur1.php">显示用户</a>
        <a href="gestionnaire_rechercheTests1.php">显示测试</a>
    </div>

    <div class="box1">
        <form action="../php/ajout_resultats_tests_BDD1.php" method="post">
            <h2>您要添加用户通过的测试结果</h2>
            <p><strong>请添加测试结果</strong><br>* = 必选项</p>
            <br>
            <label>用户邮箱*<br><input type="email" name="mail_utilisateur" required size="50" maxlength="150" ></label>
            <br>
            <label>测试日期*<br><input type="date" name="date" required></label>
            <br>
            <label>总分*<br><input type="number" name="score_total" required min="0" >PTS</label>
            <br>
            <label>测试前心率<br><input type="number" name="freq_avant" min="0" >BPM</label>
            <br>
            <label>测试后心率<br><input type="number" name="freq_apres" min="0" >BPM</label>
            <br>
            <label>测试前温度<br><input type="number" name="temp_avant" min="0" >°C</label>
            <br>
            <label>测试后温度<br><input type="number" name="temp_apres" min="0" >°C</label>
            <br>
            <label>视觉节奏分数<br><input type="number" name="rythme_visuel" min="0" >PTS</label>
            <br>
            <label>视觉刺激评分<br><input type="number" name="stimulus_visuel" min="0" >PTS</label>
            <br>
            <label>声音节奏分数<br><input type="number" name="rythme_sonore" min="0" >PTS</label>
            <br>
            <label>声音刺激得分<br><input type="number" name="stimulus_sonore" min="0" >PTS</label>
            <br>
            <label>声音再现分数<br><input type="number" name="reproduction_sonore" min="0" >PTS</label>
            <br>
            <input type="submit" value="保存">
            <br>
        </form>
    </div>

    <div id="profil">
        <h3 class="profil-titre">我的驾校账户</h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p>驾校名 : <?php echo $donneesProfil['Nom_auto_ecole']?></p>
                <p>地址 : <?php echo $donneesProfil['adresse_auto_ecole']?></p>
                <p>电子邮箱 : <?php echo $donneesProfil['mail_auto_ecole']?></p>
            </div>
            <!--<img class="profil-photo" src="/images/profil_400x400.png"></img>   -->
        </div>
    </div>

</div>



<footer>
    <?php include "footer1.php" ?>
</footer>

</body>
</html>
