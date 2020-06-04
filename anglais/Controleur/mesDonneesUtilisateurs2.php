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
        <p> Which tests do you want to view ?</p>
        <div id="boutons">
            <div id="tout">
                <button class="button"> All tests </button>
            </div>
            <div id="avant-test">
                <button class="button">Temp <br/> avant-test</button>
                <button class="button">Heart rate <br/> avant-test</button>
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
                <button class="button">Temp <br/> before tests</button>
                <button class="button">Heart rate <br/> after tests</button>
            </div>
        </div>
        <button class="button_valider">Confirm</button>
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
        <h3 class="profil-titre">My profile : <?php  echo $donneesProfil['Prenom'], ' ', $donneesProfil['Nom']  ?> </h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p>Birthdate : <?php  echo $donneesProfil['DATE_FORMAT(`Date_de_naissance`, "%d/%m/%Y")']?></p>
                <p>Phone : <?php echo $donneesProfil['N°_de_telephone']?></p>
                <p>Address : <?php echo $donneesProfil['Adresse']?></p>
                <p>Email : <?php echo $donneesProfil['Adresse_email']?></p>
                <p>Next appointment: <?php echo $donneesProfil['DATE_FORMAT(`date_rdv`, "Le %d/%m/%Y à %H:%i")']; ?></p>
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

<div id="tableau">
    <table>
        <cpation> </cpation>
        <tr>
            <th></th>
            <th>Total score</th>
            <th>Temp before-test</th>
            <th>Heart rate before-test</th>
            <th>Hearing memory</th>
            <th>Visual memory</th>
            <th>Hearing reflexes</th>
            <th>Visual reflexes</th>
            <th>Sound reproduction</th>
            <th>Temp after-test</th>
            <th>Heart rate after-test</th>
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
    <?php include "footer2.php" ?>
</footer>

</html>