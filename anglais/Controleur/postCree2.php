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
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
        <?php
            $mysql_date_now = date("Y-m-d H:i:s");
            $req = $bdd->prepare("INSERT INTO `forum`(`Titre`, `Contenu`, `Date`) VALUES (:Titre, :Contenu, :Date)");
                   $req->execute(array(
                        ':Titre' => $_POST['title'],
                        ':Contenu' => $_POST['content'],
                        ':Date' => $mysql_date_now,
                        ));
        ?>
        <div id="content">
            <h1>
                <p>The post has been successfully created. <a href="forumAccueil.php">here to return to the forum.</a></p>
            </h1>
        </div>
    </body>
    <footer>
        <?php include "footer2.php" ?>
    </footer>
</html>
