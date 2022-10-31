<?php
#Test to see if the login form has been submitted
if($_SERVER['REQUEST_METHOD']=='POST')
{
    #Opens the database connection
    require_once "config.php";
    #Create a connection to ensure login tools are available
    require_once "login_tools.php";

    #Ensure login was successful and get associated user details
    #of id, first name and last name
    list($check, $data) = validate($link, $_POST['email'], $_POST['pass']);

    #Set the user details as session data and load a homepage, or assign
    #error message
    if($check)
    {
        session_start();
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['first_name'] = $data['first_name'];
        $_SESSION['last_name'] = $data['last_name'];

        load('home.php');
    }
    else
    {
        $errors = $data;
    }
    
    #Close the database connection
    mysqli_close($link);
}
#Continue the display of the login page when the login attempt fails
include('login.php');
?>