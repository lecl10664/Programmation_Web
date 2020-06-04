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
        <?php include "header1.php" ?>
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
                <p> 发布一条"常规消息"</p>
            </div>
            <form action="postCreeGeneral.php" method="post">
                <div id="forumContent">
                    <div id="postContent">
                        <br />
                        <p>标题</p>
                        <br />
                        <input type="text" name="title" required/>
                        <br />
                    </div>
                    <div id="postContent">
                        <br />
                        <p>内容</p>
                        <br />
                        <textarea type="text" name="content" cols="90" rows="15" style="resize: none" required></textarea>
                        <br />
                    </div>
                    <button type="submit" name="postButton">发布</button>
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
         <h1>您没有访问权限</h1>
    </body>
    
    <?php
    }
            ?>
    <footer>
        <?php include "footer1.php" ?>
    </footer>
</html>
