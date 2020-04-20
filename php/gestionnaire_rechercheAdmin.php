<?php
$dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
chdir($dir2.DIRECTORY_SEPARATOR);
//echo getcwd()."<br>";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <?php include "./php/header.php" ?>
    <link rel="stylesheet" href="../css/gestionnaire_rechercheAdmin.css.css" />
    <script src="https://kit.fontawesome.com/8bfc90242a.js" crossorigin="anonymous"></script>
    <title>Recherche des administrateurs</title>
</head>

<body>

<div id="searchbar">
    <h1>Rechercher un utilisateur par nom</h1>
    <form action=""  method="post">
        <input type="search" name="utilisateur" size="30" placeholder=""/>
        <input class="button" type="button" value="ok" />
    </form>
</div>

<div id="recherche_critères">
    <h1>Rechercher un utilisateur par critères</h1>
    <label for="age">Age :</label> <input type="text" name="age" id="age" />
    <label for="ville">Ville :</label> <input type="text" name="ville" id="ville" />
    <label for="agence">Agence :</label> <input type="text" name="agence" id="agence" />
</div>

</body>

<footer>
    <?php include "./php/footer.php" ?>
</footer>

</html>
