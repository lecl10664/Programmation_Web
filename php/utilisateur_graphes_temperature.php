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

    </div>


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



<?php

// affichage du tableau des tests du profils connecté
// récuperation des tests de l'utilisateur connecté dans la bdd

$reqTests = $bdd->prepare('SELECT `mail_utilisateur`, `mail_gestionnaire`, DATE_FORMAT(`Date`, "%d/%m/%Y"), 
`Score_total`, `Res_freq_card_avant_test`, `Res_freq_card_apres_test`, `Res_temp_avant_test`, `Res_temp_apres_test`,
 `Res_rythme_visuel`, `Res_stimulus_visuel`, `Res_rythme_sonore`, `Res_stimulus_sonore`, `Res_reprod_sonore` 
 FROM `test` WHERE `mail_utilisateur` = :mail ORDER BY `Date` DESC');
$reqTests->execute(array(
    'mail' => $_SESSION['mailConnecte']));


?>


<div class="graphes">

    <div class="bouton_graphe">
        <a href="utilisateur_graphes_resultats.php"><button class="button" >Graphique générales</button></a>
        <a href="utilisateur_graphes_frequence.php"><button class="button">Graphique fréquence cardiaque</button></a>
        <a href="utilisateur_graphes_temperature.php"><button class="button">Graphique température</button></a>
    </div>

    <div id="graphe3">

        <canvas id="myChart" height="100"></canvas>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'line',

                // The data for our dataset
                data: {
                    labels: ['Mémorisation auditive', 'Mémorisation visuelle', 'Réflexe auditif',
                        'Réflexe visuel', 'Reproduction sonore'],
                    datasets: [
                        <?php

                        while($donneesTests = $reqTests ->fetch()) {

                        ?>
                        {
                            label: 'Test du <?php echo $donneesTests['DATE_FORMAT(`Date`, "%d/%m/%Y")'] ?>',
                            backgroundColor: 'rgba(0, 0, 0, 0.1)',
                            borderColor: 'rgb(0,0,151)',
                            data: [ <?php echo $donneesTests['Res_rythme_sonore'] ?>, <?php echo $donneesTests['Res_rythme_visuel'] ?>,
                                <?php echo $donneesTests['Res_stimulus_sonore'] ?>, <?php echo $donneesTests['Res_stimulus_visuel'] ?>,
                                <?php echo $donneesTests['Res_reprod_sonore'] ?>]
                        },
                        <?php } ?>
                    ]
                },

                // Configuration options go here
                options: {
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            fontFamily: 'open_sansregular, sans-serif',
                            fontColor: 'black',
                            fontSize: 15
                        }
                    }
                }
            });
        </script>

    </div>



</div>


</body>

<footer>
    <?php include "footer.php" ?>
</footer>

</html>