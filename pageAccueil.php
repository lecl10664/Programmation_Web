<!DOCTYPE html>
<html>
<head>
    <!-- En-tête de la page -->
    <meta charset="utf-8" />
    <title>TechReflex</title>
    <?php include "./header/header.html" ?>
    <link rel="stylesheet" href="bodyAccueil.css">
</head>

<body>
    <div id="haut">
        <div class=videNav></div>
        <div class="imgtop">
            <!--<img src="images/voiture"></img>-->
            <div class="imgTexte">
                <h1>Mesure et test psychotechniques</h1>
                <h4>Conçue pour les auto-écoles</h4>
                <div class="suite">
                    <a href="#milieu">Qui sommes-nous ?</a>
                </div>
            </div>
        </div>
    </div>



    <div id="milieu">
        <div class="inter">
            <h1>En quoi consistent nos tests ?</h1>
        </div>
        <div class="fonction">
            <div class="thermometre">
                <img src="images/thermo.png" alt="thermometre">
                <p>Prise de la température</p>
            </div>
            <div class="reflexe">
                <img src="images/chrono.jpg" alt=chrono">
                <p>Reflexe à un stimulus</p>
            </div>
            <div class="pouls">
                <img src="images/pouls.jpg">
                <p>Fréquence cardiaque</p>
            </div>
        </div>
    </div>

<footer>
        <?php include "./footer/footer.html" ?>
</footer>

</body>

</html>
