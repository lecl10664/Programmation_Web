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
        <link rel="stylesheet" href="../css/forum.css">
    </head>
    <body>
        <h1>
            论坛
        </h1>
        <div id="content">
            <div id="titleTop">
                <p>官方信息</p>
            </div>
            <div id="forumContent">
                <ol>
                    <li>
                        重要信息
                    </li>
                    <li>
                        论坛规则
                    </li>
                </ol>
            </div>
            <div id="titleMiddle">
                <p>聊天室</p>
            </div>
            <div id="forumContent">
                <ol>
                    <li>
                        <a href="forumGeneral.php">常规</a>
                    </li>
                    <li>
                        提问
                    </li>
                </ol>
            </div>
        </div>
    </body>
    <footer>
        <?php include "footer.php" ?>
    </footer>
</html>