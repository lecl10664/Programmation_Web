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
    $forum = $bdd->query('SELECT * FROM forum');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Forum</title>
        <?php include "header2.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../Vue/forum.css">
    </head>
    <body>
        <h1>
            Forum
        </h1>
        <div id="content">
            <div id="titleTop">
                <p>Official</p>
            </div>
            <div id="forumContent">
                <ol>
                    <li>
                        link 1
                    </li>
                </ol>
            </div>
            <div id="titleMiddle">
                <p>General discussion</p>
            </div>
            <div id="forumContent">
                <ol>
                    <li>
                        link 1
                    </li>
                </ol>
            </div>
        </div>
    </body>
    <footer>
        <?php include "footer2.php" ?>
    </footer>
</html>
