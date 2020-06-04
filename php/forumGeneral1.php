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
    <header>
        <?php include "header1.php" ?>
    </header>
    <head>
        <title>Forum</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/forum.css">
    </head>
    <body>
        <h1>
            论坛
        </h1>
        <div id="content">
            <div id="titleTop">
                <form action="creerPost1.php" method="post">
                    <p>常规聊天<button type="submit" name="saveButton">发布一条消息</button></p>
                </form>
            </div>
            <div id="forumContent">
                <ol>
                    <?php
                        while ($forumDonnees = $forum -> fetch())
                    {
                    ?>
                    <li>
                        <a href="post.php?id=<?php echo $forumDonnees['N°_Question'] ?>"><?php echo $forumDonnees['Titre'];?></a>
                        <form action="postSupprime1.php?id=<?php echo $forumDonnees['N°_Question'] ?>" method="post">
                            <br />
                            <button type="submit" name="deleteButton">删除一条消息</button>
                        </form>
                    </li>
                    <?php
                    }
                    ?>
                </ol>
            </div>
        </div>
    </body>
    <footer>
        <?php include "footer1.php" ?>
    </footer>
</html>