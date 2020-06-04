<?php
    $dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
    chdir($dir2.DIRECTORY_SEPARATOR);
    //echo getcwd()."<br>";
try {
    $bdd = new PDO('mysql:host=localhost;dbname=appg9b;charset=utf8', 'id13853313_user', 'Passwordpassword0!');
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
        <title>Manage Q&A</title>
        <?php include "header2.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../Vue/faq.css">
    </head>
<?php
    if (isset($_SESSION['mailConnecte']) && $_SESSION['profilConnecte'] == "administrateur")
            { ?>
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
        <h1>Q&A successfully modified.</h1>
        <h1><a href="gererFAQ.php">Keep editing the Q&A</a></h1>
    </body>
    <?php
    }
        else{
    ?>
    <body>
         <h1>You don't have access to this page</h1>
    </body>
    <?php
    }
    ?>
    <footer>
        <?php include "footer2.php" ?>
    </footer>
</html>