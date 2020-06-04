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
    <?php include "header1.php" ?>
    <link rel="stylesheet" href="../css/mesDonneesUtilisateur.css" />
    <title>Mes Données utilisateur</title>
</head>

<body>

<div id="conteneur1">
    <div id="menu">
        <a href="#" class="active">菜单</a>
        <a href="mesDonneesUtilisateurs1.php">我的成绩</a>
        <a href="utilisateur_graphes_resultats1.php">我的图表</a>
        <a href="utilisateur_rdv1.php">我的预约</a>
        <a href="contact.php1">联系我们</a>
    </div>

    <div id="main">
        <p> 您要显示哪个测试?</p>
        <div id="boutons">
            <div id="tout">
                <button class="button"> 所有测试 </button>
            </div>
            <div id="avant-test">
                <button class="button">测试前时间</button>
                <button class="button">测试前心率</button>
            </div>
            <div id="memorisation">
                <button class="button">听觉记忆</button>
                <button class="button">视觉记忆</button>
            </div>
            <div id="reflexe">
                <button class="button">视觉反应</button>
                <button class="button">听觉反应</button>
            </div>
            <div id="reproduction">
                <button class="button">声音再现</button>
            </div>
            <div id="apres-test">
                <button class="button">测试后时间</button>
                <button class="button">测试后心率</button>
            </div>
        </div>
        <button class="button_valider">提交</button>
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
        <h3 class="profil-titre">我的账户 : <?php  echo $donneesProfil['Prenom'], ' ', $donneesProfil['Nom']  ?> </h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p>生日e : <?php  echo $donneesProfil['DATE_FORMAT(`Date_de_naissance`, "%d/%m/%Y")']?></p>
                <p>电话 : <?php echo $donneesProfil['N°_de_telephone']?></p>
                <p>地址 : <?php echo $donneesProfil['Adresse']?></p>
                <p>电子邮件 : <?php echo $donneesProfil['Adresse_email']?></p>
                <p>下一次预约: <?php echo $donneesProfil['DATE_FORMAT(`date_rdv`, "Le %d/%m/%Y à %H:%i")']; ?></p>
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
            <th>总分</th>
            <th>测试前时间</th>
            <th>测试前心率</th>
            <th>听觉记忆</th>
            <th>视觉记忆</th>
            <th>听觉反射</th>
            <th>视觉反射</th>
            <th>声音再现</th>
            <th>测试后时间</th>
            <th>测试后心率</th>
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
    <?php include "footer1.php" ?>
</footer>

</html>