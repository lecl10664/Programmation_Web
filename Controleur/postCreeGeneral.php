<?php
    $dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
    chdir($dir2.DIRECTORY_SEPARATOR);
    //echo getcwd()."<br>";

try {
    $bdd = new PDO('mysql:host=localhost;dbname=appg9b;port=3308;charset=utf8', 'root', '');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

session_start();

$reponse = $bdd->prepare('SELECT * FROM `utilisateur` WHERE `Adresse_email` = :mail');
$reponse->execute(array(
     'mail' => $_SESSION['mailConnecte']));

$donnees = $reponse->fetch();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Forum</title>
        <?php include "header.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../Vue/forum.css">
    </head>
    <?php
    if (isset($_SESSION['mailConnecte']) && ($_SESSION['profilConnecte'] == "administrateur" || $_SESSION['profilConnecte'] == "utilisateur"))
            { ?>
    <body>
        <?php
            $mysql_date_now = date("Y-m-d H:i:s");
            $req = $bdd->prepare("INSERT INTO `forum`(`Titre`, `Contenu`, `Date`, `Nom_Utilisateur`, `Theme`) VALUES (:Titre, :Contenu, :Date, :Nom_Utilisateur, :Theme)");
                   $req->execute(array(
                        ':Titre' => $_POST['title'],
                        ':Contenu' => $_POST['content'],
                        ':Date' => $mysql_date_now,
                        ':Nom_Utilisateur' => $donnees['Prenom'].' '.$donnees['Nom'],
                        ':Theme' => 'general',
                        ));
        ?>
        <div id="content">
            <h1>
                <p>Le post a bien été créé.<a href="forumAccueil.php">Cliquez ici pour revenir au forum.</a></p>
            </h1>
        </div>
    </body>
        <?php
         }
    else{
        ?>
    <body>
         <h1>Vous n'avez pas la permission d'accéder à cette page</h1>
    </body>
    
    <?php
    }
    ?>
    <footer>
        <?php include "footer.php" ?>
    </footer>
</html>
