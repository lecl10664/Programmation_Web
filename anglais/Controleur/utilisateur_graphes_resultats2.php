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
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <?php include "header2.php" ?>
    <link rel="stylesheet" href="../Vue/mesDonneesUtilisateur.css" />
    <title>My Data</title>
    <script type="text/javascript" src="../library_graphique/Chart.js"></script>
</head>

<body>

<div id="conteneur1">
    <div id="menu">
        <a href="#" class="active">Menu</a>
        <a href="mesDonneesUtilisateurs2.php">My results</a>
        <a href="utilisateur_graphes_score_total2.php">My graphs</a>
        <a href="utilisateur_rdv2.php">My appointments</a>
        <a href="contact2.php">Contact us</a>
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
        <h3 class="profil-titre">My profile : <?php  echo $donneesProfil['Prenom'], ' ', $donneesProfil['Nom']  ?> </h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p>Birth date : <?php  echo $donneesProfil['DATE_FORMAT(`Date_de_naissance`, "%d/%m/%Y")']?></p>
                <p>Phone number : <?php echo $donneesProfil['N°_de_telephone']?></p>
                <p>Adress : <?php echo $donneesProfil['Adresse']?></p>
                <p>email : <?php echo $donneesProfil['Adresse_email']?></p>
                <p>Next appointement: <?php echo $donneesProfil['DATE_FORMAT(`date_rdv`, "Le %d/%m/%Y à %H:%i")']; ?></p>
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
        <a href="utilisateur_graphes_score_total.php"><button class="button" >Total score</button></a>
        <a href="utilisateur_graphes_resultats.php"><button class="button">Tests graph</button></a>
    </div>

    <div id="graphe1">

        <canvas id="myChart" height="120"></canvas>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {

                // The type of chart we want to create
                type: 'radar',

                // The data for our dataset
                data: {
                    labels: ['Hearing memory', 'Visual memory', 'Hearing reflex',
                        'Visual reflex', 'Sound reproduction'],
                    datasets: [
                        <?php
                      $donneesTests = $reqTests ->fetch();
                        ?>
                        {
                            label: 'Test du <?php echo $donneesTests['DATE_FORMAT(`Date`, "%d/%m/%Y")'] ?>',
                            backgroundColor: 'rgba(0,0,0,0.04)',
                            borderColor: 'rgb(0,95,122)',
                            data: [ <?php echo $donneesTests['Res_rythme_sonore'] ?>, <?php echo $donneesTests['Res_rythme_visuel'] ?>,
                                <?php echo $donneesTests['Res_stimulus_sonore'] ?>, <?php echo $donneesTests['Res_stimulus_visuel'] ?>,
                                <?php echo $donneesTests['Res_reprod_sonore'] ?>]
                        },
                        <?php
                        $donneesTests = $reqTests ->fetch();
                        ?>
                        {
                            label: 'Test du <?php echo $donneesTests['DATE_FORMAT(`Date`, "%d/%m/%Y")'] ?>',
                            backgroundColor: 'rgba(0,0,0,0.05)',
                            borderColor: 'rgb(0,156,183)',
                            data: [ <?php echo $donneesTests['Res_rythme_sonore'] ?>, <?php echo $donneesTests['Res_rythme_visuel'] ?>,
                                <?php echo $donneesTests['Res_stimulus_sonore'] ?>, <?php echo $donneesTests['Res_stimulus_visuel'] ?>,
                                <?php echo $donneesTests['Res_reprod_sonore'] ?>]
                        },
                    ]
                },

                // Configuration options go here
                options: {
                    scale: {
                        ticks: {
                            suggestedMin: 0,
                        }
                    }
                }
            });
        </script>

    </div>



</div>


</body>

<footer>
    <?php include "footer2.php" ?>
</footer>

</html>