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
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Forum</title>
        <?php include "./php/header.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/css/forum.css">
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
                <p>已发布<a href="forumAccueil.php">点击此处回到论坛</a></p>
            </h1>
        </div>
    </body>
    <footer>
        <?php include "./php/footer.php" ?>
    </footer>
</html>
