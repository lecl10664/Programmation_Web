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
    $questions = $bdd->query('SELECT * FROM faq');
    
    if (isset($_POST['question'])) {
         $question = $_POST['question']; 
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
            $req->execute(array(
                ':nvquestion' => $_POST['question2'],
                ':nvreponse' => $_POST['reponse2'],
                ':nfaq' => 2,
                ));
            $req->execute(array(
                ':nvquestion' => $_POST['question3'],
                ':nvreponse' => $_POST['reponse3'],
                ':nfaq' => 3,
                ));
            $req->execute(array(
                ':nvquestion' => $_POST['question4'],
                ':nvreponse' => $_POST['reponse4'],
                ':nfaq' => 4,
                ));
            $req->execute(array(
                ':nvquestion' => $_POST['question5'],
                ':nvreponse' => $_POST['reponse5'],
                ':nfaq' => 5,
                ));
            $req->execute(array(
                ':nvquestion' => $_POST['question6'],
                ':nvreponse' => $_POST['reponse6'],
                ':nfaq' => 6,
                ));
        ?>
        <h1>La FAQ a bien été modifiée.</h1>
    </body>
    <footer>
        <?php include "./php/footer.php" ?>
    </footer>
</html>

