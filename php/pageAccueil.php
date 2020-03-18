<?php
    $dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
    chdir($dir2.DIRECTORY_SEPARATOR);
    //echo getcwd()."<br>";
?>
<!DOCTYPE html>
<html>
<head>
    <!-- En-tête de la page -->
    <meta charset="utf-8" />
    <title>TechReflex</title>
    <?php include "./php/header.php" ?>
    <link rel="stylesheet" href="/css/bodyAccueil.css">
</head>

<body>

    <div id="haut">
            <div class="imgTexte">
                <h1>Mesure et test psychotechniques</h1>
                <h4>Conçue pour les auto-écoles</h4>
                <div class="suite">
                    <a href="#milieu">En savoir plus</a>
                </div>
            </div>
    </div>

    <div id="presentation">
        <p>Les tests psychotechniques sont utilisés pour mesurer les aptitudes logiques, verbales et numériques
            d’un individu. Ils mesurent les capacités de réaction, de réflexion, de concentration mais aussi la
            faculté à intégrer et à traiter l’information ou la stimulation.</p>
        <img src="../images/presentation.png">
    </div>

    <div id="milieu">
        <div class="inter">
            <h1>En quoi consistent nos tests ?</h1>
        </div>
        <div class="fonction">
            <div class="thermometre">
                <img src="/images/thermo.png" alt="thermometre">
                <p>Prise de la température</p>
            </div>
            <div class="reflexe">
                <img src="/images/chrono.jpg" alt="chrono">
                <p>Reflexe à un stimulus</p>
            </div>
            <div class="pouls">
                <img src="/images/pouls.png">
                <p>Fréquence cardiaque</p>
            </div>
        </div>
    </div>

<footer>
        <?php include "./php/footer.php" ?>
</footer>

</body>

</html>
