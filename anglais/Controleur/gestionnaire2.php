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
    <?php include "header2.php" ?>
    <link rel="stylesheet" href="../Vue/gestionnaire.css" />
    <script src="https://kit.fontawesome.com/8bfc90242a.js" crossorigin="anonymous"></script>
    <title>Manager : start a test</title>
</head>

<body>

<div id="conteneur1">
    <div id="menu">
        <a href="#" class="active">Menu</a>
        <a href="gestionnaire.php">Start a test</a>
        <a href="gestionnaire_ajout_resultats_tests.php">New test results</a>
        <a href="gestionnaire_rechercheUtilisateur.php">Display users</a>
        <a href="gestionnaire_rechercheTests.php">Display tests</a>
    </div>

    <div id="main">
        <button class="button_play"> <i class="fas fa-play"></i> Start a test ! </button>
    </div>

    <div id="profil">
        <h3 class="profil-titre">MY DRIVING SCHOOL PROFILE</h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p>Driving school name : <?php echo $donneesProfil['Nom_auto_ecole']?></p>
                <p>Address : <?php echo $donneesProfil['adresse_auto_ecole']?></p>
                <p>Email : <?php echo $donneesProfil['mail_auto_ecole']?></p>
            </div>
            <!--<img class="profil-photo" src="/images/profil_400x400.png"></img>   -->
        </div>
    </div>

</div>

<div class="choix">
    <p> Which test do you wish to start ? </p>
    <div id="boutons">
        <div id="tout">
            <button class="button"> All tests </button>
        </div>
        <div id="avant-test">
            <button class="button">Temp <br/> before test</button>
            <button class="button">Heart rate <br/> before test</button>
        </div>
        <div id="memorisation">
            <button class="button">Hearing memory</button>
            <button class="button">Visual memory</button>
        </div>
        <div id="reflexe">
            <button class="button">Visual reflex</button>
            <button class="button">Hearing reflex</button>
        </div>
        <div id="reproduction">
            <button class="button">Sound reproduction</button>
        </div>
        <div id="apres-test">
            <button class="button">Temp <br/> after test</button>
            <button class="button">Heart rate <br/> after test</button>
        </div>
    </div>
    <button class="button_valider" onclick="rebour('3')">Confirm</button>
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
    <?php include "footer2.php" ?>
</footer>

</html>