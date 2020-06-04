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

session_start();

$reponse = $bdd->prepare('SELECT * FROM `utilisateur` WHERE `Adresse_email` = :mail');
$reponse->execute(array(
     'mail' => $_SESSION['mailConnecte']));

$donnees = $reponse->fetch();
$date = date('Y-m-d H:i:s');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Forum</title>
        <?php include "header1.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../Vue/forum.css">
    </head>
    <?php
    if (isset($_SESSION['mailConnecte']) && ($_SESSION['profilConnecte'] == "administrateur" || $_SESSION['profilConnecte'] == "utilisateur"))
            { ?>
    <body>
        <?php
        if ($_SESSION['profilConnecte'] == "utilisateur"){
            $req = $bdd->prepare("INSERT INTO `reponsesforum`(`ID_post`, `contenu`, `utilisateur`, `date`) VALUES (:ID_post, :contenu, :utilisateur, :date)");
                   $req->execute(array(
                        ':ID_post' => $_POST['ID_post'],
                        ':contenu' => $_POST['content'],
                        ':utilisateur' => $donnees['Prenom'].' '.$donnees['Nom'],
                        ':date' => $date,
                        ));
        }
        else{
            $req = $bdd->prepare("INSERT INTO `reponsesforum`(`ID_post`, `contenu`, `utilisateur`, `date`) VALUES (:ID_post, :contenu, :utilisateur, :date)");
                   $req->execute(array(
                        ':ID_post' => $_POST['ID_post'],
                        ':contenu' => $_POST['content'],
                        ':utilisateur' => 'Administrateur',
                        ':date' => $date,
                        ));
        }
        ?>
        <h1>您的回答已保存. <a href="forumAccueil.php">点击此处返回论坛.</a></h1>
    </body>
    <?php
         }
    else{
        ?>
    <body>
         <h1>您没有权限访问此页面</h1>
    </body>
    
    <?php
    }
            ?>
    <footer>
        <?php include "footer1.php" ?>
    </footer>
</html>
