<?php
$dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
chdir($dir2.DIRECTORY_SEPARATOR);
//echo getcwd()."<br>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href = "/css/utilisateur.css" />
    <title>Utilisateur</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:300,400,700">
</head>
<header>
    <?php include_once('./php/header.php');?>
</header>
<body>
<div id="content">

    <div id="menu">
        <a href="#" class="active">Menu</a>
        <a href="mesDonneesUtilisateurs.php">Mes données</a>
        <a href="utilisateur.php">Mes rendez-vous</a>
        <a href="faq.php">FAQ</a>
        <a href="contact.php">Nous contacter</a>
    </div>

    <div id="profil">
        <h3 class="profil-titre">MON PROFIL UTILISATEUR</h3>

        <div class="profil-colonnes">
            <div class="profil-texte">
                <p>Nom Prénom</p>
                <p>Age</p>
                <p>Date de naissance</p>
                <p>Adresse</p>
                <p>Score moyen</p>
                <p>Nombre de tests effectués</p>
            </div>
            <img class="profil-photo" src="/images/profil_400x400.png" title="Photo de profil"/>
        </div>
    </div>
</div>

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
                <td class="event">21</td>
                <a href=""
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

    </div> <!-- end calendar -->

</div> <!-- end content2 -->
</body>
<footer>
    <?php include "./php/footer.php" ?>
</footer>
</html>