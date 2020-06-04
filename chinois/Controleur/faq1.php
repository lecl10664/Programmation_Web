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
    $faq = $bdd->query('SELECT * FROM faq');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>FAQ</title>
        <?php include "header1.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../Vue/faq.css">
    </head>
    <body>
        <h1>
            FAQ
        </h1>
        <div id = content>
            <ol>
                <?php
                    while ($faqDonnees = $faq->fetch())
                    {
                ?>
                    <div id="questionContent">
                        <li>
                            <?php echo $faqDonnees['Questions']; ?>
                        </li>
                    </div>
                    <br />
                    <div id="answerContent">
                        <p>
                            <?php echo $faqDonnees['Réponses']; ?>
                        </p>
                    </div>
                    <br />
                    <br />
                    <hr />
                    <br />
                    <br />
                    <?php
                }
                $faq->closeCursor();
                ?>
            </ol>
        </div>
      <h2>
        您有疑问 ? <a href="contact1.php" target="_blank">联系我们</a>
      </h2>
    </body>
    <footer>
        <?php include "footer1.php" ?>
    </footer>
</html>
