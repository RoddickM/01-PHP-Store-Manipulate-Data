<!DOCTYPE html>

<html lang="en">
    <meta charset="UTF-8">
    <title>Matrix</title>

    <body>
        <?php
            $name_and_age = array('Mitchell'=> 17, 
                          'Derron' => 17, 
                          'Omarion' => 19, 
                          'Ela' => 17, 
                          'Jake' => 18, 
                          'Alex' => 17, 
                          'Rana' => 19, 
                          'Rehman' => 19, 
                          'Nour' => 19, 
                          'Temi' => 18, 
                          'Noman' => 18, 
                          'Taylor' => 18, 
                          'Elizabete' => 17, 
                          'Roddick' => 17);

            ksort($name_and_age);
            echo "<dt>Sort by name:<dt>";
            foreach($name_and_age as $key => $value) {
                echo "&bull;", "Name: ".$key. " | Age: ".$value.'<br>';
            }

            echo "<br>";

            asort($name_and_age);
            echo "<dt>Sort by age:<dt>";
            foreach($name_and_age as $key => $value) {
                echo "&bull;", "Name: ".$key. " | Age: ".$value.'<br>';
            }
        ?>
    </body>
</html>