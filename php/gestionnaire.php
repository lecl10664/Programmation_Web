<?php
$dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
chdir($dir2.DIRECTORY_SEPARATOR);
//echo getcwd()."<br>";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <?php include "./php/header.php" ?>
    <link rel="stylesheet" href="../css/gestionnaire.css" />
    <script src="https://kit.fontawesome.com/8bfc90242a.js" crossorigin="anonymous"></script>
    <title>Gestionnaire : lancer un test</title>
</head>

<body>

<div id="conteneur1">
    <div id="menu">
        <a href="#" class="active">Menu</a>
        <a href="gestionnaire.php">Lancer un test</a>
        <a href="gestionnaire_rechercheAdmin.php">Utilisateurs</a>
        <a href="">Forum</a>
    </div>

    <div id="main">
        <button class="button_play"> <i class="fas fa-play"></i> Lancer un test ! </button>
    </div>

    <div id="profil">
        <h3 class="profil-titre">MON PROFIL</h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p>Nom</p>
                <p>Prénom</p>
                <p>Adresse du centre</p>
            </div>
            <img class="profil-photo" src="/images/profil_400x400.png"></img>
        </div>
    </div>

</div>

<div class="choix">
    <p> Quels test voulez-vous lancer ? </p>
    <div id="boutons">
        <div id="tout">
            <button class="button"> Tous les tests </button>
        </div>
        <div id="avant-test">
            <button class="button">Temp <br/> avant-test</button>
            <button class="button">Fréq cardiaque <br/> avant-test</button>
        </div>
        <div id="memorisation">
            <button class="button">Mémorisation auditif</button>
            <button class="button">Mémorisation visuel</button>
        </div>
        <div id="reflexe">
            <button class="button">Réflexe visuel</button>
            <button class="button">Réflexe auditif</button>
        </div>
        <div id="reproduction">
            <button class="button">Reproduction sonore</button>
        </div>
        <div id="apres-test">
            <button class="button">Temp <br/> après-test</button>
            <button class="button">Fréq cardiaque <br/> après-test</button>
        </div>
    </div>
    <button class="button_valider" onclick="rebour('3')">Valider</button>
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
                element.style.color="#3a914d";}
            else {
                element.style.backgroundColor="#3a914d";
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
    <?php include "./php/footer.php" ?>
</footer>

</html>