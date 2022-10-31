<?php
    session_start();

    #Re-direct the browser to the login page if
    #the user is not already logged in
    if(!isset($_SESSION['user_id']))
    {
        require_once "login_tools.php";
        load();
    }

    #Set the page title and include a page header
    $page_title = 'Home';
    include('includes/header.html');

    #Confirm the named user is logged in
    echo"<h1>HOME</h1>
    <p>You are now logged in, {$_SESSION['first_name']} {$_SESSION['last_name']}</p>";

    echo'<p><a href="logout.php">Logout</a></p>';

    #Include the footer
    include('includes/footer.html');
?>