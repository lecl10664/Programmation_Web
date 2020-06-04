<?php
$dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
chdir($dir2.DIRECTORY_SEPARATOR);
/*
echo __DIR__."<br>";
echo __FILE__."<br>";
echo $_SERVER['SCRIPT_FILENAME']."<br>";
echo $_SERVER['SCRIPT_NAME']."<br>";
echo $dir2.DIRECTORY_SEPARATOR."<br>";
echo getcwd()."<br>";
*/


//On se connecte à la BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=appg9b;port=3308;charset=utf8', 'root', '');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

session_start();


// récupération des infos de l'admin connecté

$reqProfil = $bdd->prepare('SELECT * FROM `administrateur` WHERE `mail_administrateur` = :mail');
$reqProfil->execute(array(
    'mail' => $_SESSION['mailConnecte']));

$donneesProfil = $reqProfil->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PageAdministrateur</title>
    <link rel="stylesheet" href='../css/pageAdministrateur.css'>
    <link rel="stylesheet" href="../css/editer_profil.css">
    <?php include 'header1.php'?>
</head>

<body>

<div id="conteneur1">

    <div id="menu">
        <a>菜单</a>
        <a href="pageAdministrateur1.php">管理用户</a>
        <a href="">管理传感器</a>
        <a href="gererFAQ1.php">管理FAQ</a>
        <a href="forumAdministrateur1.php">管理论坛</a>
    </div>

    <div id="main">

    </div>

    <div id="profil">
        <h3 class="profil-titre">我的管理员账户</h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p>Admin n° <?php echo $donneesProfil['ID_Administrateur'] ?></p>
                <p>Mail :  <?php echo $donneesProfil['mail_administrateur'] ?></p>
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
            <img class="profil-photo" src="../images/logo_admin.png" width="150" height="150" title="profil_admin"/>
        </div>
    </div>
</div>

<?php
$reponse = $bdd->prepare('SELECT * FROM `utilisateur` WHERE `Adresse_email` = :mail');
$reponse->execute(array(
    'mail' => $_POST['edit']));

$donnees = $reponse->fetch();
?>


<h1>
    修改用户信息
</h1>
<div id = content>
    <form action="profilEdite1.php" method="post">
        <ol>
            <li>
                <p>修改名字 : <?php echo $donnees['Nom'] ?></p>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau nom" name="surnameButton" value=<?php echo $donnees['Nom'] ?>>
            </li>
            <br />
            <hr />
            <li>
                <p>修改姓名 : <?php echo $donnees['Prenom'] ?></p>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau prénom" name="nameButton" value=<?php echo $donnees['Prenom'] ?>>
            </li>
            <br />
            <hr />
            <li>
                <p>修改生日 : <?php echo $donnees['Date_de_naissance'] ?></p>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouvelle date de naissance" name="birthDateButton" value=<?php echo $donnees['Date_de_naissance'] ?>>
            </li>
            <br />
            <hr />
            <li>
                <p>修改电话号码 : <?php echo $donnees['N°_de_telephone'] ?></p>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau numéro de téléphone" name="phoneButton" value=<?php echo $donnees['N°_de_telephone'] ?>>
            </li>
            <br />
            <hr />
            <li>
                <p>修改地址 : <?php echo $donnees['Adresse'] ?></p>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouvelle adresse" name="addressButton" value=<?php echo $donnees['Adresse'] ?>>
            </li>
            <br />
            <hr />
            <input style="margin-top:10px; box-shadow: 0 1px 0 gray;"type="submit" value="保存" class="saveButton">
        </ol>
    </form>
</div>

<h1>删除用户</h1>
<form action="admin_supprimer_profil.php" method="post">
    <input type="email" name="suppr" value="<?php echo $_POST['edit']?>">
    <input style="margin: 2% auto 5% auto" type="submit" value="删除用户">
</form>

<footer>
    <?php include "footer1.php";?>
</footer>

</body>
</html>