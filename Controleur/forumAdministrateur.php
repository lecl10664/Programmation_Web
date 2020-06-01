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
    <body>
        <h1>
            Forum
        </h1>
        <div id="content">
            <div id="titleTop">
                <p>Officiel</p>
            </div>
            <div id="forumContent">
                <ol>
                    <li>
                        lien 1
                    </li>
                </ol>
            </div>
            <div id="titleMiddle">
                <p>Discussion générale</p>
            </div>
            <div id="forumContent">
                <ol>
                    <li>
                        lien 1
                    </li>
                </ol>
            </div>
        </div>
    </body>
    <footer>
        <?php include "footer.php" ?>
    </footer>
</html>
