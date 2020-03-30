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
                    <a href="#presentation">En savoir plus</a>
                </div>
            </div>
    </div>

    <div id="presentation">
        <img src="../images/guillemets_g.jpg" class="guillemet_g"
                height="96" width="102">
        <div class="text">
            <p>Les tests psychotechniques sont utilisés pour mesurer les aptitudes logiques, verbales et numériques
                d’un individu. Ils mesurent les capacités de réaction, de réflexion, de concentration mais aussi la
                faculté à intégrer et à traiter l’information ou la stimulation.</p>
        </div>
        <img src="../images/guillemets_d.jpg" class="guillemet_d"
                height="96" width="102">
        <img src="../images/presentation.png" class="voiture"
                height="110" width="256">
    </div>

    <div id="milieu">
        <div class="inter">
            <h2 >Mesures avant/après test</h2>
        </div>
        <div class="mesure_avant_test">
            <div class="thermometre">
                <img src="/images/thermo.png" alt="thermometre" width="44" height="79">
                <p><b>Prise de la température</b></p>
                <p>Connaitre les variations de températures de l'indivudu permet de savoir sa réactions
                    au tests</p>
            </div>
            <div class="pouls">
                <img src="/images/pouls.png" alt="pouls" width="160" height="79">
                <p><b>Fréquence cardiaque</b></p>
                <p>Connaitre le pouls de l'individu permet de savoir le stress avant et après-test</p>
            </div>
        </div>
        <div class="titreTest">
            <h2>Les différents tests</h2>
        </div>
        <div class="mesure_test">
            <div class="reflexe">
                <img src="/images/vitesse.png" alt="chrono" width="79" height="79">
                <p><b>Reflexe à un stimulus</b></p>
            </div>
            <div class="memoire">
                <img src="/images/memoire.png" alt="memoire" width="79" height="79">
                <p><b>Mémorisation</b></p>
            </div>
            <div class="ecoute">
                <img src="/images/ecoute.png" alt="ecoute" width="79" height="79">
                <p><b>Concentration et écoute</b></p>
            </div>
        </div>
    </div>

    <div class="fin">
        <a href="se-connecter.php">
            <button class="boutonBas">Je passe les tests</button>
        </a>
    </div>

<footer>
        <?php include "./php/footer.php" ?>
</footer>

</body>

</html>
