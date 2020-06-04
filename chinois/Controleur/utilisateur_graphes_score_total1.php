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
    <?php include "header1.php" ?>
    <link rel="stylesheet" href="../css/mesDonneesUtilisateur.css" />
    <title>Mes Données utilisateur</title>
    <script type="text/javascript" src="../library_graphique/Chart.js"></script>
</head>

<body>

<div id="conteneur1">
    <div id="menu">
        <a href="#" class="active">菜单</a>
        <a href="mesDonneesUtilisateurs1.php">我的成绩</a>
        <a href="utilisateur_graphes_resultats1.php">我的图表</a>
        <a href="utilisateur_rdv1.php">我的预约</a>
        <a href="contact1.php">联系我们r</a>
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
        <h3 class="profil-titre">我的账户 : <?php  echo $donneesProfil['Prenom'], ' ', $donneesProfil['Nom']  ?> </h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p>生日 : <?php  echo $donneesProfil['DATE_FORMAT(`Date_de_naissance`, "%d/%m/%Y")']?></p>
                <p>电话 : <?php echo $donneesProfil['N°_de_telephone']?></p>
                <p>地址 : <?php echo $donneesProfil['Adresse']?></p>
                <p>邮箱 : <?php echo $donneesProfil['Adresse_email']?></p>
                <p>下次预约 : <?php echo $donneesProfil['DATE_FORMAT(`date_rdv`, "Le %d/%m/%Y à %H:%i")']; ?></p>
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



$reqDate = $bdd->prepare('SELECT `mail_utilisateur`, `mail_gestionnaire`, DATE_FORMAT(`Date`, "%d/%m/%Y"), 
`Score_total`, `Res_freq_card_avant_test`, `Res_freq_card_apres_test`, `Res_temp_avant_test`, `Res_temp_apres_test`,
 `Res_rythme_visuel`, `Res_stimulus_visuel`, `Res_rythme_sonore`, `Res_stimulus_sonore`, `Res_reprod_sonore` 
 FROM `test` WHERE `mail_utilisateur` = :mail ORDER BY `Date` ASC');
$reqDate->execute(array(
    'mail' => $_SESSION['mailConnecte']));

$reqTests = $bdd->prepare('SELECT `mail_utilisateur`, `mail_gestionnaire`, DATE_FORMAT(`Date`, "%d/%m/%Y"), 
`Score_total`, `Res_freq_card_avant_test`, `Res_freq_card_apres_test`, `Res_temp_avant_test`, `Res_temp_apres_test`,
 `Res_rythme_visuel`, `Res_stimulus_visuel`, `Res_rythme_sonore`, `Res_stimulus_sonore`, `Res_reprod_sonore` 
 FROM `test` WHERE `mail_utilisateur` = :mail ORDER BY `Date` ASC');
$reqTests->execute(array(
    'mail' => $_SESSION['mailConnecte']));




function affiche_date($req) {
    while($donneesDate = $req ->fetch()) {
        echo "'Test du ".$donneesDate['DATE_FORMAT(`Date`, "%d/%m/%Y")']."'," ;}
}

function affiche_score_total($req) {
    while($donneesTests = $req ->fetch()) {
        echo "'".$donneesTests['Score_total']."'," ;}
}



?>


<div class="graphes">

    <div class="bouton_graphe">
        <a href="utilisateur_graphes_score_total1.php"><button class="button" >总分</button></a>
        <a href="utilisateur_graphes_resultats1.php"><button class="button">测试图表</button></a>
    </div>

    <div id="graphe2">

        <canvas id="myChart" height="100"></canvas>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'line',

                // The data for our dataset
                data: {
                    labels: [<?php affiche_date($reqDate); ?>],
                    datasets: [
                        {
                            label: 'Score total',
                            backgroundColor: 'rgba(0, 0, 0, 0.1)',
                            borderColor: 'rgb(0,0,0)',
                            data: [<?php affiche_score_total($reqTests); ?>]
                        },
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
    <?php include "footer1.php" ?>
</footer>

</html>