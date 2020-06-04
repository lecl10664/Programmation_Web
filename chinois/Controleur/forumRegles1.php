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
    $forum = $bdd->prepare('SELECT * FROM forum WHERE `Theme` = 2');
    $forum->execute(array(
        ':Theme' => 2));

    $forumDonnees = $forum->fetch();
?>
<!DOCTYPE html>
<html>
    <header>
        <?php include "header1.php" ?>
    </header>
    <head>
        <title>Forum</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../Vue/forum.css">
    </head>
    <body>
        <h1>
            论坛
        </h1>
        <div id="content">
            <div id="titleTop">
                <p>论坛规则</p>
            </div>
            <div id="contentGeneral">
                <?php
                     if (isset($_SESSION['mailConnecte']) && ($_SESSION['profilConnecte'] == "administrateur"))
                { ?>
                <form action="reglesModifiees1.php" method="post">
                    <textarea type="text" name="content" cols="90" rows="5" style="resize: none" required><?php echo $forumDonnees['Contenu']; ?></textarea>
                    <button type="submit" name="saveButton">保存</button>
                </form>
                <?php
                }
                else{
                    echo $forumDonnees['Contenu'];
                    }
                ?>
            </div>
        </div>
    </body>
    <footer>
        <?php include "footer1.php" ?>
    </footer>
</html>