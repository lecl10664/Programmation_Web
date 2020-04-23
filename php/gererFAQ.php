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
    $faq = $bdd->query('SELECT * FROM faq');
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Gérer la FAQ</title>
        <?php include "./php/header.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/css/gererFAQ.css">
    </head>
    <body>
        <h1>
            Gérer la FAQ
        </h1>
        <div id = content>
    <ol>
    <li>
        <form action="faqModifiee.php" method="post">
         <?php
            while ($faqDonnees = $faq->fetch())
                {
            ?>
            <div id="questionContent">
                <p>Question n°<?php echo $faqDonnees['N°_FAQ'] ?></p>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" name="question[]"  type="text" size="100" value="<?php echo $faqDonnees['Questions']; ?>" required>
                <p></p>
            </div>
            <div id="answerContent">
                <p>Réponse n°<?php echo $faqDonnees['N°_FAQ'] ?></p>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" name="reponse[]" type="text" size="100" value="<?php echo $faqDonnees['Réponses']; ?>" required>
                <p></p>
            </div>
            <button type="submit" class="saveButton">Supprimer la question</button>
            <br />
            <p></p>
            <hr />
            <?php
            }
            $faq->closeCursor();
            ?>
        <p></p>
        <button type="submit" class="saveButton">Enregister la FAQ</button>
        <p></p>
        <button type="submit" class="saveButton">Ajouter une question</button>
        </form>
     </li>
    </ol>
    

        </div>
    </body>
    <footer>
        <?php include "./php/footer.php" ?>
    </footer>
</html>

