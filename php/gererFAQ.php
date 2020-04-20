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
    $question1 = $bdd->query('SELECT Questions FROM faq WHERE N°_FAQ = 1');
    $question2 = $bdd->query('SELECT Questions FROM faq WHERE N°_FAQ = 2');
    $question3 = $bdd->query('SELECT Questions FROM faq WHERE N°_FAQ = 3');
    $question4 = $bdd->query('SELECT Questions FROM faq WHERE N°_FAQ = 4');
    $question5 = $bdd->query('SELECT Questions FROM faq WHERE N°_FAQ = 5');
    $question6 = $bdd->query('SELECT Questions FROM faq WHERE N°_FAQ = 6');

    $reponse1 = $bdd->query('SELECT Réponses FROM faq WHERE N°_FAQ = 1');
    $reponse2 = $bdd->query('SELECT Réponses FROM faq WHERE N°_FAQ = 2');
    $reponse3 = $bdd->query('SELECT Réponses FROM faq WHERE N°_FAQ = 3');
    $reponse4 = $bdd->query('SELECT Réponses FROM faq WHERE N°_FAQ = 4');
    $reponse5 = $bdd->query('SELECT Réponses FROM faq WHERE N°_FAQ = 5');
    $reponse6 = $bdd->query('SELECT Réponses FROM faq WHERE N°_FAQ = 6');

    $question1Donnees = $question1->fetch();
    $question2Donnees = $question2->fetch();
    $question3Donnees = $question3->fetch();
    $question4Donnees = $question4->fetch();
    $question5Donnees = $question5->fetch();
    $question6Donnees = $question6->fetch();

    $reponse1Donnees = $reponse1->fetch();
    $reponse2Donnees = $reponse2->fetch();
    $reponse3Donnees = $reponse3->fetch();
    $reponse4Donnees = $reponse4->fetch();
    $reponse5Donnees = $reponse5->fetch();
    $reponse6Donnees = $reponse6->fetch();

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
            Gérer la FAQ
        </h1>
        <div id = content>
        <form action="faqmodifie.php" method="post">
        <ol>
        <li>
        <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" name="question1" type="text" size="100" value="<?php echo $question1Donnees['Questions']; ?>"/>
        <input type="submit" value = "Ajouter ou modifier une question"/>
        <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" name="reponse1" type="text" size="100" value="<?php echo $reponse1Donnees['Réponses']; ?>"/>
        <input type="submit" value = "Ajouter ou modifier une réponse"/>
        </li>
        <li>
        <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" name="question2" type="text" size="100" value="<?php echo $question2Donnees['Questions']; ?>"/>
        <input type="submit" value = "Ajouter ou modifier une question"/>
        <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" name="reponse2" type="text" size="100" value="<?php echo $reponse2Donnees['Réponses']; ?>"/>
        <input type="submit" value = "Ajouter ou modifier une réponse"/>
        </li>
        <li>
        <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" name="question3" type="text" size="100" value="<?php echo $question3Donnees['Questions']; ?>"/>
        <input type="submit" value = "Ajouter ou modifier une question"/>
        <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" name="reponse3" type="text" size="100" value="<?php echo $reponse3Donnees['Réponses']; ?>"/>
        <input type="submit" value = "Ajouter ou modifier une réponse"/>
        </li>
        <li>
        <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" name="question4" type="text" size="100" value="<?php echo $question4Donnees['Questions']; ?>"/>
        <input type="submit" value = "Ajouter ou modifier une question"/>
        <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" name="reponse4" type="text" size="100" value="<?php echo $reponse4Donnees['Réponses']; ?>"/>
        <input type="submit" value = "Ajouter ou modifier une réponse"/>
        </li>
        <li>
        <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" name="question5" type="text" size="100" value="<?php echo $question5Donnees['Questions']; ?>"/>
        <input type="submit" value = "Ajouter ou modifier une question"/>
        <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" name="reponse5" type="text" size="100" value="<?php echo $reponse5Donnees['Réponses']; ?>"/>
        <input type="submit" value = "Ajouter ou modifier une réponse"/>
        </li>
        <li>
        <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" name="question6" type="text" size="100" value="<?php echo $question6Donnees['Questions']; ?>"/>
        <input type="submit" value = "Ajouter ou modifier une question"/>
        <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" name="reponse6" type="text" size="100" value="<?php echo $reponse6Donnees['Réponses']; ?>"/>
        <input type="submit" value = "Ajouter ou modifier une réponse"/>
        </li>
        </ol>
        </form>


        </div>
    </body>
    <footer>
        <?php include "./php/footer.php" ?>
    </footer>
</html>

