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


// récupération des infos du gestionnaire connecté

$reqProfil = $bdd->prepare('SELECT * FROM `gestionnaire` WHERE `mail_auto_ecole` = :mail');
$reqProfil->execute(array(
    'mail' => $_SESSION['mailConnecte']));

$donneesProfil = $reqProfil->fetch();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <?php include "header.php" ?>
    <link rel="stylesheet" href="../Vue/gestionnaire_rechercheUtilisateur.css" />
    <title>Recherche des administrateurs</title>
</head>

<div id="conteneur1">
    <div id="menu">
        <a href="#" class="active">Menu</a>
        <a href="gestionnaire.php">Lancer un test</a>
        <a href="gestionnaire_ajout_resultats_tests.php">Nouveau résultat de tests</a>
        <a href="gestionnaire_rechercheUtilisateur.php">Afficher utilisateurs</a>
        <a href="gestionnaire_rechercheTests.php">Afficher tests</a>
    </div>

    <div id="main">
        <h1> Rechercher un utilisateur</h1>
        <h2> Quel type de recherche voulez-vous effectuer ?</h2>
        <div id="boutons">
            <button class="button_bar"> Effectuer une recherche par mail utilisateur </button>
            <button class="button_critere"> Effectuer une recherche par critères </button>
        </div>
    </div>

    <div id="profil">
        <h3 class="profil-titre">MON PROFIL AUTO-ECOLE</h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p>Nom de l'auto-école : <?php echo $donneesProfil['Nom_auto_ecole']?></p>
                <p>Adresse du centre : <?php echo $donneesProfil['adresse_auto_ecole']?></p>
                <p>Adresse mail : <?php echo $donneesProfil['mail_auto_ecole']?></p>
            </div>
            <!--<img class="profil-photo" src="/images/profil_400x400.png"></img>   -->
        </div>
    </div>

</div>

<div id="recherche">
    <div class="searchbar">
        <h1>Rechercher un utilisateur par mail</h1>
        <form action="gestionnaire_rechercheUtilisateur.php"  method="post">
            <label for="nom">Adresse mail : <input type="search" name="mail_recherche" size="50" required/></label>
            <input type="submit" value="Rechercher">
        </form>
    </div>

    <div id="recherche_criteres">
        <h1>Rechercher un utilisateur par critères</h1>
        <form action="gestionnaire_rechercheUtilisateur.php" method="post">
            <label for="dateNaissance">Nom :</label><input type="search" name="nom_recherche"/>
            <label for="dateNaissance">Date de naissance : </label><input type="date" name="date_recherche"/>
            <label for="ville">Adresse postale : </label><input type="search" name="adresse_recherche"/>
            <input type="submit" value="Rechercher" class="fas fa-search">
        </form>
    </div>
</div>

<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
</script>

<script>
    $('.button_bar').click(function(e) {
        e.preventDefault();
        $('.searchbar').toggleClass('active');
    })

    $('.button_critere').click(function(e) {
        e.preventDefault();
        $('#recherche_criteres').toggleClass('active');
    })

    $('.button_affiche').click(function(e) {
        e.preventDefault();
        $('#tableau').toggleClass('active');
    })
</script>

<?php

// affichage du tableau de tous les tests
// récuperation des tests de l'utilisateur connecté dans la bdd
if(isset($_POST['mail_recherche'])) {
    $reqProfil = $bdd->prepare('SELECT `IDUtilisateur`, `Mot_de_passe`, `Nom`, `Prenom`, DATE_FORMAT(`Date_de_naissance`, "%d/%m/%Y"),
 `N°_de_telephone`, `Adresse`, `Adresse_email` FROM `utilisateur` WHERE `Adresse_email` = :mail');
    $reqProfil->execute(array(
        'mail' => $_POST['mail_recherche']));
}

else if(isset($_POST['nom_recherche'])) {
    $reqProfil = $bdd->prepare('SELECT `IDUtilisateur`, `Mot_de_passe`, `Nom`, `Prenom`, DATE_FORMAT(`Date_de_naissance`, "%d/%m/%Y"),
 `N°_de_telephone`, `Adresse`, `Adresse_email` FROM `utilisateur` WHERE `Nom` = :nom');
    $reqProfil->execute(array(
        'nom' => $_POST['nom_recherche']));
}
else if(isset($_POST['date_recherche'])) {
    $reqProfil = $bdd->prepare('SELECT `IDUtilisateur`, `Mot_de_passe`, `Nom`, `Prenom`, DATE_FORMAT(`Date_de_naissance`, "%d/%m/%Y"),
 `N°_de_telephone`, `Adresse`, `Adresse_email` FROM `utilisateur` WHERE `Date_de_naissance` = :date_de_naissance');
    $reqProfil->execute(array(
        'date_de_naissance' => $_POST['date_recherche']));
}
else if(isset($_POST['adresse_recherche'])) {
    $reqProfil = $bdd->prepare('SELECT `IDUtilisateur`, `Mot_de_passe`, `Nom`, `Prenom`, DATE_FORMAT(`Date_de_naissance`, "%d/%m/%Y"),
 `N°_de_telephone`, `Adresse`, `Adresse_email` FROM `utilisateur` WHERE `Adresse` = :adresse');
    $reqProfil->execute(array(
        'adresse' => $_POST['adresse_recherche']));
}
else {
    $reqProfil = $bdd->query('SELECT `IDUtilisateur`, `Mot_de_passe`, `Nom`, `Prenom`, DATE_FORMAT(`Date_de_naissance`, "%d/%m/%Y"),
 `N°_de_telephone`, `Adresse`, `Adresse_email` FROM `utilisateur`');
}
?>

<div id="tableau">
    <table>
        <cpation> </cpation>
        <tr>
            <th>Nom Prénom</th>
            <th>Date de naissance</th>
            <th>Adresse email</th>
            <th>Téléphone</th>
            <th>Adresse postale</th>
        </tr>

        <?php

        while($donneesProfil = $reqProfil ->fetch()) {

            ?>
            <tr>
                <td><?php echo $donneesProfil['Nom'],' ', $donneesProfil['Prenom'] ?></td>
                <td><?php echo $donneesProfil['DATE_FORMAT(`Date_de_naissance`, "%d/%m/%Y")'] ?></td>
                <td><?php echo $donneesProfil['Adresse_email']?></td>
                <td><?php echo $donneesProfil['N°_de_telephone']?></td>
                <td> <?php echo $donneesProfil['Adresse']?></td>

            </tr>

            <?php
        }

        $reqProfil->closeCursor();
        ?>

    </table>
</div>

</body>

<footer>
    <?php include "footer.php" ?>
</footer>

</html>
