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
    $page_title = 'Cart Addition';
    include('includes/header.html');

    #Assign the passed item ID to a variable
    if(isset($_GET['id'])) $id = $_GET['id'];

    #Open the database connection
    require_once "../config.php";

    #Retrieve the selected items from the database
    $q = "SELECT * FROM shop WHERE item_id = $id";
    $r = mysqli_query($link, $q);
    if(mysqli_num_rows($r)==1)
    {
        $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
        
        #Add the selected item to the cart and display confirmation
        if(isset($_SESSION['cart']['$id']))
        {
            $_SESSION['cart'][$id]['quantity']++;
            echo'<p>Another '.$row["item_name"].
            ' has been added to your cart.</p>';
        }
        else
        {
            $_SESSION['cart'][$id]=array ('quantity' => 1, 'price' => $row['item_price']);
            echo'<p>A '.$row["item_name"].
            ' has been added to your cart.</p>';
        }
        mysqli_close($link);
    }

    #Hyperlinks to other pages on the website
    echo'<p><a href="cart.php">View Cart</a> |
    <a href="shop.php">Return to Shop</a> |
    <a href="forum.php">View Forum</a> |
    <a href="home.php">Home</a> |
    <a href="logout.php">Logout</a></p>';

    #Include the footer
    include('includes/footer.html');

?>