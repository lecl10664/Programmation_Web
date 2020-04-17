<?php
$dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
chdir($dir2.DIRECTORY_SEPARATOR);
//echo getcwd()."<br>";


//On se connecte à la BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=appg9b;port=3308;charset=utf8', 'root', '');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        body{
            display: flex;
            justify-content: center;


            height: 100vh;
            background-color:rgb(232,232,232);
        }
        .box1{
            position:fixed;
            top:300px;
            left:300px;
            max-width: 1000px;
            height: 200px;
            line-height: 10px;
            border: 1px solid black;
            text-align: left;
            box-sizing: border-box;
            padding: 10px;
            background-color:rgb(161,215,171);
            box-shadow: 10px 10px 10px gray;
            flex: 0 1 auto;
        }


        .box2{
            position:fixed;
            top:300px;
            right:300px;
            max-width: 1000px;
            height: 200px;
            line-height: 10px;
            border: 1px solid black;
            text-align: left;
            box-sizing: border-box;
            padding: 10px;
            background-color:rgb(79,116,135);
            box-shadow: 10px 10px 10px gray;
            flex: 0 1 auto;
        }
        .input{
            border-color:#FF0000;
            border-style:solid;
        }
    </style>
    <script type="text/javascript" language="javascript" >
        function fun(test){
            var value= document.getElementById(test).value;
            var object= document.getElementById(test);
            if(value==null||value==''){
                object.setAttribute("box2","input");
            }else{
                object.setAttribute("box2","");
            }
    </script>
</head>
<body>

    <div class="bigbox">
        <div class="box1">
            <form action="estIdentifier.php" method="post">
                <br>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" name="prenom" placeholder="prénom">
                <br>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="text" name="nom" placeholder="nom">
                <br>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="email" name="mail"  placeholder="mail">
                <br>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="date" name="date_de_naissance" placeholder="date de naissance">
                <br>
                <input style="border:none; border-bottom: 1px solid; border-bottom-color: gray;" type="password" name="mot_de_passe" placeholder="mot de passe">
                <br>
                <input style="margin-top:10px; box-shadow: 0 1px 0 gray;" type="submit" value="S’inscrire">
                <br>
            </form>
        </div>
    </div>

</body>
</html>
