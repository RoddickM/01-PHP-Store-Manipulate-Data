<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>College Sign Up</title>
        <link rel ="stylesheet" href ="css/enrollment_page.css">
    </head>
    <body>
        <?php
            include('includes/header.html');
            echo "<h1>Enrollment Form</h1>"
        ?>
        <!--This is the forms section for entering personal details -->
        <form action="enrollment.php" method="POST">
            <!-- Enter user's details -->
            <fieldset>
                <legend>Enter your personal details below. Please fill in all the fields.</legend>
                <label>First Name: </label>
                <input 
                type="text" 
                name="f_name" 
                value="<?php if (isset($_POST['f_name'])) echo $_POST['f_name']; ?>" required>

                <label>Last Name: </label>
                <input 
                type="text" 
                name="l_name"
                value="<?php if (isset($_POST['l_name'])) echo $_POST['l_name']; ?>" required>

                <label>Address: </label>
                <input 
                type="text" 
                name="address"
                value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>" required>
                
                <label>Email: </label>
                <input 
                type="text" 
                name="email"
                value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required>

                <label>Telephone Number: </label>
                <input 
                type="text" 
                name="tel_num"
                value="<?php if (isset($_POST['tel_num'])) echo $_POST['tel_num']; ?>" required>
            </fieldset>

            <!-- Choosing the T-LEVEL course -->
            <fieldset>
                <legend>Choose on of the following T-Level courses.</legend>
                <label class="radio-container">Digital Production Design and Development
                <input type="radio" id="dpdd" name="fav_course" value="DPDD" checked="checked" required>
                <span class="checkmark"></span>
                </label>
                <label class="radio-container">Digital Business Services
                <input type="radio" id="dbs" name="fav_course" value="DBS" required>
                <span class="checkmark"></span>
                </label>
                <label class="radio-container">Digital Support Services
                <input type="radio" id="dss" name="fav_course" value="DSS" required>
                <span class="checkmark"></span>
                </label>
            </fieldset>
            <!-- Choosing the level of the course -->
            <fieldset>
                <legend>Choose the level of the course you want to be in.</legend>
                <label class="radio-container">Beginner
                <input type="radio" id="beginner" name="level" value="Beginner" checked="checked" required>
                <span class="checkmark"></span>
                </label>
                <label class="radio-container">Intermediate
                <input type="radio" id="intermediate" name="level" value="Intermediate" required>
                <span class="checkmark"></span>
                </label>
                <label class="radio-container">Advanced
                <input type="radio" id="advanced" name="level" value="Advanced" required>
                <span class="checkmark"></span>
                </label>
            </fieldset>

            <fieldset>
                <legend>If you have any comments for the enrollment, please type below.</legend>
                <textarea name="comment" class="comment"></textarea>
            </fieldset>

            <button type="submit">Submit</button>
        </form>

        
        
        <?php
            require_once "../config.php";

            date_default_timezone_set('UTC');
            $time = date('H:i, F j, Y');
            

            $q = 'SHOW TABLES';

            $r = mysqli_query($link, $q);

            if($r){
                echo "";
            }
            else{
                echo '<p>'.mysqli_erro($link).'</p>';
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                #Create array for error messages:
                $errors = array();
                #Initialise variables with submitted values, or
                #add to the errors array for omissions

                #First name error
                    $f_name = trim($_POST['f_name']);
                #Last name error
                    $l_name = trim($_POST['l_name']);
                #Adress error
                    $address = trim($_POST['address']);
                #Email error
                    $email = trim($_POST['email']);
                #Telephone number error
                    $tel_num = trim($_POST['tel_num']);
                #Course error
                    $tel_num = trim($_POST['fav_course']);
                #Course level error
                    $tel_num = trim($_POST['level']);
                #Submit query to database
                    echo "Success! Thanks for completing your personal details $f_name!";
                    $insert_enrollment_query  = "INSERT INTO college_enrollment (first_name, last_name, address, email, phone_number, course_type, course_level, comments, date_submitted) VALUES ('".$_POST["f_name"]."', '".$_POST["l_name"]."', '".$_POST["address"]."', '".$_POST["email"]."', '".$_POST["tel_num"]."', '".$_POST["fav_course"]."', '".$_POST["level"]."', '".$_POST["comment"]."', '".$time."')";
                    mysqli_query($link, $insert_enrollment_query);
                }
            
            
            include('includes/footer.html')
        ?>

        
    </body>
</html>