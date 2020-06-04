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
                <p>Create a post in "General"</p>
            </div>
            <form action="postCree.php" method="post">
                <div id="forumContent">
                    <div id="postContent">
                        <br />
                        <p>Title</p>
                        <br />
                        <input type="text" name="title" required/>
                        <br />
                    </div>
                    <div id="postContent">
                        <br />
                        <p>Content</p>
                        <br />
                        <textarea type="text" name="content" cols="90" rows="15" style="resize: none" required></textarea>
                        <br />
                    </div>
                    <button type="submit" name="postButton">Post</button>
                    <br />
                </div>
            </form>
        </div>
    </body>
    <footer>
        <?php include "footer2.php" ?>
    </footer>
</html>
