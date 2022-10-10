<?php
// (A) CHECK CART
session_start();
if (!isset($_SESSION["cart"]) || count($_SESSION["cart"])==0) {
    exit("Cart is empty");
}
// (B) DATABASE - AUTOCOMMIT OFF
require "1-database.php";
$DB->start();
// (C) MAIN ORDER - USE YOUR OWN DETAILS FOR THIS EXAMPLE
$name = "Roddick Mujib";
$email = "roddicktsqib@gmail.xom";
$pass = $DB->exec(
    "INSERT INTO `orders` (`name`, `email`) VALUES (?,?)",
    [$name, $email]
);
// (D) ORDER ITEMS
if ($pass) {
 // (D1) INSERT SQL
    $sql = "INSERT INTO `orders_items` (`oid`, `pid`, `qty`) VALUES ";
    $sql .= str_repeat("(?,?,?),", count($_SESSION["cart"]));
    $sql = substr($sql, 0, -1) . ";";
    // (D2) INSERT DATA
    $data = [];
    foreach ($_SESSION["cart"] as $pid=>$qty) {
        $data[] = $DB->lastID;
        $data[] = $pid;
        $data[] = $qty;
    }
    // (D3) GO!
    $pass = $DB->exec($sql, $data);
}
// (E) COMMIT OR DISCARD?
$DB->end($pass);
if ($pass) { $_SESSION["cart"] = []; }
echo $pass ? "DONE!" : $DB->error;
