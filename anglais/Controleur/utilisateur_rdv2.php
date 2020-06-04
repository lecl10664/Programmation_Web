<?php
$dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
chdir($dir2.DIRECTORY_SEPARATOR);
//echo getcwd()."<br>";


//On se connecte à la BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=appg9b;charset=utf8', 'id13853313_user', 'Passwordpassword0!');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href = "../Vue/mesDonneesUtilisateur.css" />
    <title>User</title>
    <?php include_once('header.php');?>

</head>

<body>


<div id="conteneur1">
    <div id="menu">
        <a href="#" class="active">Menu</a>
        <a href="mesDonneesUtilisateurs.php">My results</a>
        <a href="utilisateur_graphes_score_total.php">My graphs</a>
        <a href="utilisateur_rdv.php">My appointments</a>
        <a href="contact.php">Contact us</a>
    </div>

    <div id="main">
        <h1>Book an appointment</h1>
        <h4>
            Here, you can book an appointment to take a test in one of Infinites Measures' partner driving schools
        </h4>
    </div>

    <?php

    //afficher le profil à partir de la bdd

    // récupération des infos de l'utilisateur connecté

    $reqProfil = $bdd->prepare('SELECT `IDUtilisateur`, `Mot_de_passe`, `Nom`, `Prenom`, DATE_FORMAT(`Date_de_naissance`, "%d/%m/%Y"),
 `N°_de_telephone`, `Adresse`, `Adresse_email`, DATE_FORMAT(`date_rdv`, "Le %d/%m/%Y à %H:%i"), `lieu_rdv` FROM `utilisateur` WHERE `Adresse_email` = :mail');
    $reqProfil->execute(array(
        'mail' => $_SESSION['mailConnecte']));

    $donneesProfil = $reqProfil->fetch();
    ?>

    <div id="profil">
        <h3 class="profil-titre">My profile : <?php  echo $donneesProfil['Prenom'], ' ', $donneesProfil['Nom']  ?> </h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p>Birth date : <?php  echo $donneesProfil['DATE_FORMAT(`Date_de_naissance`, "%d/%m/%Y")']?></p>
                <p>Phone number : <?php echo $donneesProfil['N°_de_telephone']?></p>
                <p>Adress : <?php echo $donneesProfil['Adresse']?></p>
                <p>email : <?php echo $donneesProfil['Adresse_email']?></p>
                <p>Next appointement: <?php echo $donneesProfil['DATE_FORMAT(`date_rdv`, "Le %d/%m/%Y à %H:%i")']; ?></p>
                <a class="profil-editer" href="editer_profil.php">
                    <img class="profil-editer_no_hover"
                         src="../images/stylo_noir.png"
                         width="50" height="50"
                         alt="editer_profil"/>
                    <img class="profil-editer_hover"
                         src="../images/stylo_blanc.png"
                         width="50" height="50"
                         alt="editer_profil_hover"/>
                </a>
            </div>
            <!-- <img class="profil-photo" src="/images/profil_400x400.png" title="profil_admin"></img> -->
        </div>
    </div>
</div>



<?php

$reqAgence = $bdd->query('SELECT `Nom_auto_ecole`, `adresse_auto_ecole` FROM `gestionnaire`');


if (!empty($donneesProfil['lieu_rdv'])) { ?>

<div class="rdv_pris">
    <p><strong>You have an appointment :</strong> <br>
        <?php echo $donneesProfil['DATE_FORMAT(`date_rdv`, "Le %d/%m/%Y à %H:%i")']; ?> <br>
        <br>
        Location : <?php echo $donneesProfil['lieu_rdv']; ?>
        <br>
    </p>
</div>

<?php } else { ?>




<div class="rdv">
    <form action="../Modele/rdv_BDD.php" method="post">
        <label>
            Appointment the : <input type="datetime-local" name="date_rdv">
            at the agency :
            <select name="lieu_rdv" required>
                <?php while ($donneesAgence = $reqAgence -> fetch()) { ?>
                    <option value="<?php  echo $donneesAgence['Nom_auto_ecole'].' - '.$donneesAgence['adresse_auto_ecole'] ?>">
                        <?php  echo $donneesAgence['Nom_auto_ecole'].' - '.$donneesAgence['adresse_auto_ecole'] ?>
                    </option>
                <?php } ?>
            </select>
        </label>
        <br>
        <input  class="envoie" type="submit" value="Book an appointment">

    </form>
</div>

<?php } ?>


<!--
------------------------- CALENDRIER ELIE -------------------------------------

 <div class="content2">

     <div class="calendar">

         <header>

             <h2>Avril</h2>

             <a class="btn-prev fontawesome-angle-left" href="#"></a>
             <a class="btn-next fontawesome-angle-right" href="#"></a>

         </header>

         <table>

             <thead>

             <tr>

                 <td>Lun</td>
                 <td>Mar</td>
                 <td>Mer</td>
                 <td>Jeu</td>
                 <td>Ven</td>
                 <td>Sam</td>
                 <td>Dim</td>

             </tr>

             </thead>

             <tbody>

             <tr>
                 <td class="prev-month">30</td>
                 <td class="prev-month">31</td>
                 <td>1</td>
                 <td>2</td>
                 <td>3</td>
                 <td>4</td>
                 <td>5</td>
             </tr>
             <tr>
                 <td>6</td>
                 <td>7</td>
                 <td>8</td>
                 <td>9</td>
                 <td class="event">10</td>
                 <td>11</td>
                 <td>12</td>
             </tr>
             <tr>
                 <td>13</td>
                 <td>14</td>
                 <td>15</td>
                 <td>16</td>
                 <td>17</td>
                 <td>18</td>
                 <td>19</td>
             </tr>
             <tr>
                 <td class="current-day event">20</td>
                 <td class="event" onclick="'hello'">21</td>
                 <td>22</td>
                 <td>23</td>
                 <td>24</td>
                 <td>25</td>
                 <td>26</td>
             </tr>

             <tr>
                 <td>27</td>
                 <td>28</td>
                 <td>29</td>
                 <td>30</td>
                 <td class="next-month">1</td>
                 <td class="next-month">2</td>
                 <td class="next-month">3</td>
             </tr>

             </tbody>

         </table>

     </div> -

 </div>


 ----------------------------- FIN CALENDRIER ELIE --------------------

 -->


</body>
<footer>
    <?php include "footer.php" ?>
</footer>

</html>

