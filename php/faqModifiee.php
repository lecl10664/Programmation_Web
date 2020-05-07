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
        <?php include "./php/header.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/css/faq.css">
    </head>
    <body>
        <?php
            $req = $bdd->prepare('UPDATE faq SET Questions = :nvquestion, Réponses = :nvreponse WHERE N°_FAQ = :nfaq');
            $req->execute(array(
                ':nvquestion' => $_POST['question1'],
                ':nvreponse' => $_POST['reponse1'],
                ':nfaq' => 1,
                ));
        ?>
        <h1>La FAQ a bien été modifiée.</h1>
    </body>
    <footer>
        <?php include "./php/footer.php" ?>
    </footer>
</html>

