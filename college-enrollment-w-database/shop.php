<?php
    #Allow access to session data
    session_start();

    #Re-dirests user to the login page if not already logged in
    if(!isset($_SESSION['user_id']))
    {
        require_once "login_tools.php";
        load();
    }

    #Set the page title and include a page header
    $page_title = 'Shop';
    include('includes/header.html');

    #Open the database connection
    require_once "../config_db.php";

    #Retrieve all items from the database or show default message
    $q = "SELECT * FROM shop";
    $r = mysqli_query($link, $q);

    if(mysqli_num_rows($r)>0)
    {
        echo'<table><tr>';
        while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
        {
            echo'<td><strong>'.$row['item_name'].
            '</strong><br>'.$row['item_desc'].
            '<br><img src='.$row['item_img'].
            '><br>£'.$row['item_price'].
            '<br><a href="added.php?id='.$row['item_id'].
            '">Add to Cart</a></td>';
        }
        echo'</tr></table>';
        mysqli_close($link);
    }
    else
    {
        echo'<p>There are currently no items in this shop.</p>';
    }

    #Hyperlinks to other pages on the website
    echo'<p><a href="cart.php">View Cart</a> |
    <a href="forum.php">View Forum</a> |
    <a href="home.php">Home</a> |
    <a href="logout.php">Logout</a></p>';

    #Include the footer
    include('includes/footer.html');

?>