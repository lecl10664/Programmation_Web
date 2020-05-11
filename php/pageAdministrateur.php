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


//On se connecte à la BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=appg9b;port=3308;charset=utf8', 'root', '');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

session_start();


// récupération des infos de l'admin connecté

$reqProfil = $bdd->prepare('SELECT * FROM `administrateur` WHERE `mail_administrateur` = :mail');
$reqProfil->execute(array(
    'mail' => $_SESSION['mailConnecte']));

$donneesProfil = $reqProfil->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PageAdministrateur</title>
    <link rel="stylesheet" href='/css/pageAdministrateur.css'>
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
            <a>Menu</a>
            <a href="pageAdministrateur.php">Mes rendez-vous</a>
            <button class="button_utilisateurs">Gérer les utilisateurs</button>
            <button class="button_capteurs">Gérer les capteurs</button>
            <a href="gererFAQ.php">Gérer la FAQ</a>
            <a href="pageAdministrateur.php">Forum</a>
        </div>

        <div id="main">


        </div>

        <div id="profil">
            <h3 class="profil-titre">MON PROFIL ADMINISTRATEUR</h3>

            <div class="profil-colonnes">
                <div class="profil-texte">
                    <p>Admin n° <?php echo $donneesProfil['ID_Administrateur'] ?></p>
                    <p>Mail :  <?php echo $donneesProfil['mail_administrateur'] ?></p>
                    <a class="profil-editer" href="/php/editer_profil.php">
                        <img class="profil-editer_no_hover"
                         src="/images/stylo_noir.png"
                         width="50" height="50"
                         alt="editer_profil"/>
                         <img class="profil-editer_hover"
                          src="/images/stylo_blanc.png"
                          width="50" height="50"
                          alt="editer_profil_hover"/>
                    </a>
                </div>
                <img class="profil-photo" src="../images/logo_admin.png" width="150" height="150" title="profil_admin"></img>
            </div>
        </div>

    </div>
<!--
    <div id="tableau">
        <table>
            <caption> </caption>
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
-->

<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
</script>

<script>
    $('.button_utilisateurs').click(function(e) {
        e.preventDefault();
        $('#tableau_capteurs').removeClass('active');
        $('#tableau_utilisateurs').toggleClass('active');
    })
    $('.button_capteurs').click(function(e) {
        e.preventDefault();
        $('#tableau_utilisateurs').removeClass('active');
        $('#tableau_capteurs').toggleClass('active');
    })
</script>



<div class='tableaux'>
    <div id='tableau_utilisateurs'>
        <table>
            <caption> </caption>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Adresse e-mail</th>
            </tr>
        </table>
    </div>

    <div id='tableau_capteurs'>
        <table>
            <caption> </caption>
            <tr>
                <th>Cap</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Adresse e-mail</th>
            </tr>
        </table>
    </div>
</div>















    <?php
    $test = [
        '1' => ['Nom'=> '...', 'Prénom'=> '...', 'Date de naissance'=> '...', 'Téléphone'=> '...', 'Adresse'=> '...', 'Adresse e-mail'=> '...'],
        '2' => ['Nom'=> '...', 'Prénom'=> '...', 'Date de naissance'=> '...', 'Téléphone'=> '...', 'Adresse'=> '...', 'Adresse e-mail'=> '...'],
        '3' => ['Nom'=> '...', 'Prénom'=> '...', 'Date de naissance'=> '...', 'Téléphone'=> '...', 'Adresse'=> '...', 'Adresse e-mail'=> '...']
        ];
    echo'<div id="tableau">
            <table>
                <caption> </caption>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Adresse e-mail</th>
                </tr>';

    foreach ($test as $clef => $produit){
        echo '<tr>
            <th>' .$clef. '</th>';
        foreach($produit as $caracteristique => $valeur){
            echo '<td>' .$valeur. '</td>';
        }
        echo '<br>';
    }
    echo '</table>
        </div>';



        /*
        Faire un test sur l’attribut dans l’url
        Si url valide : aller a pageAdmin/qqch
        Si url pas valide : revenir a pageAdmin


        */
    ?>

    <?php include_once("./php/footer.php");?>

</body>
</html>
