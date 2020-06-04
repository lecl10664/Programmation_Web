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
    <header>
        <?php include "header2.php" ?>
    </header>
    <head>
        <title>Forum</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../Vue/forum.css">
    </head>
    <body>
        <h1>
            Forum
        </h1>
        <div id="content">
            <div id="titleTop">
                <form action="creerPost.php" method="post">
                    <p>General discussion<button type="submit" name="saveButton">Créer un post</button></p>
                </form>
            </div>
            <div id="contentGeneral">
                <ol>
                    <?php
                        while ($forumDonnees = $forum -> fetch())
                    {
                    ?>
                    <li>
                        <a href="post.php?id=<?php echo $forumDonnees['N°_Question'] ?>"><?php echo $forumDonnees['Titre'];?></a>
                        <form action="postSupprime.php?id=<?php echo $forumDonnees['N°_Question'] ?>" method="post">
                            <br />
                            <button type="submit" name="deleteButton">Delete post</button>
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
        <?php include "footer2.php" ?>
    </footer>
</html>