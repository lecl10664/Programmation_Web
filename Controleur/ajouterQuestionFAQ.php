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
        <h1>La question a bien été ajoutée.</h1>
        <h1><a href="gererFAQ.php">Continuer à modifier la FAQ</a></h1>
    </body>
    <?php
    }
        else{
    ?>
    <body>
         <h1>Vous n'avez pas la permission d'accéder à cette page</h1>
    </body>
    <?php
    }
    ?>
    <footer>
        <?php include "footer.php" ?>
    </footer>
</html>

