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
    <?php include "header1.php" ?>
    <link rel="stylesheet" href="../css/gestionnaire_rechercheUtilisateur.css" />
    <script src="https://kit.fontawesome.com/8bfc90242a.js" crossorigin="anonymous"></script>
    <title>Recherche des administrateurs</title>
</head>

<div id="conteneur1">
    <div id="menu">
        <a href="#" class="active">菜单</a>
        <a href="gestionnaire1.php">开始一项测试</a>
        <a href="gestionnaire_ajout_resultats_tests1.php">新的测试结果</a>
        <a href="gestionnaire_rechercheUtilisateur1.php">显示用户</a>
        <a href="gestionnaire_rechercheTests1.php">显示测试</a>
    </div>

    <div id="main">
        <div id="boutons">
            <button class="button_bar"> 由用户执行测试搜索</button>
        </div>
        <div id="recherche">
            <div class="searchbar">
                <h2>查找用户测试</h2>
                <form action="gestionnaire_rechercheTests1.php"  method="post">
                    <label for="nom">Adresse mail : <input type="search" name="mail_recherche" size="50" required/></label>
                    <input type="submit" value="Rechercher" class="fas fa-search">
                </form>
            </div>
        </div>
    </div>

    <div id="profil">
        <h3 class="profil-titre">MON PROFIL AUTO-ECOLE</h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p>驾校名 : <?php echo $donneesProfil['Nom_auto_ecole']?></p>
                <p>地址 : <?php echo $donneesProfil['adresse_auto_ecole']?></p>
                <p>电子邮件 : <?php echo $donneesProfil['mail_auto_ecole']?></p>
            </div>
            <!--<img class="profil-photo" src="/images/profil_400x400.png"></img>   -->
        </div>
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
    $reqTests = $bdd->prepare('SELECT `mail_utilisateur`, `mail_gestionnaire`, DATE_FORMAT(`Date`, "%d/%m/%Y"), 
`Score_total`, `Res_freq_card_avant_test`, `Res_freq_card_apres_test`, `Res_temp_avant_test`, `Res_temp_apres_test`,
 `Res_rythme_visuel`, `Res_stimulus_visuel`, `Res_rythme_sonore`, `Res_stimulus_sonore`, `Res_reprod_sonore` 
 FROM `test`  WHERE `mail_utilisateur`= :mail ORDER BY `Date` DESC ');
    $reqTests->execute(array(
        'mail' => $_POST['mail_recherche']));
}

else if(isset($_POST['nom']) && isset($_POST['prenom'])) {

}
else {
    $reqTests = $bdd->query('SELECT `mail_utilisateur`, `mail_gestionnaire`, DATE_FORMAT(`Date`, "%d/%m/%Y"), 
`Score_total`, `Res_freq_card_avant_test`, `Res_freq_card_apres_test`, `Res_temp_avant_test`, `Res_temp_apres_test`,
 `Res_rythme_visuel`, `Res_stimulus_visuel`, `Res_rythme_sonore`, `Res_stimulus_sonore`, `Res_reprod_sonore` 
 FROM `test`  ORDER BY `Date` DESC ');
}
?>

<div id="tableau">
    <table>
        <cpation> </cpation>
        <tr>
            <th>日期</th>
            <th>用户</th>
            <th>电子邮件</th>
            <th>驾校</th>
            <th>总分</th>

        </tr>

        <?php

        while($donneesTests = $reqTests ->fetch()) {

            $reqProfil = $bdd->prepare('SELECT  `Nom`, `Prenom` FROM `utilisateur` WHERE `Adresse_email` = :mail');
            $reqProfil->execute(array(
                'mail' => $donneesTests['mail_utilisateur']));

            $donneesProfil = $reqProfil->fetch();

            $reqProfilGestionnaire = $bdd->prepare('SELECT  `Nom_auto_ecole` FROM `gestionnaire` WHERE `mail_auto_ecole` = :mail');
            $reqProfilGestionnaire->execute(array(
                'mail' => $donneesTests['mail_gestionnaire']));

            $donneesProfilGestionnaire = $reqProfilGestionnaire->fetch();
            ?>
            <tr>
                <td><?php echo $donneesTests['DATE_FORMAT(`Date`, "%d/%m/%Y")'] ?></td>
                <td><?php echo $donneesProfil['Nom'],' ', $donneesProfil['Prenom'] ?></td>
                <td><?php echo $donneesTests['mail_utilisateur'] ?></td>
                <td><?php echo $donneesProfilGestionnaire['Nom_auto_ecole'] ?></td>
                <td><?php echo $donneesTests['Score_total'] ?></td>

            </tr>

            <?php
            $reqProfil->closeCursor();
            $reqProfilGestionnaire->closeCursor();
        }

        $reqTests->closeCursor();
        ?>

    </table>
</div>

</body>

<footer>
    <?php include "footer1.php" ?>
</footer>

</html>