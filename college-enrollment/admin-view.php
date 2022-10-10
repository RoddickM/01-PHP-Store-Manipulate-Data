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
            // $time = (!isset ($_POST['time'])) ? NULL: $_POST['time'];
            $first_name = (!isset ($_POST['user'])) ? NULL: $_POST['user'];
            $last_name = (!isset ($_POST['l_name'])) ? NULL: $_POST['l_name'];
            $phone_number = (!isset ($_POST['tel_num'])) ? NULL: $_POST['tel_num'];
            $user_email = (!isset ($_POST['email'])) ? NULL: $_POST['email'];
            $course = (!isset ($_POST['fav_course'])) ? NULL: $_POST['fav_course'];
            $course_level = (!isset ($_POST['level'])) ? NULL: $_POST['level'];

            #Statements to output valid data:
            // if (($time != NULL) && ($user != NULL)) {
            //     echo "<p>Form submitted by $user <br> at $time</p>";
            // }
            date_default_timezone_set('UTC');
            $time = date('H:i, F j, Y');

            echo '<p>Form submitted by '.$first_name.'<br> at '.$time.' </p>';
        ?>

    <br>

    <?php
        if (isset($_POST['definition'])) {
            $definition = $_POST['definition'];
        }
        else {
            $definition = NULL;
        }

        echo "<br>Your name is $first_name $last_name";
        echo "<br>Your email is $user_email";
        echo "<br>Your phone number is $phone_number";
        echo "<br>You chose the $course course for the $course_level level";

    ?>

    </body>
</html>

