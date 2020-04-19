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
        <title>FAQ</title>
        <?php include "./php/header.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/css/faq.css">
    <head>
    <body>
        <h1>
            FAQ
        </h1>
        <div id = content>
            <ol>
              <?php
    while ($questionsDonnees = $questions->fetch())
{
?>
    <li>
        <?php echo $questionsDonnees['Questions']; ?>
    </li>
    <p>
        <?php echo $questionsDonnees['Réponses']; ?>
     </p>
<?php
}
$questions->closeCursor();
?>
          </li>
          <p>
           </p>
      </ol>
        </div>
      <h2>
        Vous avez toujours une question ? <a href="/php/contact.php" target="_blank">Nous contacter</a> 
      </h2>
    </body>
    <footer>
        <?php include "./php/footer.php" ?>
    </footer>
</html>
