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
$date = date('Y-m-d H:i:s');
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
        if ($_SESSION['profilConnecte'] == "utilisateur"){
            $req = $bdd->prepare("INSERT INTO `reponsesforum`(`ID_post`, `contenu`, `utilisateur`, `date`) VALUES (:ID_post, :contenu, :utilisateur, :date)");
                   $req->execute(array(
                        ':ID_post' => $_POST['ID_post'],
                        ':contenu' => $_POST['content'],
                        ':utilisateur' => $donnees['Prenom'].' '.$donnees['Nom'],
                        ':date' => $date,
                        ));
        }
        else{
            $req = $bdd->prepare("INSERT INTO `reponsesforum`(`ID_post`, `contenu`, `utilisateur`, `date`) VALUES (:ID_post, :contenu, :utilisateur, :date)");
                   $req->execute(array(
                        ':ID_post' => $_POST['ID_post'],
                        ':contenu' => $_POST['content'],
                        ':utilisateur' => 'Administrateur',
                        ':date' => $date,
                        ));
        }
        ?>
        <h1>Votre réponse a bien été enregistrée. <a href="forumAccueil.php">Cliquez ici pour retourner sur le Forum.</a></h1>
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
