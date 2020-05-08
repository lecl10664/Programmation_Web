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
    <?php include "./php/header.php" ?>
    <link rel="stylesheet" href="../css/gestionnaire_rechercheUtilisateur.css" />
    <script src="https://kit.fontawesome.com/8bfc90242a.js" crossorigin="anonymous"></script>
    <title>Recherche des administrateurs</title>
</head>

<div id="conteneur1">
    <div id="menu">
        <a href="#" class="active">Menu</a>
        <a href="gestionnaire.php">Lancer un test</a>
        <a href="../php/ajout_resultats_tests.php">Nouveau résultat</a>
        <a href="gestionnaire_rechercheUtilisateur.php">Utilisateurs</a>
        <a href="">Forum</a>
    </div>

    <div id="main">
        <h1> Rechercher un utilisateur</h1>
        <h2> Quel type de recherche voulez-vous effectuer ?</h2>
        <div id="boutons">
            <button class="button_bar"> Effectuer une recherche par nom </button>
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
        <h1>Rechercher un utilisateur par nom</h1>
        <form action=""  method="post">
            <input type="search" name="utilisateur" size="30" placeholder=""/>
            <input class="button" type="button" value="ok" />
        </form>
    </div>

    <div id="recherche_criteres">
        <h1>Rechercher un utilisateur par critères</h1>
        <label for="age">Age :</label> <input type="text" name="age" id="age" />
        <label for="ville">Ville :</label> <input type="text" name="ville" id="ville" />
        <label for="agence">Agence :</label> <input type="text" name="agence" id="agence" />
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
</script>

<?php

// affichage du tableau de tous les tests
// récuperation des tests de l'utilisateur connecté dans la bdd

$reqTests = $bdd->query('SELECT `mail_utilisateur`, `mail_gestionnaire`, DATE_FORMAT(`Date`, "%d/%m/%Y"), 
`Score_total`, `Res_freq_card_avant_test`, `Res_freq_card_apres_test`, `Res_temp_avant_test`, `Res_temp_apres_test`,
 `Res_rythme_visuel`, `Res_stimulus_visuel`, `Res_rythme_sonore`, `Res_stimulus_sonore`, `Res_reprod_sonore` 
 FROM `test`  ORDER BY `Date` ASC');

?>

<div id="tableau">
    <table>
        <cpation> </cpation>
        <tr>
            <th>Utilisateur</th>
            <th>Auto-école</th>
            <th>Score totale</th>
            <th>Date</th>
        </tr>

        <?php

        while($donneesTests = $reqTests ->fetch()) {

            ?>
            <tr>
                <td><?php echo $donneesTests['mail_utilisateur'] ?></td>
                <td><?php echo $donneesTests['mail_gestionnaire'] ?></td>
                <td><?php echo $donneesTests['Score_total'] ?></td>
                <td><?php echo $donneesTests['DATE_FORMAT(`Date`, "%d/%m/%Y")'] ?></td>
            </tr>

        <?php }

        $reqTests->closeCursor();
        ?>

    </table>
</div>

</body>

<footer>
    <?php include "./php/footer.php" ?>
</footer>

</html>
