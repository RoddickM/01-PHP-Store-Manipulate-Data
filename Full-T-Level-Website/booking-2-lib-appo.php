<?php
class Appointment {
    // (A) CONSTRUCTOR - CONNECT TO DATABASE
    private $pdo = null;
    private $stmt = null;
    public $error = "";
    function __construct () { try {
    $this->pdo = new PDO(
        "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
        DB_USER, DB_PASSWORD, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    } catch (Exception $ex) { exit($ex->getMessage()); }}

    // (B) DESTRUCTOR - CLOSE DATABASE CONNECTION
    function __destruct () {
        if ($this->stmt!==null) { $this->stmt = null; }
        if ($this->pdo!==null) { $this->pdo = null; }
    }

    // (C) HELPER FUNCTION - EXECUTE SQL QUERY
    function query ($sql, $data=null) {
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute($data);
    }

    // (D) GET APPOINTMENTS IN DATE RANGE
    function get ($from, $to) {
        $this->query(
            "SELECT * FROM `appointments` WHERE `appo_date` BETWEEN ? AND ?",
            [$from, $to]
        );
        
        $res = [];
        while ($r = $this->stmt->fetch()) {
            $res[$r["appo_date"]][$r["appo_slot"]] = $r["user_id"];
        }
        return $res;
    }

    // (E) SAVE APPOINTMENT
    function save ($date, $slot, $user) {

        // (E1) CHECK SELECTED DATE
        $min = strtotime("+".APPO_MIN." day");
        $max = strtotime("+".APPO_MAX." day");
        $unix = strtotime($date);

        if ($unix<$min || $unix<$max) {
            $this->error = "Date must be between ".date("Y-m-d", $min)." and ".date("Y-m-d", $max);
        }

        // (E2) CHECK PREVIOUS APPOINTMENT
        $this->query(
            "SELECT * FROM `appointments` WHERE `appo_date`=? AND `appo_slot`=?",
            [$date, $slot]
        );

        if (is_array($this->stmt->fetch())) {
            $this->error = "$date $slot is already booked";
            return false;
        }

        $this->query(
            "INSERT INTO `appointments` (`appo_date`, `appo_slot`, `user_id`) VALUES (?,?,?)",
            [$date, $slot, $user]
            );

        return true;
    }
}

// (F) APPOINTMENT DATES & SLOTS - CAN BE CHANGED TO YOUR OWN
define("APPO_SLOTS", ["9AM - 10AM", "10AM - 11AM", "11AM - 12AM", "1PM - 2PM", "2AM - 3AM"]);
define("APPO_MIN", 1); // next day
define("APPO_MAX", 7); // next week

// (G) DATABASE SETTINGS - CHANGE TO YOUR OWN!
define("DB_HOST", "localhost");
define("DB_NAME", "appointment_system");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "");

// (H) NEW APPOINTMENT OBJECT
$_APPO = new Appointment();