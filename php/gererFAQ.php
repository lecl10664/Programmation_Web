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
    //$req = $bdd->prepare('INSERT INTO faq (N°_FAQ, Contenu) VALUES(:N°_FAQ, :Contenu)');
    $questions = $bdd->query('SELECT * FROM faq');
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
        <h1>
            FAQ
        </h1>
        <div id = content>
        <?php
    while ($questionsDonnees = $questions->fetch())
{
?>
    <ol>
    <li>
        <form method="post">

        </form>
        <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" size="100" value="<?php echo $questionsDonnees['Questions']; ?>">
        <input type="button" value = "Ajouter ou modifier une question">
        <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" size="100" value="<?php echo $questionsDonnees['Réponses']; ?>">
        <input type="button" value = "Ajouter ou modifier une réponse">
     </li>
    </ol>
<?php
}
$questions->closeCursor();
?>
        </div>
    </body>
    <footer>
        <?php include "./php/footer.php" ?>
    </footer>
</html>

<?php

    

?>

