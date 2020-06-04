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
    $forum = $bdd->prepare('SELECT * FROM forum WHERE `Theme` = 3');
    $forum->execute(array(
        ':Theme' => 3));
?>
<!DOCTYPE html>
<html>
    <header>
        <?php include "header1.php" ?>
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
                     if (isset($_SESSION['mailConnecte']) && ($_SESSION['profilConnecte'] == "administrateur" || $_SESSION['profilConnecte'] == "utilisateur"))
                { ?>
                <form action="creerPostQuestion1.php" method="post">
                    <p>提问<button type="submit" name="saveButton">提交</button></p>
                </form>
                <?php
                }
                else{
                ?>
                    <p>常规讨论</p>
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
                        <p><a href="post1.php?id=<?php echo $forumDonnees['N°_Question'] ?>"><?php echo $forumDonnees['Titre'];?></a> par <?php echo $forumDonnees['Nom_Utilisateur'] ?> le <?php echo $forumDonnees['Date'] ?></p>
                        <form action="postSupprime1.php?id=<?php echo $forumDonnees['N°_Question'] ?>" method="post">
                            <br />
                            <?php
                                if (isset($_SESSION['mailConnecte']) && $_SESSION['profilConnecte'] == "administrateur")
                            { ?>
                            <button type="submit" name="deleteButton">删除</button>
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
        <?php include "footer1.php" ?>
    </footer>
</html>