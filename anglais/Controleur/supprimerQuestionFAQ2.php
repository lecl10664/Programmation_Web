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
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Manage the Q&A</title>
        <?php include "header.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../Vue/faq.css">
    </head>
<?php
    if (isset($_SESSION['mailConnecte']) && $_SESSION['profilConnecte'] == "administrateur")
            { ?>
    <body>
        <?php
            $req = $bdd->prepare('DELETE FROM faq WHERE N°_FAQ = :nfaq');
            $req->execute(array(
                ':nfaq' => $id = $_GET['id'],
                ));
        ?>
        <h1>The question was successfully deleted.</h1>
        <h1><a href="gererFAQ.php">Keep modifying the Q&A</a></h1>
    </body>
    <?php
    }
        else{
    ?>
    <body>
         <h1>You're not allowed to access this page</h1>
    </body>
    <?php
    }
    ?>
    <footer>
        <?php include "footer.php" ?>
    </footer>
</html>

