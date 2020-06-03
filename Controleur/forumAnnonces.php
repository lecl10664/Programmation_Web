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
    $forum = $bdd->prepare('SELECT * FROM forum WHERE `Theme` = 1');
    $forum->execute(array(
        ':Theme' => 1));
?>
<!DOCTYPE html>
<html>
    <header>
        <?php include "header.php" ?>
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
                <?php
                     if (isset($_SESSION['mailConnecte']) && ($_SESSION['profilConnecte'] == "administrateur"))
                { ?>
                <form action="creerPostAnnonces.php" method="post">
                    <p>Annonces importantes<button type="submit" name="saveButton">Créer un post</button></p>
                </form>
                <?php
                }
                else{
                ?>
                    <p>Discussion générale</p>
                <?php
                    }
                ?>
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
                            <?php
                                if (isset($_SESSION['mailConnecte']) && $_SESSION['profilConnecte'] == "administrateur")
                            { ?>
                            <button type="submit" name="deleteButton">Supprimer le post</button>
                            <?php
                                }
                            ?>
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
        <?php include "footer.php" ?>
    </footer>
</html>