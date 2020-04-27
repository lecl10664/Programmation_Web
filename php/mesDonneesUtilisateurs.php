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
    <?php include "./php/header.php" ?>
    <link rel="stylesheet" href="../css/mesDonneesUtilisateur.css" />
    <title>Mes Données utilisateur</title>
</head>

<body>

<div id="conteneur1">
    <div id="menu">
        <a href="#" class="active">Menu</a>
        <a href="mesDonneesUtilisateurs.php">Mes données</a>
        <a href="utilisateur.php">Mes rendez-vous</a>
        <a href="">Forum</a>
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

    $reqProfil = $bdd->prepare('SELECT * FROM `utilisateur` WHERE `Adresse_email` = :mail');
    $reqProfil->execute(array(
        'mail' => $_SESSION['mailUtilisateur']));

    $donneesProfil = $reqProfil->fetch();
    ?>

    <div id="profil">
        <h3 class="profil-titre">MON PROFIL</h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p><?php  echo $donneesProfil['Prenom'], ' ', $donneesProfil['Nom']  ?></p>
                <p>Date de naissance: <?php  echo $donneesProfil['Date_de_naissance']?></p>
                <p>Adresse du centre</p>
                <p>Prochain rdv</p>
                <p>Score moyen</p>
                <p>Niveau</p>
            </div>
            <img class="profil-photo" src="/images/profil_400x400.png" title="profil_admin"></img>
        </div>
    </div>

</div>

<?php

// affichage du tableau des tests du profils connecté
// récuperation des tests de l'utilisateur connecté dans la bdd

$reqTests = $bdd->prepare('SELECT * FROM `test` WHERE `Adresse_email` = :mail');
$reqTests->execute(array(
    'mail' => $_SESSION['mailUtilisateur']));

$donneesProfil = $reqProfil->fetch();


?>

<div id="tableau">
    <table>
        <cpation> </cpation>
        <tr>
            <th></th>
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
        <tr>
            <th>Test du 18/04/2020</th>
            <td>31 °C</td>
            <td>70 bpm</td>
            <td>2/3</td>
            <td>3/3</td>
            <td>300 ms</td>
            <td>380 ms</td>
            <td>1/3</td>
            <td>33 °C</td>
            <td>90 bpm</td>
        </tr>
        <tr>
            <th>Test du 03/04/2020</th>
            <td>29 °C</td>
            <td>80 bpm</td>
            <td>2/3</td>
            <td>1/3</td>
            <td>410 ms</td>
            <td>370 ms</td>
            <td>1/3</td>
            <td>30 °C</td>
            <td>80 bpm</td>
        </tr>
        <tr>
            <th>Test du 21/03/2020</th>
            <td>30 °C</td>
            <td>60 bpm</td>
            <td>1/3</td>
            <td>1/3</td>
            <td>400 ms</td>
            <td>420 ms</td>
            <td>0/3</td>
            <td>29 °C</td>
            <td>90 bpm</td>
        </tr>
        <tr>
            <th>Moyenne</th>
            <td>30 °C</td>
            <td>70 bpm</td>
            <td>1,7/3</td>
            <td>1,7/3</td>
            <td>370 ms</td>
            <td>390 ms</td>
            <td>0,7/3</td>
            <td>30,7 °C</td>
            <td>86,7 bpm</td>
        </tr>
    </table>
</div>

<?php
$test = [
    'test 1' => ['Temp avant-test'=> 'résultat', 'Fréq cardiaque avant-test'=> 'résultat', 'Mémorisation auditive'=> 'résultat', 'Mémorisation visuelle'=> 'résultat', 'Réflexe auditif'=> 'résultat', 'Réflexe visuel'=> 'résultat', 'Reproduction sonore'=> 'résultat', 'Temp après-test'=> 'résultat', 'Fréq cardiaque après-test'=> 'résultat'],
    'test 2' => ['Temp avant-test'=> 'résultat', 'Fréq cardiaque avant-test'=> 'résultat', 'Mémorisation auditive'=> 'résultat', 'Mémorisation visuelle'=> 'résultat', 'Réflexe auditif'=> 'résultat', 'Réflexe visuel'=> 'résultat', 'Reproduction sonore'=> 'résultat', 'Temp après-test'=> 'résultat', 'Fréq cardiaque après-test'=> 'résultat'],
    'test 3' => ['Temp avant-test'=> 'résultat', 'Fréq cardiaque avant-test'=> 'résultat', 'Mémorisation auditive'=> 'résultat', 'Mémorisation visuelle'=> 'résultat', 'Réflexe auditif'=> 'résultat', 'Réflexe visuel'=> 'résultat', 'Reproduction sonore'=> 'résultat', 'Temp après-test'=> 'résultat', 'Fréq cardiaque après-test'=> 'résultat']
];

//foreach ($test as $clef => $produit){
//echo 'Test : ' .$clef. '<br>';
//foreach($produit as $caracteristique => $valeur){
//echo $caracteristique. ' : ' .$valeur. '<br>';
//}
//echo '<br>';
//}
?>

</body>

<footer>
    <?php include "./php/footer.php" ?>
</footer>

</html>