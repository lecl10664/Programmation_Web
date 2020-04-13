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
    <link rel="stylesheet" href="../css/mesDonneesUtilisateur.css" />
    <title>Mes Données utilisateur</title>
</head>

<body>

<div id="conteneur1">
    <div id="menu">
        <a href="#" class="active">Menu</a>
        <a href="mesDonneesUtilisateurs.php">Mes données</a>
        <a href="utilisateur.php">Mes rendez-vous</a>
        <a href="faq.php">FAQ</a>
        <a href="contact.php">Nous contacter</a>
    </div>

    <div id="main">
        <p> Afficher :</p>
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


    <div id="profil">
        <h3 class="profil-titre">MON PROFIL</h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p>Nom Prénom</p>
                <p>Age</p>
                <p>Adresse du centre</p>
                <p>Prochain rdv</p>
                <p>Score moyen</p>
                <p>Niveau</p>
            </div>
            <img class="profil-photo" src="/images/profil_400x400.png" title="profil_admin"></img>
        </div>
    </div>

</div>

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
            <th>Moyenne</th>
        </tr>
        <tr>
            <th>Test du 'date'</th>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
        </tr>
        <tr>
            <th>Test du 'date'</th>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
        </tr>
        <tr>
            <th>Test du 'date'</th>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
        </tr>
        <tr>
            <th>Test du 'date'</th>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
        </tr>
        <tr>
            <th>Test du 'date'</th>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
        </tr>
    </table>
</div>

<?php
$test = [
    'test 1' => ['Temp avant-test'=> 'résultat', 'Fréq cardiaque avant-test'=> 'résultat', 'Mémorisation auditive'=> 'résultat', 'Mémorisation visuelle'=> 'résultat', 'Réflexe auditif'=> 'résultat', 'Réflexe visuel'=> 'résultat', 'Reproduction sonore'=> 'résultat', 'Temp après-test'=> 'résultat', 'Fréq cardiaque après-test'=> 'résultat'],
    'test 2' => ['Temp avant-test'=> 'résultat', 'Fréq cardiaque avant-test'=> 'résultat', 'Mémorisation auditive'=> 'résultat', 'Mémorisation visuelle'=> 'résultat', 'Réflexe auditif'=> 'résultat', 'Réflexe visuel'=> 'résultat', 'Reproduction sonore'=> 'résultat', 'Temp après-test'=> 'résultat', 'Fréq cardiaque après-test'=> 'résultat'],
    'test 3' => ['Temp avant-test'=> 'résultat', 'Fréq cardiaque avant-test'=> 'résultat', 'Mémorisation auditive'=> 'résultat', 'Mémorisation visuelle'=> 'résultat', 'Réflexe auditif'=> 'résultat', 'Réflexe visuel'=> 'résultat', 'Reproduction sonore'=> 'résultat', 'Temp après-test'=> 'résultat', 'Fréq cardiaque après-test'=> 'résultat']
    ];

foreach ($test as $clef => $produit){
    echo 'Produit : ' .$clef. '<br>';
    foreach($produit as $caracteristique => $valeur){
        echo $caracteristique. ' : ' .$valeur. '<br>';
    }
    echo '<br>';
}
?>

</body>

<footer>
    <?php include "./php/footer.php" ?>
</footer>

</html>