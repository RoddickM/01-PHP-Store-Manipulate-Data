<!DOCTYPE html>
<html>
    <head>
        <title>PHP MySQL Appointment</title>
        <script src="booking-3b-select.js"></script>
        <link rel="stylesheet" href="css/booking-3c-select.css">
        <link rel="stylesheet" href="css/booking-style.css">
    </head>
    <body>
        <div id="page">
            <div class="topNaviagationLink"><a href="index.html">Home</a></div>
            <div class="topNaviagationLink"><a href="about.html">About</a></div>
            <div class="topNaviagationLink"><a href="shop-3-products.php">Shop</a></div>
            <div class="topNaviagationLink"><a href="booking-3a-select.php">Tutor Booking</a></div>
            <div class="topNaviagationLink"><a href="contact.html">Contact</a></div>
            <div class="topNaviagationLink"><a href="login-form.html">Log In</a></div>
        </div>

        <div id="mainPicture">
    	    <div class="picture">

            </div>
        </div>
        <div class="contentBox">
    	    <div class="innerBox">
                <h1>T-Level Tutor Booking!</h1>
            <div class="contentText">
                <?php
                    // (A) LOAD LIBRARY + INIT
                    require "booking-2-lib-appo.php";
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
            </div>
        </div>  
    </body>
</html>