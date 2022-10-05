<!DOCTYPE HTML>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sending Hidden Data</title>
    </head>
    <body>

    <?php
            #Statements to initialise variables if the
            #hidden form field values have been set
            $time = (!isset ($_POST['time'])) ? NULL: $_POST['time'];
            $user = (!isset ($_POST['user'])) ? NULL: $_POST['user'];

            #Statements to output valid data:
            if (($time != NULL) && ($user != NULL)) {
                echo "<p>Form submitted by $user <br> at $time</p>";
            }
        ?>

    </body>
</html>

