<?php
    #Statements to set the page title and include a page header
    $page_title = 'Register';
    include('includes/header.html');
    include('includes/register-form.html');

    #Conditional test that will only execute the statements if 
    #it contains if the form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        #Opens the database connection and creates an array to store
        #error messages
        require_once "../config.php";
        $errors = array();
        $fn = mysqli_real_escape_string($link, trim($_POST['first_name']));

        $ln = mysqli_real_escape_string($link, trim($_POST['last_name']));

        $e = mysqli_real_escape_string($link, trim($_POST['email']));

        $p = mysqli_real_escape_string($link, trim($_POST['pass1']));

        #Stores an error message if the email account is already registered in
        #the database table
        if(empty($errors))
        {
            $q = "SELECT user_id FROM users WHERE email = '$e'";
            $r = mysqli_query($link, $q);

            if(mysqli_num_rows($r) != 0)
            {
                $errors[] = 'Email address already registered. <a href="login.php">Login</a>';
            }
        }

        #If all data is correct the next statments will add user data to database, display
        #confirmation page, close database connection, include html docs and close the script
        if(empty($errors))
        {
            $q = "INSERT INTO users (first_name, last_name, email, pass, reg_date) VALUES('$fn', '$ln', '$e', SHA1('$p'), NOW())";
            $r = mysqli_query($link, $q);

            echo'<h1>Congratulations</h1>
                 <p>You are now registered!</p>
                 <p><a href = "login.php">Login</a></p>';
        }

        #Alternative statements to display all stored error messages when registration cannot be completed
        #and close the database connection
        else
        {
            echo '<h1>ERROR!</h1>
            <p id = "err_msg">The following error(s) have occurred:<br>';
            foreach($errors as $msg)
            {
                echo "- $msg<br>";
            }
            echo'Please try again.</p>';
            mysqli_close($link);
        }

        include('includes/footer.html');
        exit();
    }

    include('includes/footer.html');


?>