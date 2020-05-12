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
    $reponsesForum = $bdd->query('SELECT * FROM reponsesforum');
    $i = 0;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Forum</title>
        <?php include "./php/header.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/css/post.css">
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
            <form action="reponseCreee.php" method="post">
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
                while ($reponsesForumDonnees = $reponsesForum->fetch())
                    {
                    $i += 1;
            ?>
                    <div id="answerContent">
                        <p>Réponse n°<?php echo $i; ?> de <?php echo $reponsesForumDonnees['utilisateur']; ?> le <?php echo $i; ?> à <?php echo $i; ?></p>
                        <br />
                        <?php
                        echo $reponsesForumDonnees['contenu'];
                        ?>
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
