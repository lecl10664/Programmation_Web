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
    $forum = $bdd->query('SELECT * FROM forum');
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
        <div id="content">
            <?php
            $req = $bdd->prepare('DELETE FROM forum WHERE N°_Question = :nquestion');
            $req->execute(array(
                 ':nquestion' => $id = $_GET['id'],
                 ));
            ?>
            <h1>
                <p>Le post a bien été supprimé.<a href="forumAccueil.php">Cliquez ici pour revenir au forum.</a></p>
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
