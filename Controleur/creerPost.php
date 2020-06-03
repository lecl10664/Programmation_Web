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
        <?php include "header.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../Vue/forum.css">
    </head>
    <?php
    if (isset($_SESSION['mailConnecte']) && ($_SESSION['profilConnecte'] == "administrateur" ||  $_SESSION['profilConnecte'] == "utilisateur"))
            { ?>
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
        <?php
         }
    else{
        ?>
    <body>
         <h1>Vous n'avez pas la permission d'accéder à cette page</h1>
    </body>
    
    <?php
    }
            ?>
    <footer>
        <?php include "footer.php" ?>
    </footer>
</html>
