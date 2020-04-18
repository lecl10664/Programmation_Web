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
    <title>Mes Données utilisateur</title>
</head>

<body>

<div id="conteneur1">
    <div id="menu">
        <a href="#" class="active">Menu</a>
        <a href="">Lancer un test</a>
        <a href="">Utilisateurs</a>
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
    <button class="button_valider">Valider</button>
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
                element.style.color="rgb(0,107,141)";}
            else {
                element.style.backgroundColor="rgb(0,107,141)";
                element.style.color="white";}
        };
    }

    function rebour(tps)
    {
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
            document.getElementById("compteRebour_affiche").innerHTML = 'Temps restant avant lancement de la partie : '+secondes;
            var restant = tps-1;
            setTimeout("rebour("+restant+")", 1000);
        }
        else
        {
            document.getElementById("compteRebour_affiche").innerHTML = 'chargement ...';
        }
    }

    function rebour1(tps){ //Deffinition d'une fonction
        if (tps>0) { //Si le temps est différent de 0
            var heure = Math.floor(tps/3600); //Nombre d'heure écoulés
            if(heure >= 24){ //Si plus de 24 => 1 jour
                var jour = Math.floor(heure/24); //Calcul du nombre de jour
                var moins = 86400*jour; // Deffinition et attribution d'une valeur à `moins` qui est la variable soustractrice de la fonction
                var heure = heure-(24*jour); //On enléve le nombre d'heure concernée
            }else{
                var jour = 0; //Sinon, il n'y a pas de jour
                var moins = 0; // Et pas ed variable moins
            }
            moins = moins+3600*heure; // Recalcul
            var minutes = Math.floor((tps-moins)/60); // Calcul des minutes
            moins = moins + 60*minutes; // Recalcul de la variable moins
            var secondes = tps-moins; //Calcul des seconde
            minutes = ((minutes < 10) ? "0" : "") + minutes;//On rajoute un 0 si les minutes sont inférieures à 10
            secondes = ((secondes < 10) ? "0" : "") + secondes; //On rajoute un 0 si les secondes sont inférieures à 10
            //document.getElementById("compteRebour_affiche").innerHTML = 'Temps restant : '+jour+' Jours, '+heure+':'+minutes+':'+secondes; //On affiche le resultat dans le div concerné
            var restant = tps-1; //On enléve une seconde
            setTimeout("rebour("+restant+")", 1000);//On rappelle la fonction toute les secondes
        }else{
            alert("Compte à rebour fini !"); //Message
        }
    }

    //document.getElementsByClassName("button_valider").onclick=rebour('5');
    $( ".button_valider" ).click(rebour('5'));

    $('.button_valider').click(function(e) {
        e.preventDefault();
        $('#compteRebour_affiche').toggleClass('active');
    })

</script>

</body>

<footer>
    <?php include "./php/footer.php" ?>
</footer>

</html>