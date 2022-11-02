<style>
    button {
        background-color: #765AAF;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        }
            
    button:hover {
        opacity: 0.8;
        }
</style>

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

    echo '<h1>Shop</h1>';

    #Open the database connection
    require_once "config.php";

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
            '><br><strong>£'.$row['item_price'].
            '</strong><br><a href="added.php?id='.$row['item_id'].
            '"><button>Add to Cart</button></a></td>';
        }
        echo'</tr></table>';
        mysqli_close($link);
    }
    else
    {
        echo'<p>There are currently no items in this shop.</p>';
    }

    #Include the footer
    include('includes/footer.html');

?>