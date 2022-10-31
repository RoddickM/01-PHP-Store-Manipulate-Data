<?php

#Function block to insert a statement to load a page specified as its argument
function load($page = 'login.php')
{
    #A URL string of protocol, current domain and directory
    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);

    #Statements to remove any trailing slashes from the URL string,
    #then append a forward slash and the specified page argument
    $url = rtrim($url, '/\\');
    $url.= '/'.$page;

    #Load the specific page, then quite the script
    header("Location: $url");
    exit();
}

#Validate user login details as correct or display error messages
function validate($link, $email = '', $pwd = '')
{
    #Initialise array for error messages
    $errors = array();

    #Store an error message if the email field remains empty,
    #or store its value in a variable
    if(empty($email))
    {
        $errors[] = 'Enter your email address.';
    }
    else
    {
        $e = mysqli_real_escape_string($link, trim($email));
    }

    #Store an error message if the password field remains empty,
    #or store its value in a variable
    if(empty($pwd))
    {
        $errors[] = 'Enter your password.';
    }
    else
    {
        $p = mysqli_real_escape_string($link, trim($pwd));
    }

    #Store an error message if the email and password are not found
    #in the database table, or return the associated user id, first name,
    #and last name to the caller if the login attempt succeeds
    if(empty($errors))
    {
        $q = "SELECT user_id, first_name, last_name FROM users WHERE email = '$e' AND pass = SHA1('$p')";
        $r = mysqli_query($link, $q);

        if(mysqli_num_rows($r)==1)
        {
            $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
            return array(true, $row);
        }
        else
        {
            $errors[] = 'Email address and password not found.';
        }
    }
    return array(false, $errors);
}
?>