<!DOCTYPE html>

<html lang="en">
    <meta charset="UTF-8">
    <title>Matrix</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <body>

    <form action="calculator.php" method="get">
        <p>First number: <input type="text" name="num1"></p>
        <p>Second number: <input type="text" name="num2"></p>
        <p>Operator: <input type="text" name="operator"></p>
        <input type="submit">
    </form>

        <?php
            <?php
        if(empty ($_GET["num1"]) and empty ($_GET["num2"])) {
            echo "";
        }

         $operator = $_GET["operator"];
         switch($operator) {
             case "+": echo "Result: ". $_GET["num1"] + $_GET["num2"];
             break;
             case "-": echo "Result: ". $_GET["num1"] - $_GET["num2"];
             break;
             case "*": echo "Result: ". $_GET["num1"] * $_GET["num2"];
             break;
             case "/": echo "Result: ". $_GET["num1"] / $_GET["num2"];
             break;
             default: echo "No data has been input";
         }
        echo "<br> <br>";
        for($i = 1; $i < 6; $i++) {
            echo "<dt> multiplications of $i";

            for ($j = 1; $j < 6; $j++) {
                $total = $i * $j;
                echo "<dd> $i x $j = $total";
            }
        }
            
        ?>

    </body>
</html>