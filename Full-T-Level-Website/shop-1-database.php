<?php
// (A) DATABASE CLASS
class DB {
    // (A1) CONSTRUCTOR - CONNECT TO DATABASE
    private $pdo = null;
    private $stmt = null;
    public $lastID = null;
    public $error = "";
    function __construct() {
        try {
            $this->pdo = new PDO(
                "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
                DB_USER, DB_PASSWORD, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (Exception $ex) { exit($ex->getMessage()); }
    }
    // (A2) DESTRUCTOR - CLOSE DATABASE CONNECTION
    function __destruct() {
        if ($this->stmt !== null) { $this->stmt = null; }
        if ($this->pdo !== null) { $this->pdo = null; }
    }
    // (A3) EXECUTE SQL QUERY
    function exec ($sql, $data=null) {
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($data);
            $this->lastID = $this->pdo->lastInsertId();
            return true;

        } catch (Exception $ex) {
            $this->error = $ex->getMessage();
            return false;
        }
    }
    // (A4) FETCH ALL
    function fetchAll ($sql, $data=null, $key=null) {
        if ($this->exec($sql, $data)===false) { return false; }
        if ($key===null) { return $this->stmt->fetchAll(); }
        else {
            $res = [];
            while ($r = $this->stmt->fetch()) { $res[$r[$key]] = $r; }
            return $res;
        }
    }
    // (A5) AUTOCOMMIT OFF
    function start () {
        $this->pdo->beginTransaction();
    }
    function end ($pass=true) {
        if ($pass) { $this->pdo->commit(); }
        else { $this->pdo->rollBack(); }
    }
}
// (B) DATABASE SETTINGS - CHANGE TO YOUR OWN!
define("DB_HOST", "localhost");
define("DB_NAME", "products");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "");
// (C) NEW CART OBJECT
$DB = new DB();