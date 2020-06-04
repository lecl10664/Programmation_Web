<?php
    $dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
    chdir($dir2.DIRECTORY_SEPARATOR);
    //echo getcwd()."<br>";

try {
    $bdd = new PDO('mysql:host=localhost;dbname=id13958611_appg9b;charset=utf8', 'id13958611_user', 'Passwordpassword0!');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$forum = $bdd->prepare('SELECT * FROM forum WHERE Theme = :Theme');
$forum->execute(array(
     ':Theme' => 2));
$forumDonnees = $forum->fetch();
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
    if (isset($_SESSION['mailConnecte']) && ($_SESSION['profilConnecte'] == "administrateur"))
            { ?>
    <body>
        <?php
            if ($forumDonnees){
                $req = $bdd->prepare('UPDATE forum SET Contenu = :Contenu WHERE Theme = 2');
                       $req->execute(array(
                            ':Contenu' => $_POST['content'],
                            ));
            }
            else{
                $mysql_date_now = date("Y-m-d H:i:s");
                $req = $bdd->prepare("INSERT INTO `forum`(`Titre`, `Contenu`, `Date`, `Nom_Utilisateur`, `Theme`) VALUES (:Titre, :Contenu, :Date, :Nom_Utilisateur, :Theme)");
                       $req->execute(array(
                            ':Titre' => 'Regles',
                            ':Contenu' => $_POST['content'],
                            ':Date' => $mysql_date_now,
                            ':Nom_Utilisateur' => 'Administrateur',
                            ':Theme' => 2,
                            ));
            }
        ?>
        <div id="content">
            <h1>
                <p>Les régles ont bien été modifiées.<a href="forumAccueil.php">Cliquez ici pour revenir au forum.</a></p>
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
