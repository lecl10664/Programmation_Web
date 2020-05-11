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
                        <p>Titre</p>
                        <input type="text" name="title" required/>
                    </div>
                    <div id="postContent">
                        <p>Contenu</p>
                        <input type="text" name="content" required/>
                    </div>
                    <button type="submit" class="saveButton">Poster</button>
                </div>
            </form>
        </div>
    </body>
    <footer>
        <?php include "./php/footer.php" ?>
    </footer>
</html>
