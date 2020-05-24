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
</head>

<body>

<div id="conteneur1">
    <div id="menu">
        <a href="#" class="active">Menu</a>
        <a href="mesDonneesUtilisateurs.php">Mon profil</a>
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
 `N°_de_telephone`, `Adresse`, `Adresse_email` FROM `utilisateur` WHERE `Adresse_email` = :mail');
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
                <p>Prochain rdv</p>
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
 FROM `test` WHERE `mail_utilisateur` = :mail ORDER BY `Date` ASC');
$reqTests->execute(array(
    'mail' => $_SESSION['mailConnecte']));


?>

<div id="tableau">
    <table>
        <cpation> </cpation>
        <tr>
            <th></th>
            <th>Score total</th>
            <th>Temp avant-test</th>
            <th>Fréq cardiaque avant-test</th>
            <th>Mémorisation auditive</th>
            <th>Mémorisation visuelle</th>
            <th>Réflexe auditif</th>
            <th>Réflexe visuel</th>
            <th>Reproduction sonore</th>
            <th>Temp après-test</th>
            <th>Fréq cardiaque après-test</th>
        </tr>

        <?php

        while($donneesTests = $reqTests ->fetch()) {

            ?>
            <tr>
                <th>Test du <?php echo $donneesTests['DATE_FORMAT(`Date`, "%d/%m/%Y")'] ?></th>
                <td><?php echo $donneesTests['Score_total'] ?></td>
                <td><?php echo $donneesTests['Res_temp_avant_test'] ?></td>
                <td><?php echo $donneesTests['Res_freq_card_avant_test'] ?></td>
                <td><?php echo $donneesTests['Res_rythme_sonore'] ?></td>
                <td><?php echo $donneesTests['Res_rythme_visuel'] ?></td>
                <td><?php echo $donneesTests['Res_stimulus_sonore'] ?></td>
                <td><?php echo $donneesTests['Res_stimulus_visuel'] ?></td>
                <td><?php echo $donneesTests['Res_reprod_sonore'] ?></td>
                <td><?php echo $donneesTests['Res_temp_apres_test'] ?></td>
                <td><?php echo $donneesTests['Res_freq_card_apres_test'] ?></td>
            </tr>

        <?php }

        $reqTests->closeCursor();
        ?>

    </table>
</div>
</body>

<footer>
    <?php include "footer.php" ?>
</footer>

</html>