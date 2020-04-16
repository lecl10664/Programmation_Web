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

<div id="choix">
    <p> Choisir :</p>
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
</div>


<script>
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
</script>

</body>

<footer>
    <?php include "./php/footer.php" ?>
</footer>

</html>