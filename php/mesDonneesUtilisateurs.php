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
        <p> Mes données</p>
    </div>

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
            <th>Mémorisation auditif</th>
            <th>Mémorisation visuel</th>
            <th>Réflexe visuel</th>
            <th>Réflexe auditif</th>
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

</body>

<footer>
    <?php include "./php/footer.php" ?>
</footer>

</html>