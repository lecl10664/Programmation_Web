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

<div id="conteneur">

<div id="menu">
    <li><a href="#">Menu</a>
        <ul>
            <li><a href="mesDonneesUtilisateurs.php">Mes données</a></li>
            <li><a href="utilisateur.php">Prendre rendez-vous</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <li><a href="contact.php">Nous contacter</a></li>
        </ul>
    </li>
</div>

<div id="main">
    <table>
        <caption>Mes Données</caption>
        <tr>
            <th></th>
            <th>Test du 'date'</th>
            <th>Test du 'date'
            <th>Test du 'date'</th>
            <th>Test du 'date'</th>
        </tr>
        <tr>
            <th>Température avant-test</th>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
        </tr>
        <tr>
            <th>Fréquence cardiaque avant-test</th>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
        </tr>
        <tr>
            <th>Mémorisation rythme auditif</th>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
        </tr>
        <tr>
            <th>Mémorisation rythme visuel</th>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
        </tr>
        <tr>
            <th>Réflexe stimulus visuel</th>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
        </tr>
        <tr>
            <th>Réflexe stimulus auditif</th>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
        </tr>
        <tr>
            <th>Reproduction sonore</th>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
        </tr>
        <tr>
            <th>Température après-test</th>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
        </tr>
        <tr>
            <th>Fréquence cardiaque après-test</th>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
        </tr>
        <tr>
            <th>Moyenne</th>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
            <td>résultat</td>
        </tr>
    </table>
</div>

<div id="content">
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

</div>

</body>

<footer>
    <?php include "./php/footer.php" ?>
</footer>

</html>