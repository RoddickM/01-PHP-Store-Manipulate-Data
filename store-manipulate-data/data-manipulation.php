<!DOCTYPE html>

<html lang="en">
    <meta charset="UTF-8">
    <title>Data Manipulation</title>

    <body>
        <!-- This section is an explanation section made to help give user context onm what the page is about -->
        <h1>Data Manipulation demonstration</h1>
        <p>In this web page we have a number of demonstrations of manipulating data from an array using PHP.
            It will include various methods such as ordering by age, name, finding out whether they are older/younger than you
            and whether or not they are above or below a certain age.
        </p>

        <!-- START OF PHP SECTION -->
        <?php
        // Constants for name of colleg and course to be used in introductions and texts
        define('COLLEGE_NAME','The Manchester College');
        define('COURSE_NAME', 'T-Level Digital Production Design and Development');
        
        // Explanation of whether data from using the constants.
        echo "<p>The data for this course is collected from the ".COLLEGE_NAME."'s ".COURSE_NAME." course students</p>";
        // An array that stores the data.
        // Stored this way for easier method fo recall
        // List looks like this: ((A, B), (C, D), (E, F))
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
            
            // Explaining what data will be shown
            echo "<p>Students sorted by name:</p>";
            // Retrieving the Names from the array so that in can be sorted using the 
            // array_multisort function below.
            $key_values = array_column($name_and_age, 'Name');
            // The function below has easy readability, and can be quite flexible
            array_multisort($key_values, SORT_ASC, $name_and_age);

            // For loop that loops through the array
            foreach($name_and_age as $name_sorted) {
                // Loop gets displayed as bullet points with implode function used to make convert it from array to string
                // Might be able to change it for a more better looking approach
                echo "&bull;", "NAME: ".implode('    |    AGE: ', $name_sorted) ."<br>";
            }
            
            // Breaking the sections
            echo "<br>";
            echo "<br>";

            // Another explanation
            echo "<p>Students sorted by age:</p>";
            // Same as last time but this time it is sorted by age
            $key_values = array_column($name_and_age, 'Age');
            array_multisort($key_values, SORT_ASC, $name_and_age);

            foreach($name_and_age as $age_sorted) {
                // Also same display method as last time
                echo "&bull;", "NAME: ".implode('   |   AGE: ', $age_sorted) ."<br>";
            }

            // Breaking the sections
            echo "<br>";
            echo "<br>";

            // Variable below is the start for alculating the average age
            $culm_var = 0;
            // Loops through the ages in the list and added them together
            // This is similar to what it would be like in a python loop
            for($i = 0; $i < count($name_and_age); $i++) {
                $culm_var += $name_and_age[$i]['Age'];
            }
            
            // Below calculates the average age and displsys it
            $average_age = $culm_var / count($name_and_age);
            echo "Average age of students is: " .round($average_age, 1);
            
            // Breaking the sections
            echo "<br>";
            echo "<br>";

            // Below section explains for displaying whether teh studens are over my age (17) as of 06/10/2022
            // Same for loop as the one for calculating average age but it has an if-else statement in it
            echo "<p>Students over 17(Roddick's age):</p>";
            for($i = 0; $i < count($name_and_age); $i++) {
                // local variable for readibility
                $student_age = $name_and_age[$i]['Age'];
                // Checks if student is over my age (17) as of 06/10/2022 and prints a message
                if ($student_age > 17) {
                    echo 'NAME: '.$name_and_age[$i]['Name'].' | OVER 17?: TRUE<br>';
                }
                // If it isnt over a certain valkue then it will print another message
                else{
                    echo 'NAME: '.$name_and_age[$i]['Name'].' | OVER 17?: FALSE<br>';
                }
            }

            // Breaking the sections
            echo "<br>";
            echo "<br>";

            // Similar section to the one that checks if you are over 17
            // this one checks if you are 18 or over
            // Similar explanation
            echo "<p>Students split for over and under 18:</p>";
            // Similar explanation to the previous section with the same variable names in the for loop
            for($i = 0; $i < count($name_and_age); $i++) {
                // local variable for readibility
                $student_age = $name_and_age[$i]['Age'];
                if ($student_age >= 18) {
                    echo 'NAME: '.$name_and_age[$i]['Name'].' is 18 or over<br>';
                }
                else {
                    echo 'NAME: '.$name_and_age[$i]['Name'].' is under 18<br>';
                }
            }
        
        // ----------------Closing Tag----------------
        ?>

    </body>
</html>