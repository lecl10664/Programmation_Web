<?php
    $dir2 = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
    chdir($dir2.DIRECTORY_SEPARATOR);
    //echo getcwd()."<br>";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>footer</title>
        <link rel="stylesheet" href="../Vue/footer.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <footer>
            <div class="social">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-linkedin"></a>
                <a href="#" class="fa fa-instagram"></a>
            </div>

            <div class="txtFooter">
                <p class="copyright">© Infinite Measures, 2020 <br>
                    <a class="linkFooter" href="cgu2.php">Terms and Conditions</a> -
                    <a class="linkFooter" href="mentionslegales2.php">Legal mentions</a>
                </p>
            </div>

        </footer>
    </body>
</html>
