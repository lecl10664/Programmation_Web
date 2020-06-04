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
        <?php include "./php/header1.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/css/forum.css">
    </head>
    <body>
        <div id="content">
            <?php
            $req = $bdd->prepare('DELETE FROM forum WHERE N°_Question = :nquestion');
            $req->execute(array(
                 ':nquestion' => $id = $_GET['id'],
                 ));
            ?>
            <h1>
                <p>已删除.<a href="forumAccueil1.php">点击此处返回论坛</a></p>
            </h1>
        </div>
    </body>
    <footer>
        <?php include "./php/footer1.php" ?>
    </footer>
</html>
