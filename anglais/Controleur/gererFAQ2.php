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
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Gérer la FAQ</title>
        <?php include "header.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../Vue/gererFAQ.css">
    </head>
    <?php
    if (isset($_SESSION['mailConnecte']) && $_SESSION['profilConnecte'] == "administrateur")
            { ?>
            <body>
        <h1>
            Manage the Q&A
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
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" name="question<?php echo $faqDonnees['N°_FAQ'] ?>"  type="text" size="100" value="<?php echo $faqDonnees['Questions']; ?>" required>
                <p></p>
            </div>
            <div id="answerContent">
                <p>Answer n°<?php echo $faqDonnees['N°_FAQ'] ?></p>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" name="reponse<?php echo $faqDonnees['N°_FAQ'] ?>" type="text" size="100" value="<?php echo $faqDonnees['Réponses']; ?>" required>
                <p></p>
            </div>
                <button class="saveButton"><a name="deleteButton" href="supprimerQuestionFAQ.php?id=<?php echo $faqDonnees['N°_FAQ'] ?>">Supprimer la question</a></button>
            <br />
            <p></p>
            <hr />
            <?php
            }
            $faq->closeCursor();
            ?>
        <p></p>
        <button type="submit" class="saveButton">Save Q&A</button>
        </form>
        <p></p>
        <hr />
        <form action="ajouterQuestionFAQ.php" method="post">
            <p></p>
            <div id="questionContent">
                <p>Question</p>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" name="question" type="text" size="100" required>
                <p></p>
            </div>
            <div id="answerContent">
                <p>Réponse</p>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" name="reponse" type="text" size="100" required>
                <p></p>
            </div>
            <button type="submit" class="saveButton">Ajouter une question</button>
        </form>
     </li>
    </ol>
        </div>
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
        <?php include "footer.php" ?>
    </footer>
</html>

