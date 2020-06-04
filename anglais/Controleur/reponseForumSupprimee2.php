<?php
    $dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
    chdir($dir2.DIRECTORY_SEPARATOR);
    //echo getcwd()."<br>";

try {
    $bdd = new PDO('mysql:host=localhost;dbname=appg9b;charset=utf8', 'id13853313_user', 'Passwordpassword0!');
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
    <body>
        <div id="content">
            <?php
            $req = $bdd->prepare('DELETE FROM reponsesforum WHERE ID_reponse = :idquestion');
            $req->execute(array(
                 ':idquestion' => $id = $_GET['id'],
                 ));
            ?>
            <h1>
                <p>The answer has been deleted successfully. <a href="forumAccueil.php">Click here to return to the forum.</a></p>
            </h1>
        </div>
    </body>
    <footer>
        <?php include "footer.php" ?>
    </footer>
</html>
