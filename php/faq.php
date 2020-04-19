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
        <h1>
            FAQ
        </h1>
        <div id = content>
            <ol>
                <li>Comment prendre rendez-vous ?</li>
            <p>
                 Vous pouvez prendre un rendez-vous en vous connectant dans votre espace utilisateur : <a href="s_identifier.php">cliquez ici pour vous connecter.</a> <br/> Vous n'avez pas encore de compte ? <a href="se_connecter.php">cliquez ici pour vous inscrire</a>
            </p>
          <li>En quoi consistent les tests ?</li>
          <p>
              Les tests sont divisés en deux catégories : les tests visuels et les tests sonores. Ces tests permettent d'évaluer votre capacité à retenir un rythme, à reconnaître un son familier ou encore à mesurer votre temps de réaction.
          </p>
          <li>Comment passer un test ?</li>
          <p>
              Pour passer un test il faut prendre un rendez-vous en agence : le test est lancé par un gestionnaire.
          </p>
          <li>Comment accéder à mes résultats ?</li>
          <p>
              Dans un premier temps, vous devez vous connecter en tant qu'utilisateur à l'aide des informations qui vous ont été fournies par le gestionnaire. Une fois connecté, rendez-vous sur la page dédiée : <a href="mesDonneesUtilisateurs.php"> mes données</a>.
          </p>
          <li>Comment contacter un administrateur ?</li>
          <p>
              Les informations de contact des administrateurs sont disponibles à cette adresse : <a href="/php/contact.php" target="_blank">nous contacter</a>.
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
