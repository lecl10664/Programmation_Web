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
        <?php include "header1.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/gererFAQ.css">
    </head>
    <body>
         <?php
            if (isset($_SESSION['mailConnecte']) && $_SESSION['profilConnecte'] == "utilisateur")
            { ?>
            <h1>您没有权限访问此页面</h1>
        <?php
            }
            ?>
        <h1>
            管理FAQ
        </h1>
        <div id = content>
    <ol>
    <li>
        <form action="faqModifiee1.php" method="post">
         <?php
            while ($faqDonnees = $faq->fetch())
                {
            ?>
            <div id="questionContent">
                <p>问题 n°<?php echo $faqDonnees['N°_FAQ'] ?></p>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" name="question<?php echo $faqDonnees['N°_FAQ'] ?>"  type="text" size="100" value="<?php echo $faqDonnees['Questions']; ?>" required>
                <p></p>
            </div>
            <div id="answerContent">
                <p>回答 n°<?php echo $faqDonnees['N°_FAQ'] ?></p>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" name="reponse<?php echo $faqDonnees['N°_FAQ'] ?>" type="text" size="100" value="<?php echo $faqDonnees['Réponses']; ?>" required>
                <p></p>
            </div>
            
                <button type="submit" class="saveButton">删除问题</button>
            
            <br />
            <p></p>
            <hr />
            <?php
            }
            $faq->closeCursor();
            ?>
        <p></p>
        <button type="submit" class="saveButton">保存FAQ</button>
        </form>
        <p></p>
        <hr />
        <form action="ajouterQuestionFAQ1.php" method="post">
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
            <button type="submit" class="saveButton">加入问题</button>
        </form>
     </li>
    </ol>
        </div>
    </body>
    <footer>
        <?php include "footer1.php" ?>
    </footer>
</html>

