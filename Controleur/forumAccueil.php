<?php
    $dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
    chdir($dir2.DIRECTORY_SEPARATOR);
    //echo getcwd()."<br>";
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
                    <a href="forumAnnoncesImportantes.php">
                        <img name="forum" src="../images/annonces.png"/>
                    </a>
                    <a href="forumRegles.php">
                        <img name="forum" src="../images/regles.png"/>
                    </a>
            </div>
            <div id="titleMiddle">
                <p>Général</p>
            </div>
            <div id="forumContent">
                    <a href="forumGeneral.php">
                        <img name="forum" src="../images/discussionGenerale.png"/>
                    </a>
                    <a href="forumQuestion.php">
                        <img name="forum" src="../images/question.png"/>
                    </a>
            </div>
        </div>
    </body>
    <footer>
        <?php include "footer.php" ?>
    </footer>
</html>
