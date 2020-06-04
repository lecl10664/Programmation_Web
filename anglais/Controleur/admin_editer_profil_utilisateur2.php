<?php
$dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
chdir($dir2.DIRECTORY_SEPARATOR);


//On se connecte à la BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=id13958611_appg9b;charset=utf8', 'id13958611_user', 'Passwordpassword0!');
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
    <link rel="stylesheet" href='../Vue/pageAdministrateur.css'>
    <link rel="stylesheet" href="../Vue/editer_profil.css">
    <?php include 'header2.php'?>
</head>

<body>

<div id="conteneur1">

    <div id="menu">
        <a>Menu</a>
        <a href="pageAdministrateur2.php">Manage users</a>
        <a href="">Manage captors</a>
        <a href="gererFAQ2.php">Manage the Q&A</a>
        <a href="forumAdministrateur2.php">Manage the forum</a>
    </div>

    <div id="main">

    </div>

    <div id="profil">
        <h3 class="profil-titre">MY ADMINISTRATOR PROFILE</h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p>Admin n° <?php echo $donneesProfil['ID_Administrateur'] ?></p>
                <p>Email :  <?php echo $donneesProfil['mail_administrateur'] ?></p>
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
    Edit a user profile
</h1>
<div id = content>
    <form action="profilEdite.php" method="post">
        <ol>
            <li>
                <p>Edit surname : <?php echo $donnees['Nom'] ?></p>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="New surname" name="surnameButton" value=<?php echo $donnees['Nom'] ?>>
            </li>
            <br />
            <hr />
            <li>
                <p>Edit name : <?php echo $donnees['Prenom'] ?></p>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="New name" name="nameButton" value=<?php echo $donnees['Prenom'] ?>>
            </li>
            <br />
            <hr />
            <li>
                <p>Edit birthdate : <?php echo $donnees['Date_de_naissance'] ?></p>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="New birthdate" name="birthDateButton" value=<?php echo $donnees['Date_de_naissance'] ?>>
            </li>
            <br />
            <hr />
            <li>
                <p>Edit phone number : <?php echo $donnees['N°_de_telephone'] ?></p>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="New number" name="phoneButton" value=<?php echo $donnees['N°_de_telephone'] ?>>
            </li>
            <br />
            <hr />
            <li>
                <p>Edit address : <?php echo $donnees['Adresse'] ?></p>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="New address" name="addressButton" value=<?php echo $donnees['Adresse'] ?>>
            </li>
            <br />
            <hr />
            <input style="margin-top:10px; box-shadow: 0 1px 0 gray;"type="submit" value="Save profile" class="saveButton">
        </ol>
    </form>
</div>

<h1>Delete profile</h1>
<form action="../Modele/admin_supprimer_profil.php" method="post">
    <input type="email" name="suppr" value="<?php echo $_POST['edit']?>">
    <input style="margin: 2% auto 5% auto; color: red" type="submit" value="Delete this profile">
</form>

<footer>
    <?php include "footer2.php";?>
</footer>

</body>
</html>
