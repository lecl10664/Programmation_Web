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
    <link rel="stylesheet" href="../Vue/bodyAccueil.css">
</head>

<body>

<header>
    <?php include "header2.php" ?>
</header>

<div id="haut">
    <div class="imgTexte">
        <h1>Psychotechnical measures and tests</h1>
        <h4>Created for driving schools</h4>
        <div class="suite">
            <a href="#presentation">Learn more</a>
        </div>
    </div>
</div>

<div id="presentation">
    <img src="../images/guillemets_g.jpg" class="guillemet_g"
         height="96" width="102">
    <div class="text">
        <p>Psychotechnical tests are used to measure logical, verbal and numerical skills
            of an individual. They measure the capacities of reaction, reflection, concentration and
            ability to integrate and process information or stimulation..</p>
    </div>
    <img src="../images/guillemets_d.jpg" class="guillemet_d"
         height="96" width="102">
    <img src="../images/presentation.png" class="voiture"
         height="110" width="256">
</div>

<div id="milieu">
    <div class="inter">
        <h2 >Before and after test measures</h2>
    </div>
    <div class="mesure_avant_test">
        <div class="thermometre">
            <img src="../images/thermo.png" alt="thermometre" width="44" height="79">
            <p><b>Temperature</b></p>
            <p>Knowing the temperature variations of the individual allows to know his reactions to the tests</p>
        </div>
        <div class="pouls">
            <img src="../images/pouls.png" alt="pouls" width="160" height="79">
            <p><b>Heart rate</b></p>
            <p>Knowing the pulse of the individual allows to know about their level of stress before and after the test</p>
        </div>
    </div>
    <div class="titreTest">
        <h2>The different tests</h2>
    </div>
    <div class="mesure_test">
        <div class="reflexe">
            <img src="../images/vitesse.png" alt="chrono" width="79" height="79">
            <p><b>Stimulus reflexes</b></p>
        </div>
        <div class="memoire">
            <img src="../images/memoire.png" alt="memoire" width="79" height="79">
            <p><b>Memory</b></p>
        </div>
        <div class="ecoute">
            <img src="../images/ecoute.png" alt="ecoute" width="79" height="79">
            <p><b>Focus and hearing</b></p>
        </div>
    </div>
</div>

<div id="fin">
    <div class="utilisateur">
        <img src="../images/test.png" alt="test" width="253" height="180">
        <p>To know your phsychotechnical abilities, you only have to create an account and go to one of the partner auto schools.</p>
        <a href="s_identifier_utilisateur.php">
            <button class="boutonBas">Sign in as user</button>
        </a>
    </div>
    <div class="gestionnaire">
        <img src="../images/gestionnaire.png" alt="gestionnaire" width="242" height="201">
        <p>You are a driving school and you want to pass psychotechnical tests in your premises</p>
        <a href="s_identifier_gestionnaire.php">
            <button class="boutonBas">Sign in as a driving school</button>
        </a>

    </div>
</div>

<footer>
    <?php include "footer2.php" ?>
</footer>

</body>

</html>
