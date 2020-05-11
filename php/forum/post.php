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
        <h1>
            Forum
        </h1>
        <div id="content">
            <div id="titleTop">
                <p>Titre</p>
            </div>
                <div id="forumContent">
                    <div id="postContent">
                        <br />
                        <p>Contenu</p>
                        <br />
                    </div>
                </div>
                <hr />
            <form action="postCree.php" method="post">
                <div id="answerContent">
                     <br />
                     <textarea type="text" name="content" cols="90" rows="5" style="resize: none" required></textarea>
                     <br />
                </div>
                <button type="submit" name="postButton">Répondre</button>
                <br />
            </form>
            <hr />
            <?php
                while ($forumDonnees = $forum->fetch())
                    {
            ?>
                    <div id="answerContent">
                        
                     </div>
            <?php
                }
                $forum->closeCursor();
            ?>
        </div>
    </body>
    <footer>
        <?php include "./php/footer.php" ?>
    </footer>
</html>
