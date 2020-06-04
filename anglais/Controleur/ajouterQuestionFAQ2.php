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
            $req = $bdd->prepare("INSERT INTO `faq`(`Questions`, `Réponses`) VALUES (:Question, :Reponse)");
                   $req->execute(array(
                        ':Question' => $_POST['question'],
                        ':Reponse' => $_POST['reponse'],
                        ));
        ?>
        <h1>The question was successfully added.</h1>
        <h1><a href="gererFAQ.php">Keep editing the Q&A</a></h1>
    </body>
    <?php
    }
        else{
    ?>
    <body>
         <h1>You do not have access to this page</h1>
    </body>
    <?php
    }
    ?>
    <footer>
        <?php include "footer2.php" ?>
    </footer>
</html>

