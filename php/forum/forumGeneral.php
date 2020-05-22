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
        <?php include "../header.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/forum.css">
    </head>
    <body>
        <h1>
            Forum
        </h1>
        <div id="content">
            <div id="titleTop">
                <form action="creerPost.php" method="post">
                    <p>Discussion générale<button type="submit" name="saveButton">Créer un post</button></p>
                </form>
            </div>
            <div id="forumContent">
                <ol>
                    <?php
                        while ($forumDonnees = $forum -> fetch())
                    {
                    ?>
                    <li>
                        <a href="post.php" onclick="getPostInfo(<?php //echo $forumDonnees['N°_Question'];?>)"><?php echo $forumDonnees['Titre'];?></a>
                    </li>
                    <?php
                    }
                    ?>
                </ol>
            </div>
        </div>
    </body>
    <footer>
        <?php include "./php/footer.php" ?>
    </footer>
</html>

<script>
    function getPostInfo()
    {
        var title = "Titre test";
        var content;
        localStorage.setItem("titleKey", title);
    }
</script>