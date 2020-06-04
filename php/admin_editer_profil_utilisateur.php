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
    <?php include 'header.php'?>
</head>

<body>

<div id="conteneur1">

    <div id="menu">
        <a>Menu</a>
        <a href="pageAdministrateur.php">Gérer les utilisateurs</a>
        <a href="">Gérer les capteurs</a>
        <a href="gererFAQ.php">Gérer la FAQ</a>
        <a href="forumAdministrateur.php">Gérer le forum</a>
    </div>

    <div id="main">

    </div>

    <div id="profil">
        <h3 class="profil-titre">MON PROFIL ADMINISTRATEUR</h3>

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
    Editer un profil utilisateur
</h1>
<div id = content>
    <form action="profilEdite.php" method="post">
        <ol>
            <li>
                <p>Modifier le nom : <?php echo $donnees['Nom'] ?></p>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau nom" name="surnameButton" value=<?php echo $donnees['Nom'] ?>>
            </li>
            <br />
            <hr />
            <li>
                <p>Modifier le prénom : <?php echo $donnees['Prenom'] ?></p>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau prénom" name="nameButton" value=<?php echo $donnees['Prenom'] ?>>
            </li>
            <br />
            <hr />
            <li>
                <p>Modifier la date de naissance : <?php echo $donnees['Date_de_naissance'] ?></p>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouvelle date de naissance" name="birthDateButton" value=<?php echo $donnees['Date_de_naissance'] ?>>
            </li>
            <br />
            <hr />
            <li>
                <p>Modifier le numéro de téléphone : <?php echo $donnees['N°_de_telephone'] ?></p>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau numéro de téléphone" name="phoneButton" value=<?php echo $donnees['N°_de_telephone'] ?>>
            </li>
            <br />
            <hr />
            <li>
                <p>Modifier l'adresse : <?php echo $donnees['Adresse'] ?></p>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouvelle adresse" name="addressButton" value=<?php echo $donnees['Adresse'] ?>>
            </li>
            <br />
            <hr />
            <input style="margin-top:10px; box-shadow: 0 1px 0 gray;"type="submit" value="Sauvegarder le profil" class="saveButton">
        </ol>
    </form>
</div>

<h1>Supprimer le profil</h1>
<form action="admin_supprimer_profil.php" method="post">
    <input type="email" name="suppr" value="<?php echo $_POST['edit']?>">
    <input style="margin: 2% auto 5% auto" type="submit" value="Supprimer ce profil">
</form>

<footer>
    <?php include "footer.php";?>
</footer>

</body>
</html>
