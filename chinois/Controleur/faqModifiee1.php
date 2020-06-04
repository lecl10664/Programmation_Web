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
$faq = $bdd->query('SELECT * FROM faq');
$i = 0;
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Gérer la FAQ</title>
        <?php include "header1.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../Vue/faq.css">
    </head>
    <body>
        <?php
            while ($faqDonnees = $faq->fetch())
                {
                $i += 1;
                $req = $bdd->prepare('UPDATE faq SET Questions = :nvquestion, Réponses = :nvreponse WHERE N°_FAQ = :nfaq');
                $req->execute(array(
                    ':nvquestion' => $_POST["question".$i],
                    ':nvreponse' => $_POST["reponse".$i],
                    ':nfaq' => $i,
                    ));
            }
            $faq->closeCursor();
        ?>
        <h1>FAQ 已修改</h1>
        <h1><a href="gererFAQ1.php">继续修改FAQ</a></h1>
    </body>
    <footer>
        <?php include "footer1.php" ?>
    </footer>
</html>