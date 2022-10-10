<?php
    // (A) INIT SHOPPING CART SESSION
    session_start();
    if (!isset($_SESSION["cart"])) { $_SESSION["cart"] = []; }

    // (B) STANDARD RESPONSE
    function respond ($status=1, $msg="") {
        exit(json_encode(["status"=>$status, "msg"=>$msg]));
    }
    if (isset($_POST["req"])) { switch ($_POST["req"]) {

        // (C) INVALID
        default: respond(0, "Invalid Request");

        // (D) ADD TO CART
        case "add":
        $qty = &$_SESSION["cart"][$_POST["pid"]];
        if (isset($qty)) { $qty++; } else { $qty = 1; }
        if ($qty > 99) { $qty = 99; }
        respond();

        // (E) CHANGE QUANTITY
        case "set":
        $qty = &$_SESSION["cart"][$_POST["pid"]];
        $qty = $_POST["qty"];
        if ($qty > 99) { $qty = 99; }
        if ($qty <= 0) { unset($_SESSION["cart"][$_POST["pid"]]); }
        respond();
        
        // (F) REMOVE ITEM
        case "del":
        unset($_SESSION["cart"][$_POST["pid"]]);
        respond();

        // (G) NUKE
        case "nuke":
        $_SESSION["cart"] = [];
        respond();

        // (H) GET ALL ITEMS IN CART
        case "get":

        // (H1) EMPTY CART
        if (count($_SESSION["cart"])==0) { respond(1, null); }

        // (H2) GET ITEMS IN CART
        require "1-database.php";
        $sql = "SELECT * FROM `products` WHERE `pid` IN (";
        $sql .= str_repeat("?,", count($_SESSION["cart"]) - 1) . "?";
        $sql .= ")";
        $items = $DB->fetchAll($sql, array_keys($_SESSION["cart"]), "pid");
        
        // (H3) FILTER ILLEGAL PRODUCTS
        if (count($items)==0) {
            $_SESSION["cart"] = [];
            respond(1, null);
        }
        foreach ($_SESSION["cart"] as $pid=>$qty) {
            if (isset($items[$pid])) { $items[$pid]["qty"] = $qty; }
            else { unset($_SESSION["cart"][$pid]); }
        }
        if (count($_SESSION["cart"])==0) { respond(1, null); }
        // (H4) RESPOND
        respond(1, $items);
    }}