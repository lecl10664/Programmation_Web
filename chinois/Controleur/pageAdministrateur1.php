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
        $bdd = new PDO('mysql:host=localhost;dbname=id13958611_appg9b;charset=utf8', 'id13958611_user', 'Passwordpassword0!');
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
    <link rel="stylesheet" href='../Vue/pageAdministrateur.css'>
    <!--<link rel="stylesheet" href="../Vue/editer_profil.css">-->
    <link rel="stylesheet" href="../Vue/editer_profil.css">
    <?php include 'header1.php'?>
</head>

<body>
    <div id="conteneur1">

        <div id="menu">
            <a>菜单</a>
            <!-- <a href="pageAdministrateur.php">Gérer les utilisateurs</a>  -->
            <!-- <a href="">Gérer les capteurs</a> -->
            <a href="gererFAQ1.php">管理FAQ</a>
            <a href="forumAdministrateur1.php">管理论坛</a>
        </div>

        <div id="main">

        </div>

        <div id="profil">
            <h3 class="profil-titre">我的管理员信息</h3>

            <div class="profil-colonnes">
                <div class="profil-texte">
                    <p>Admin n° <?php echo $donneesProfil['ID_Administrateur'] ?></p>
                    <p>邮箱 :  <?php echo $donneesProfil['mail_administrateur'] ?></p>
                </div>
                <img class="profil-photo" src="../images/logo_admin.png" title="profil_admin"/>
            </div>
        </div>
    </div>

<?php
    if(isset($_GET['page'])){
      if($_GET['page'] == 'editerProfilUtilisateur'){
          $reponse = $bdd->prepare('SELECT * FROM `utilisateur` WHERE `Adresse_email` = :mail');
          $reponse->execute(array('mail' => $_POST['edit']));
          $donnees = $reponse->fetch();
?>
        <h1>
            修改用户信息
        </h1>
        <div id = content>
            <form action="../Modele/profilEdite.php" method="post">
                <ol>
                    <li>
                        <p>修改名字 : <?php echo $donnees['Nom'] ?></p>
                        <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau nom" name="surnameButton" value=<?php echo $donnees['Nom'] ?>>
                    </li>
                    <br />
                    <hr />
                    <li>
                        <p>修改姓名 : <?php echo $donnees['Prenom'] ?></p>
                        <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau prénom" name="nameButton" value=<?php echo $donnees['Prenom'] ?>>
                    </li>
                    <br />
                    <hr />
                    <li>
                        <p>修改生日 : <?php echo $donnees['Date_de_naissance'] ?></p>
                        <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouvelle date de naissance" name="birthDateButton" value=<?php echo $donnees['Date_de_naissance'] ?>>
                    </li>
                    <br />
                    <hr />
                    <li>
                        <p>修改电话号码 : <?php echo $donnees['N°_de_telephone'] ?></p>
                        <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouveau numéro de téléphone" name="phoneButton" value=<?php echo $donnees['N°_de_telephone'] ?>>
                    </li>
                    <br />
                    <hr />
                    <li>
                        <p>修改地址 : <?php echo $donnees['Adresse'] ?></p>
                        <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" placeholder="Nouvelle adresse" name="addressButton" value=<?php echo $donnees['Adresse'] ?>>
                    </li>
                    <br />
                    <hr />
                    <input style="margin-top:10px; box-shadow: 0 1px 0 gray;"type="submit" value="Sauvegarder le profil" class="saveButton">
                </ol>
            </form>
        </div>

        <h1>删除资料</h1>
        <form id="supprProfil" action="../Modele/admin_supprimer_profil1.php" method="post">
    <input type="email" name="suppr" value="<?php echo $_POST['edit']?>">
    <input style="margin: 2% auto 5% auto; color: red" type="submit" value="Supprimer ce profil">
</form>
<?php
      }
    }
    else{
?>
    <div class='tableaux'>
        <div id='tableau_utilisateurs'>
            <h3>用户列表 :</h3>

                <?php
                    // recupère tous les utilisateurs de la BDD

                    $reqUtilisateurs = $bdd->query('SELECT `IDUtilisateur`, `Mot_de_passe`, `Nom`, `Prenom`,
                                                    DATE_FORMAT(`Date_de_naissance`, "%d/%m/%Y"),
                                                    `N°_de_telephone`, `Adresse`, `Adresse_email` FROM `utilisateur`');
                ?>
            <table>
                <caption> </caption>
                <tr>
                    <th>ID</th>
                    <th>姓名</th>
                    <th>名字</th>
                    <th>生日</th>
                    <th>电话</th>
                    <th>地址</th>
                    <th>Email</th>
                </tr>

                <form action="pageAdministrateur.php?page=editerProfilUtilisateur" method="post">

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
                        <td><input type="radio" name="edit" value="<?php echo $donneesUtilisateurs['Adresse_email'] ?>"/></td>
                    </tr>
                    <?php
                        }
                    ?>
            </table>
            <div class="editer">
                <input type="submit" value="Editer l'utilisateur sélectionné">
            </div>
            </form>
        </div>
    </div>
<?php
    }
?>




<footer>
    <?php include "footer1.php";?>
</footer>

</body>
</html>
