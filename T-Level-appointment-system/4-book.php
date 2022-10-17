<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
    <?php
        require "2-lib-appo.php";
        echo $_APPO->save ($_POST["date"], $_POST["slot"], $_POST["user"]);
        header( "refresh:10;url=http://localhost/becky-lab/T-Level-appointment-system/3a-select.php" );
        echo 'You will be redirected in about 10 secs. If not, please click <a href="http://localhost/becky-lab/T-Level-appointment-system/3a-select.php">here</a>.';
    ?>
    </body>
</html>

