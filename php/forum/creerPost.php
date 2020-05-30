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
                <p>Créer un post dans "Général"</p>
            </div>
            <form action="postCree.php" method="post">
                <div id="forumContent">
                    <div id="postContent">
                        <br />
                        <p>Titre</p>
                        <br />
                        <input type="text" name="title" required/>
                        <br />
                    </div>
                    <div id="postContent">
                        <br />
                        <p>Contenu</p>
                        <br />
                        <textarea type="text" name="content" cols="90" rows="15" style="resize: none" required></textarea>
                        <br />
                    </div>
                    <button type="submit" name="postButton">Poster</button>
                    <br />
                </div>
            </form>
        </div>
    </body>
    <footer>
        <?php include "./php/footer.php" ?>
    </footer>
</html>