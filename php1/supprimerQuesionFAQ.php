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
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Gérer la FAQ</title>
        <?php include "header.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/faq.css">
    </head>
    <body>
        <?php
            $req = $bdd->prepare('UPDATE faq SET Questions = :nvquestion, Réponses = :nvreponse WHERE N°_FAQ = :nfaq');
            $req->execute(array(
                ':nvquestion' => $_POST['question2'],
                ':nvreponse' => $_POST['reponse2'],
                ':nfaq' => 2,
                ));
        ?>
        <h1>问题已被删除.</h1>
        <h1><a href="gererFAQ.php">继续修改FAQ</a></h1>
    </body>
    <footer>
        <?php include "footer.php" ?>
    </footer>
</html>

