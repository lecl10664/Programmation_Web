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
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <?php include "header1.php" ?>
    <link rel="stylesheet" href="../Vue/gestionnaire.css" />
    <script src="https://kit.fontawesome.com/8bfc90242a.js" crossorigin="anonymous"></script>
    <title>Gestionnaire : lancer un test</title>
</head>

<body>

<div id="conteneur1">
    <div id="menu">
        <a href="#" class="active">菜单</a>
        <a href="gestionnaire1.php">开始一项测试</a>
        <a href="gestionnaire_ajout_resultats_tests1.php">新的测试结果</a>
        <a href="gestionnaire_rechercheUtilisateur1.php">显示用户</a>
        <a href="gestionnaire_rechercheTests1.php">显示测试</a>
    </div>

    <div id="main">
        <button class="button_play"> <i class="fas fa-play"></i> 发起一项测试 ! </button>
    </div>

    <div id="profil">
        <h3 class="profil-titre">我的驾校账号</h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p>驾校: <?php echo $donneesProfil['Nom_auto_ecole']?></p>
                <p>地址 : <?php echo $donneesProfil['adresse_auto_ecole']?></p>
                <p>电子邮件 : <?php echo $donneesProfil['mail_auto_ecole']?></p>
            </div>
            <!--<img class="profil-photo" src="/images/profil_400x400.png"></img>   -->
        </div>
    </div>

</div>

<div class="choix">
    <p> 您想开始哪项测试 ? </p>
    <div id="boutons">
        <div id="tout">
            <button class="button"> 所有测试 </button>
        </div>
        <div id="avant-test">
            <button class="button">测试前时间</button>
            <button class="button">测试前心率</button>
        </div>
        <div id="memorisation">
            <button class="button">听觉记忆</button>
            <button class="button">视觉记忆</button>
        </div>
        <div id="reflexe">
            <button class="button">视觉反应</button>
            <button class="button">听觉反应</button>
        </div>
        <div id="reproduction">
            <button class="button">声音再现</button>
        </div>
        <div id="apres-test">
            <button class="button">测试后时间</button>
            <button class="button">测试后心率</button>
        </div>
    </div>
    <button class="button_valider" onclick="rebour('3')">提交</button>
</div>

<div id="compteRebour_affiche">
</div>

<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
</script>

<script>

    $('.button_play').click(function(e) {
        e.preventDefault();
        $('.choix').toggleClass('active');
    })

    var listeBouton = document.getElementsByClassName("button");
    for (var i=0; i<listeBouton.length; i++) {
        var element = listeBouton[i];
        element.style.backgroundColor="white";
        element.onclick=function() {
            console.log(this.style.backgroundColor);
            var element = this;
            if (element.style.backgroundColor!="white") {
                element.style.backgroundColor="white";
                element.style.color="rgba(0,107,141,1)";}
            else {
                element.style.backgroundColor="rgba(0,107,141,1)";
                element.style.color="white";}
        };
    }

    function rebour(tps) {
        console.log('ok');
        if (tps>0)
        {
            var heure = Math.floor(tps/3600);
            if(heure >= 24)
            {
                var jour = Math.floor(heure/24);
                var moins = 86400*jour;
                var heure = heure-(24*jour);
            }
            else
            {
                var jour = 0;
                var moins = 0;
            }
            moins = moins+3600*heure;
            var minutes = Math.floor((tps-moins)/60);
            moins = moins + 60*minutes;
            var secondes = tps-moins;
            minutes = ((minutes < 10) ? "0" : "") + minutes;
            secondes = ((secondes < 10) ? "0" : "") + secondes;
            document.getElementById("compteRebour_affiche").innerHTML = 'Lancement du test dans : '+secondes;
            var restant = tps-1;
            setTimeout("rebour("+restant+")", 1000);
        }
        else
        {
            document.getElementById("compteRebour_affiche").innerHTML = 'chargement ...';
        }
    }

    function afficheRebour()
    {
        setTimeout(function(){document.getElementById("compteRebour_affiche").innerHTML = '3'},1000);
        setTimeout(function(){document.getElementById("compteRebour_affiche").innerHTML = '2'},2000);
        setTimeout(function(){document.getElementById("compteRebour_affiche").innerHTML = '1'},3000);
    }

</script>

</body>

<footer>
    <?php include "footer1.php" ?>
</footer>

</html>