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
        <button class="button_utilisateurs">Gérer les utilisateurs</button>
        <button class="button_capteurs">Gérer les capteurs</button>
        <a href="gererFAQ.php">Gérer la FAQ</a>
        <a href="pageAdministrateur.php">Gérer le forum</a>
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
            <img class="profil-photo" src="/images/logo_admin.png" width="150" height="150" title="profil_admin"></img>
        </div>
    </div>

</div>


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

        <?php
        // recupère tous les utilisateurs de la BDD

        $reqUtilisateurs = $bdd->query('SELECT `IDUtilisateur`, `Mot_de_passe`, `Nom`, `Prenom`, DATE_FORMAT(`Date_de_naissance`, "%d/%m/%Y"),
 `N°_de_telephone`, `Adresse`, `Adresse_email` FROM `utilisateur`');

        ?>
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

            <?php
            while($donneesUtilisateurs = $reqUtilisateurs ->fetch()) {
                ?>
                <tr>

                    <td><?php echo $donneesUtilisateurs['IDUtilisateur'] ?></td>
                    <td><?php echo $donneesUtilisateurs['Nom'] ?></td>
                    <td><?php echo $donneesUtilisateurs['Prenom'] ?></td>
                    <td><?php echo $donneesUtilisateurs['DATE_FORMAT(`Date_de_naissance`, "%d/%m/%Y")'] ?></td>
                    <td><?php echo $donneesUtilisateurs['N°_de_telephone'] ?></td>
                    <td><?php echo $donneesUtilisateurs['Adresse'] ?></td>
                    <td><?php echo $donneesUtilisateurs['Adresse_email'] ?></td>
                </tr>
          <?php
            }
            ?>
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


<footer>
    <?php include_once("./php/footer.php");?>
</footer>

</body>
</html>
