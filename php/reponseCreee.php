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
        <?php include "./php/header.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/css/forum.css">
    </head>
    <body>
        <?php
            //$mysql_date_now = date("Y-m-d H:i:s");
            $req = $bdd->prepare("INSERT INTO `reponsesforum`(`ID_post`, `contenu`, `utilisateur`, `date`) VALUES (:ID_post, :contenu, :utilisateur, :date)");
                   $req->execute(array(
                        ':ID_post' => $_POST['ID_post'],
                        ':contenu' => $_POST['content'],
                        ':utilisateur' => $donnees['Prenom'].' '.$donnees['Nom'],
                        ':date' => $date,
                        ));
        ?>
        <h1>Votre réponse a bien été enregistrée. <a href="forumAccueil.php">Cliquez ici pour retourner sur le Forum.</a></h1>
    </body>
    <footer>
        <?php include "./php/footer.php" ?>
    </footer>
</html>
