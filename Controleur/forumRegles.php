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
                <p>Règles du forum</p>
            </div>
            <div id="contentRegles">
                <?php
                     if (isset($_SESSION['mailConnecte']) && ($_SESSION['profilConnecte'] == "administrateur"))
                { ?>
                <form action="reglesModifiees.php" method="post">
                    <textarea type="text" name="content" cols="90" rows="5" style="resize: none" required><?php echo $forumDonnees['Contenu']; ?></textarea>
                    <button type="submit" name="saveButton">Sauvegarder les règles</button>
                </form>
                <?php
                }
                else{
                ?>
                    <p name="regles"><?php echo $forumDonnees['Contenu']; ?></p>
                <?php
                    }
                ?>
            </div>
        </div>
    </body>
    <footer>
        <?php include "footer.php" ?>
    </footer>
</html>