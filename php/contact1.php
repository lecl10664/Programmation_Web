<?php
    $dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
    chdir($dir2.DIRECTORY_SEPARATOR);
    //echo getcwd()."<br>";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Nous contacter</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/contact.css">
    <head>
    <header>
            <?php include "header1.php" ?>
    </header>
    <body>
    <h1>
        联系我们
    </h1>
        <div id = content>
            <ul>
                <li>联系管理员 :</li>
                    <p>
                        <a href="mailto:test@gmail.com">发送邮件</a><br /><br />
                        电话号码 : 06 00 00 00 00
                    </p>
                <li>联系 Infinite Measures :</li>
                    <p>
                        <a href="mailto:test@gmail.com">发送邮件</a><br /><br />
                        电话号码 : 06 00 00 00 00<br /><br />
                        地址 : 10 Rue de Vanves, 92130 Issy-les-Moulineaux
                    </p>
            </ul>
        </div>
    </body>
    <footer>
        <?php include "footer1.php" ?>
    </footer>

</html>