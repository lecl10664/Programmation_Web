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
        <?php include "./php/header.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/css/forum.css">
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
                <p>La réponse a bien été supprimée.<a href="forumAccueil.php">Cliquez ici pour revenir au forum.</a></p>
            </h1>
        </div>
    </body>
    <footer>
        <?php include "./php/footer.php" ?>
    </footer>
</html>
