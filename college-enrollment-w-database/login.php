<?php
    require_once "login_tools.php";

    #Statements to set the page title and include a page header
    $page_title = 'Login';
    include('includes/header.html');
    include('includes/login-form.html');

    #Conditional test that will display any error messages if they
    #exist and provide a hyperlink back to the registration page if the login fails
    if(isset($errors) && !empty($errors))
    {
        echo'<p id ="err_msg">Error: The following issue(s) have arisen:<br>';
        
        foreach($errors as $msg)
        {
            echo"-$msg<br>";
        }
        echo'Please try again or <a href="register.php">Register</a></p>';
    }
?>

<?php include('includes/footer.html');?>