<?php
    $dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
    chdir($dir2.DIRECTORY_SEPARATOR);
    //echo getcwd()."<br>";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Nous contacter</title>
        <?php include "./php/header.php" ?>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/css/faq.css">
    <head>
    <body>
      <ol>
          <li>Comment prendre rendez-vous ?</li>
          <p>
              Pour prendre rendez-vous, veuillez nous contacter via la page <a href="/php/contact.php" target="_blank">Nous contacter</a>. Il est également possible de prendre rendez-vous en vous rendant à l'adresse suivante : ...
          </p>
          <li>En quoi consistent les tests ?</li>
          <p>
              Les tests sont divisés en deux catégories : les tests visuels et les tests sonores. Ces tests permettent d'évaluer votre capacité à retenir un rythme, à reconnaître un son familier ou encore à mesurer votre temps de réaction.
          </p>
          <li>Quel est le coût d'un test ?</li>
          <p>
              20 000€
          </p>
          <li>Comment accéder à mes résultats ?</li>
          <p>
              Dans un premier temps, vous devez vous connecter en tant qu'utilisateur à l'aide des informations qui vous ont été fournies par InfiniteMeasures. Une fois connecté, rendez-vous sur la page dédiée : <a href="/php/accueil.php" target="_blank">Page d'accueil</a>.
          </p>
          <li>Je ne peux plus me connecter à mon compte.</li>
          <p>
              Tant pis.
          </p>
          <li>Comment contacter un administrateur ?</li>
          <p>
              Les informations de contact des administrateurs sont disponibles à cette adresse : <a href="/php/contact.php" target="_blank">Nous contacter</a>.
          </p>
          <li></li>
          <p>
           </p>
      </ol>
    </body>
    <footer>
        <?php include "./php/footer.php" ?>
    </footer>
</html>
