<?php
$dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
chdir($dir2.DIRECTORY_SEPARATOR);
//echo getcwd()."<br>";


//On se connecte à la BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=appg9b;port=3308;charset=utf8', 'root', '');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
session_start();
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <?php include "header.php" ?>
    <link rel="stylesheet" href="../css/mesDonneesUtilisateur.css" />
    <title>Mes Données utilisateur</title>
    <script type="text/javascript" src="../library_graphique/Chart.js"></script>
</head>

<body>

<div id="conteneur1">
    <div id="menu">
        <a href="#" class="active">Menu</a>
        <a href="mesDonneesUtilisateurs.php">Mes résultats</a>
        <a href="utilisateur_graphes_resultats.php">Mes graphes</a>
        <a href="utilisateur_rdv.php">Mes rendez-vous</a>
        <a href="contact.php">Nous contacter</a>
    </div>

    <div id="main">
        <p> Quels test voulez-vous afficher ?</p>
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

    <?php

    //afficher le profil à partir de la bdd

    // récupération des infos de l'utilisateur connecté

    $reqProfil = $bdd->prepare('SELECT `IDUtilisateur`, `Mot_de_passe`, `Nom`, `Prenom`, DATE_FORMAT(`Date_de_naissance`, "%d/%m/%Y"),
 `N°_de_telephone`, `Adresse`, `Adresse_email`, DATE_FORMAT(`date_rdv`, "Le %d/%m/%Y à %H:%i"), `lieu_rdv` FROM `utilisateur` WHERE `Adresse_email` = :mail');
    $reqProfil->execute(array(
        'mail' => $_SESSION['mailConnecte']));

    $donneesProfil = $reqProfil->fetch();
    ?>

    <div id="profil">
        <h3 class="profil-titre">Mon profil : <?php  echo $donneesProfil['Prenom'], ' ', $donneesProfil['Nom']  ?> </h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p>Date de naissance : <?php  echo $donneesProfil['DATE_FORMAT(`Date_de_naissance`, "%d/%m/%Y")']?></p>
                <p>Téléphone : <?php echo $donneesProfil['N°_de_telephone']?></p>
                <p>Adresse : <?php echo $donneesProfil['Adresse']?></p>
                <p>Adresse mail : <?php echo $donneesProfil['Adresse_email']?></p>
                <p>Prochain rdv: <?php echo $donneesProfil['DATE_FORMAT(`date_rdv`, "Le %d/%m/%Y à %H:%i")']; ?></p>
                <a class="profil-editer" href="editer_profil.php">
                    <img class="profil-editer_no_hover"
                         src="../images/stylo_noir.png"
                         width="50" height="50"
                         alt="editer_profil"/>
                    <img class="profil-editer_hover"
                         src="../images/stylo_blanc.png"
                         width="50" height="50"
                         alt="editer_profil_hover"/>
                </a>
            </div>
            <!-- <img class="profil-photo" src="/images/profil_400x400.png" title="profil_admin"></img> -->
        </div>
    </div>
</div>

<div class="graphes">
    <div class="graphe1">

        <canvas id="myChart" height="100"></canvas>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'radar',

                // The data for our dataset
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [{
                        label: 'Test 1',
                        backgroundColor: 'rgb(255,248,253)',
                        borderColor: 'rgb(0,0,151)',
                        data: [0, 10, 5, 2, 20, 30, 45]
                    },{
                        label: 'Test 2',
                        backgroundColor: 'rgb(255,248,253)',
                        borderColor: 'rgb(255,43,248)',
                        data: [10, 10, 50, 20, 2, 30, 4]
                    }]
                },

                // Configuration options go here
                options: {}
            });
        </script>

    </div>

</div>









</body>

<footer>
    <?php include "footer.php" ?>
</footer>

</html>