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
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Gérer la FAQ</title>
        <?php include "header1.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/faq.css">
    </head>
    <body>
        <?php
            $req = $bdd->prepare("INSERT INTO `faq`(`Questions`, `Réponses`) VALUES (:Question, :Reponse)");
                   $req->execute(array(
                        ':Question' => $_POST['question'],
                        ':Reponse' => $_POST['reponse'],
                        ));
        ?>
        <h1>问题已提交</h1>
        <h1><a href="gererFAQ1.php">继续修改FAQ</a></h1>
    </body>
    <footer>
        <?php include "footer1.php" ?>
    </footer>
</html>

