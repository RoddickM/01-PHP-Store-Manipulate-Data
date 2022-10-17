<!DOCTYPE html>
<html>
    <head>
        <title>PHP MySQL Appointment</title>
        <script src="3b-select.js"></script>
        <link rel="stylesheet" href="3c-select.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="topnav" id="myTopnav">
            <a href="#home"><img src="img/T-Levels-only-LOGO.jpg" id="nav-img"></a>
            <a href="#home" class="active">Home</a>
            <a href="#news">News</a>
            <a href="#contact">Contact</a>
            <a href="#about">About</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <?php
            // (A) LOAD LIBRARY + INIT
            require "2-lib-appo.php";
            $start = strtotime("+".APPO_MIN." day");
            $end = strtotime("+".APPO_MAX." day");
            $booked = $_APPO->get(date("Y-m-d", $start), date("Y-m-d", $end));
        ?>
        <!-- (B) SELECT APPOINTMENT DATE/SLOT -->
        <table id="select">
        <!-- (B1) FIRST ROW : HEADER CELLS -->
        <tr>
        <th></th>
        <?php foreach (APPO_SLOTS as $slot) { echo "<th>$slot</th>"; } ?>
        </tr>
        <!-- (B2) FOLLOWING ROWS : DAYS -->
        <?php
            for ($unix=$start; $unix<=$end; $unix+=86400) {
                $thisDate = date("Y-m-d", $unix);
                echo "<tr><th>$thisDate</th>";
                foreach (APPO_SLOTS as $slot) {
                    if (isset($booked[$thisDate][$slot])) {
                        echo "<td class='booked'>Booked</td>";
                    } 
                    else {
                        echo "<td onclick=\"select(this, '$thisDate', '$slot')\"></td>";
                    }
                }
            echo "</tr>";
            }
        ?>
        </table>
        <!-- (C) CONFIRM -->
        <form id="confirm" method="post" action="4-book.php">
            <!-- DUMMY USER, FIXED TO 1 FOR DEMO -->
            <input type="hidden" name="user" value="1">
            <input type="text" id="cdate" name="date" readonly placeholder="Select a time slot above">
            <input type="text" id="cslot" name="slot" readonly>
            <input type="submit" id="cgo" value="Go" disabled> 
        </form>
    </body>
</html>