<!DOCTYPE html>
<html>
    <head>
        <title>Products Page Demo</title>
        <link rel="stylesheet" href="css/shop-3-products.css"/>
        <script src="shop-5-cart.js"></script>
    </head>
    <body>
        
        <div id="page">
            <div class="topNaviagationLink"><a href="index.html">Home</a></div>
            <div class="topNaviagationLink"><a href="#">About</a></div>
            <div class="topNaviagationLink"><a href="shop-3-products.php">Shop</a></div>
            <div class="topNaviagationLink"><a href="booking-3a-select.php">Tutor Booking</a></div>
            <div class="topNaviagationLink"><a href="#">Contact</a></div>
            <div class="topNaviagationLink"><a href="#">Log In</a></div>
        </div>

        <div id="mainPicture">
    	    <div class="picture">

            </div>
        </div>
        <div class="contentBox">
    	    <div class="innerBox">
                <h1>T-Level Shop!</h1>
            <div class="contentText">
                <!-- (A) PRODUCTS -->
                <div id="products"><?php
                // (A1) GET ALL PRODUCTS
                require "shop-1-database.php";
                $products = $DB->fetchAll("SELECT * FROM `products`");
                // (A2) PRODUCTS LIST
                foreach ($products as $p) { ?>

                <div class="pCell">
                <div class="pTxt">
                <div class="pName"><?=$p["name"]?></div>
                <div class="pPrice">£<?=$p["price"]?></div>
                </div>
                <img class="pImg" src="<?=$p["image"]?>"/>
                <button class="pAdd" onclick="cart.add(<?=$p["pid"]?>)">
                    Add To Cart
                </button>
                </div>
                <?php } ?>
                </div>
                <!-- (B) CURRENT CART -->
                <div id="cart"></div>

            </div>
        </div>    
    </body>
</html>