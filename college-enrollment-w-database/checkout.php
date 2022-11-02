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
    $page_title = 'Checkout';
    include('includes/header.html');

    #Store the shopping cart items in the database or provide a default message
    if(isset($_GET['total']) && ($_GET['total'] > 0) && (!empty($_SESSION['cart'])))
    {
        #Open the database connection
        require_once "../config_db.php";
        #Store the user ID, total order value and current date/time in the orders database table
        $q = "INSERT INTO orders (user_id, total, order_date) VALUES (".$_SESSION['user_id'].",".$_GET['total'].", NOW())";
        $r = mysqli_query($link, $q);

        #Retrieve the current order number
        $order_id = mysqli_insert_id($link);
        #Retrieve the selected cart item details from the shop database table
        $q = "SELECT * FROM shop WHERE item_id IN (";
        foreach($_SESSION['cart'] as $id => $value)
        {$q.=$id.',';}
        $q = substr($q, 0, -1).') ORDER BY item_id ASC';
        $r = mysqli_query($link, $q);

        #Store item details in the in the order_contents database table
        while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
        {
            $query = "INSERT INTO order_contents (order_id, item_id, quantity, price) VALUES ($order_id, ".$row['item_id'].",".
            $_SESSION['cart'][$row['item_id']]['quantity'].",".
            $_SESSION['cart'][$row['item_id']]['price'].")";

            $result = mysqli_query($link, $query);
        }

        #Close the database connection, display a confirmation message and empty the cart
        mysqli_close($link);
        echo"<p>Thanks for your order.  Your order number is #".$order_id."</p>";
        $_SESSION['cart'] = NULL;
    }
    else
    {
        echo'<p>There are no items in your cart.</p>';
    }

    echo'<p><a href = "shop.php">Shop</a> |
    <a href="forum.php">Forum</a> |
    <a href="home.php">Home</a> |
    <a href="logout.php">Logout</a></p>';

    #Include the footer
    include('includes/footer.html');
?>