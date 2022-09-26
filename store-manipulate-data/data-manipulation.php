<!DOCTYPE html>

<html lang="en">
    <meta charset="UTF-8">
    <title>Matrix</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .themed-grid-col {
            padding-top: .75rem;
            padding-bottom: .75rem;
            background-color: rgba(86, 61, 124, .15);
            border: 1px solid rgba(86, 61, 124, .2);
        }
    </style>

    <body class="py-4">
    <div class="row mb-3 text-center">
        <div class="col-md-4 themed-grid-col">
        <?php
            $name_and_age = array(
                array('Name' => 'Mitchell', 'Age' => 17),
                array('Name' => 'Derron', 'Age' => 17),
                array('Name' => 'Omarion', 'Age' => 19),
                array('Name' => 'Ela', 'Age' => 17),
                array('Name' => 'Jake', 'Age' => 18),
                array('Name' => 'Alex', 'Age' => 17),
                array('Name' => 'Rana', 'Age' => 19),
                array('Name' => 'Rehman', 'Age' => 19),
                array('Name' => 'Nour', 'Age' => 19),
                array('Name' => 'Temi', 'Age' => 18),
                array('Name' => 'Noman', 'Age' => 18),
                array('Name' => 'Taylor', 'Age' => 18),
                array('Name' => 'Roddick', 'Age' => 17),
                array('Name' => 'Elizabete', 'Age' => 17),
            );
            
            echo "<p>Sorted by name:</p>";
            $key_values = array_column($name_and_age, 'Name');
            array_multisort($key_values, SORT_ASC, $name_and_age);

            foreach($name_and_age as $name_sorted)
            echo "&bull;", "NAME: ".implode('    |    AGE: ', $name_sorted) ."<br>";
        ?>
        </div>

        <div class="col-md-4 themed-grid-col">
        <?php
            $name_and_age = array(
                array('Name' => 'Mitchell', 'Age' => 17),
                array('Name' => 'Derron', 'Age' => 17),
                array('Name' => 'Omarion', 'Age' => 19),
                array('Name' => 'Ela', 'Age' => 17),
                array('Name' => 'Jake', 'Age' => 18),
                array('Name' => 'Alex', 'Age' => 17),
                array('Name' => 'Rana', 'Age' => 19),
                array('Name' => 'Rehman', 'Age' => 19),
                array('Name' => 'Nour', 'Age' => 19),
                array('Name' => 'Temi', 'Age' => 18),
                array('Name' => 'Noman', 'Age' => 18),
                array('Name' => 'Taylor', 'Age' => 18),
                array('Name' => 'Roddick', 'Age' => 17),
                array('Name' => 'Elizabete', 'Age' => 17),
            );

            echo "<p>Sorted by age:</p>";
            $key_values = array_column($name_and_age, 'Age');
            array_multisort($key_values, SORT_ASC, $name_and_age);

            foreach($name_and_age as $name_sorted)
            echo "&bull;", "NAME: ".implode('   |   AGE: ', $name_sorted) ."<br>";
            
         
        ?>
        </div>
    </div>

    <!--<div class="row mb-3 text-center">
      <div class="col-4 themed-grid-col">.col-4</div>
      <div class="col-4 themed-grid-col">.col-4</div>
      <div class="col-4 themed-grid-col">.col-4</div>
    </div>-->

    </body>
</html>