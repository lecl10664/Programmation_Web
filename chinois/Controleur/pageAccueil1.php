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
    <?php include "header1.php" ?>
</header>

<div id="haut">
    <div class="imgTexte">
        <h1>心理技术测试与测量</h1>
        <h4>专为驾校设计</h4>
        <div class="suite">
            <a href="#presentation">了解更多</a>
        </div>
    </div>
</div>

<div id="presentation">
    <img src="../images/guillemets_g.jpg" class="guillemet_g"
         height="96" width="102">
    <div class="text">
        <p>心理技术测试用于衡量逻辑，语言和个人的数字技能。测量反应，反射，集中的​​能力，还测量整合和处理信息或刺激的能力。</p>
    </ div></p>
    </div>
    <img src="../images/guillemets_d.jpg" class="guillemet_d"
         height="96" width="102">
    <img src="../images/presentation.png" class="voiture"
         height="110" width="256">
</div>

<div id="milieu">
    <div class="inter">
        <h2 >测试之前和之后</h2>
    </div>
    <div class="mesure_avant_test">
        <div class="thermometre">
            <img src="/images/thermo.png" alt="thermometre" width="44" height="79">
            <p><b>温度测试</b></p>
            <p>通过个人的温度变化可以知道他对测试的反应</p>
        </div>
        <div class="pouls">
            <img src="/images/pouls.png" alt="pouls" width="160" height="79">
            <p><b>心率</b></p>
            <p>了解个人的脉搏可以了解测试前后的压力</p>
        </div>
    </div>
    <div class="titreTest">
        <h2>不同的测试</h2>
    </div>
    <div class="mesure_test">
        <div class="reflexe">
            <img src="/images/vitesse.png" alt="chrono" width="79" height="79">
            <p><b>反射刺激</b></p>
        </div>
        <div class="memoire">
            <img src="/images/memoire.png" alt="memoire" width="79" height="79">
            <p><b>记忆</b></p>
        </div>
        <div class="ecoute">
            <img src="/images/ecoute.png" alt="ecoute" width="79" height="79">
            <p><b>专注与倾听</b></p>
        </div>
    </div>
</div>

<div id="fin">
    <div class="utilisateur">
        <img src="../images/test.png" alt="test" width="253" height="180">
        <p>要了解您的心理技术能力，您要做的就是创建一个帐户，然后前往其中一所合作驾驶学校。</p>
        <a href="s_identifier_utilisateur1.php">
            <button class="boutonBas">创建您的用户帐户</button>
        </a>
    </div>
    <div class="gestionnaire">
        <img src="../images/gestionnaire.png" alt="gestionnaire" width="242" height="201">
        <p>您是驾驶学校，想在自己的房屋内进行心理测试</p>
        <a href="s_identifier_gestionnaire1.php">
            <button class="boutonBas">创建您的驾校帐户</button>
        </a>

    </div>
</div>

<footer>
    <?php include "footer1.php" ?>
</footer>

</body>

</html>