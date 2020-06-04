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
    <link rel="stylesheet" href="../Vue/gestionnaire_rechercheUtilisateur.css" />
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
        <h1> 查找一名用户</h1>
        <h2> 您想查找哪种类型 ?</h2>
        <div id="boutons">
            <button class="button_bar"> 通过用户邮箱搜索</button>
            <button class="button_critere"> 按条件执行搜索 </button>
        </div>
    </div>

    <div id="profil">
        <h3 class="profil-titre">我的驾校账户</h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p>驾校名 : <?php echo $donneesProfil['Nom_auto_ecole']?></p>
                <p>地址 : <?php echo $donneesProfil['adresse_auto_ecole']?></p>
                <p>邮箱 : <?php echo $donneesProfil['mail_auto_ecole']?></p>
            </div>
            <!--<img class="profil-photo" src="/images/profil_400x400.png"></img>   -->
        </div>
    </div>

</div>

<div id="recherche">
    <div class="searchbar">
        <h1>通过用户邮箱搜索</h1>
        <form action="gestionnaire_rechercheUtilisateur1.php"  method="post">
            <label for="nom">邮箱 : <input type="search" name="mail_recherche" size="50" required/></label>
            <input type="submit" value="Rechercher" class="fas fa-search">
        </form>
    </div>

    <div id="recherche_criteres">
        <h1>按条件执行搜索</h1>
        <form action="gestionnaire_rechercheUtilisateur1.php" method="post">
            <label for="dateNaissance">姓名 :</label><input type="search" name="nom_recherche"/>
            <label for="dateNaissance">生日 : </label><input type="date" name="date_recherche"/>
            <label for="ville">地址 : </label><input type="search" name="adresse_recherche"/>
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
            <th>姓名</th>
            <th>生日</th>
            <th>电子邮箱l</th>
            <th>电话</th>
            <th>地址</th>
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
    <?php include "footer1.php" ?>
</footer>

</html>