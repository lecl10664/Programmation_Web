<?php
    $dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
    chdir($dir2.DIRECTORY_SEPARATOR);
    /*
    echo __DIR__."<br>";
    echo __FILE__."<br>";
    echo $_SERVER['SCRIPT_FILENAME']."<br>";
    echo $_SERVER['SCRIPT_NAME']."<br>";
    echo $dir2.DIRECTORY_SEPARATOR."<br>";
    echo getcwd()."<br>";
    */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PageAdministrateur</title>
    <link rel="stylesheet" href='/css/pageAdministrateur.css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <?php include_once('./php/header.php');?>

    <!--  <div id="content1">

        <div id="users">
            <h3 class="users-titre">UTILISATEURS</h3>
            <div class="users-colonnes">
                <div class="users-texte">
                    <p>Nom Prénom</p>
                    <p>Age</p>
                    <p>Date de naissance</p>
                    <p>Adresse</p>
                </div>
            </div>
        </div>

        <div id="profil-admin">
            <h3 class="profil-admin-titre">MON PROFIL</h3>
            <div class="profil-admin-colonnes">
                <div class="profil-admin-texte">
                    <p>Nom Prénom</p>
                    <p>Age</p>
                    <p>Date de naissance</p>
                    <p>Adresse</p>
                </div>
                <img class="profil-admin-photo" src="/images/profil_400x400.png" title="profil_admin"></img>
            </div>
        </div>
    </div>
    -->

    <div id="conteneur1">
        <div id="menu">
            <a href="#" class="active">Menu</a>
            <a href="utilisateur.php">Mes données</a>
            <a href="pageAdministrateur.php">Mes rendez-vous</a>
            <a href="pageAdministrateur.php">Gérer les utilisateurs</a>
            <a href="pageAdministrateur.php">Gérer les capteurs</a>
            <a href="pageAdministrateur.php">Forum</a>
        </div>

        <div id="main">
            Couleurs à modifier ?

        </div>

        <div id="profil">
            <h3 class="profil-titre">MON PROFIL</h3>

            <div class="profil-colonnes">
                <div class="profil-texte">
                    <p>Nom Prénom</p>
                    <p>Age</p>
                    <p>Adresse du centre</p>
                    <p>Prochain rdv</p>
                </div>
                <img class="profil-photo" src="/images/profil_400x400.png" title="profil_admin"></img>
            </div>
        </div>

    </div>

    <div id="tableau">
        <table>
            <cpation> </cpation>
            <tr>
                <th></th>
                <th>Temp avant-test</th>
                <th>Fréq cardiaque avant-test</th>
                <th>Mémorisation auditive</th>
                <th>Mémorisation visuelle</th>
                <th>Réflexe auditif</th>
                <th>Réflexe visuel</th>
                <th>Reproduction sonore</th>
                <th>Temp après-test</th>
                <th>Fréq cardiaque après-test</th>
            </tr>
            <tr>
                <th>Test du 18/04/2020</th>
                <td>31 °C</td>
                <td>70 bpm</td>
                <td>2/3</td>
                <td>3/3</td>
                <td>300 ms</td>
                <td>380 ms</td>
                <td>1/3</td>
                <td>33 °C</td>
                <td>90 bpm</td>
            </tr>
            <tr>
                <th>Test du 03/04/2020</th>
                <td>29 °C</td>
                <td>80 bpm</td>
                <td>2/3</td>
                <td>1/3</td>
                <td>410 ms</td>
                <td>370 ms</td>
                <td>1/3</td>
                <td>30 °C</td>
                <td>80 bpm</td>
            </tr>
            <tr>
                <th>Test du 21/03/2020</th>
                <td>30 °C</td>
                <td>60 bpm</td>
                <td>1/3</td>
                <td>1/3</td>
                <td>400 ms</td>
                <td>420 ms</td>
                <td>0/3</td>
                <td>29 °C</td>
                <td>90 bpm</td>
            </tr>
            <tr>
                <th>Moyenne</th>
                <td>30 °C</td>
                <td>70 bpm</td>
                <td>1,7/3</td>
                <td>1,7/3</td>
                <td>370 ms</td>
                <td>390 ms</td>
                <td>0,7/3</td>
                <td>30,7 °C</td>
                <td>86,7 bpm</td>
            </tr>
        </table>
    </div>

    <?php
    $test = [
        'test 1' => ['Temp avant-test'=> 'résultat', 'Fréq cardiaque avant-test'=> 'résultat', 'Mémorisation auditive'=> 'résultat', 'Mémorisation visuelle'=> 'résultat', 'Réflexe auditif'=> 'résultat', 'Réflexe visuel'=> 'résultat', 'Reproduction sonore'=> 'résultat', 'Temp après-test'=> 'résultat', 'Fréq cardiaque après-test'=> 'résultat'],
        'test 2' => ['Temp avant-test'=> 'résultat', 'Fréq cardiaque avant-test'=> 'résultat', 'Mémorisation auditive'=> 'résultat', 'Mémorisation visuelle'=> 'résultat', 'Réflexe auditif'=> 'résultat', 'Réflexe visuel'=> 'résultat', 'Reproduction sonore'=> 'résultat', 'Temp après-test'=> 'résultat', 'Fréq cardiaque après-test'=> 'résultat'],
        'test 3' => ['Temp avant-test'=> 'résultat', 'Fréq cardiaque avant-test'=> 'résultat', 'Mémorisation auditive'=> 'résultat', 'Mémorisation visuelle'=> 'résultat', 'Réflexe auditif'=> 'résultat', 'Réflexe visuel'=> 'résultat', 'Reproduction sonore'=> 'résultat', 'Temp après-test'=> 'résultat', 'Fréq cardiaque après-test'=> 'résultat']
        ];

    //foreach ($test as $clef => $produit){
        //echo 'Test : ' .$clef. '<br>';
        //foreach($produit as $caracteristique => $valeur){
            //echo $caracteristique. ' : ' .$valeur. '<br>';
        //}
        //echo '<br>';
    //}
    ?>

    <?php include_once("./php/footer.php");?>



</body>
</html>
