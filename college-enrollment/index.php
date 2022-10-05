<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>College Sign Up</title>
    </head>
    <body>
        <!--This is the forms section for entering personal details -->
        <form action="" method="POST">
            <fieldset>
                <legend>Enter your personal details below. Please fill in all the fields.</legend>
                <p>First Name: <input 
                type="text" 
                name="f_name" 
                value="<?php if (isset($_POST['f_name'])) echo $_POST['f_name']; ?>"></p>
                <p>Last Name: <input 
                type="text" 
                name="l_name"
                value="<?php if (isset($_POST['l_name'])) echo $_POST['l_name']; ?>"></p>
                <p>Address: <input 
                type="text" 
                name="address"
                value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>"></p>
                <p>Email: <input 
                type="text" 
                name="email"
                value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"></p>
                <p>Telephone Number: <input 
                type="text" 
                name="tel_num"
                value="<?php if (isset($_POST['tel_num'])) echo $_POST['tel_num']; ?>"></p>
            </fieldset>

            <p><input type="submit"></p>

            <fieldset>
                <legend>Choose on of the following T-Level courses.</legend>
                <input type="radio" id="dpdd" name="fav_language" value="DPDD">
                <label for="dpdd">Digital Production Design and Development</label><br>
                <input type="radio" id="dbs" name="fav_language" value="DBS">
                <label for="dbs">Digital Business Services</label><br>
                <input type="radio" id="dss" name="fav_language" value="DSS">
                <label for="dss">Digital Support Services</label>
            </fieldset>

            <fieldset>
                <legend>Choose the level of the course you want to be in.</legend>
                <input type="radio" id="beginner" name="fav_language" value="beginner">
                <label for="beginner">Beginner</label><br>
                <input type="radio" id="intermediate" name="fav_language" value="intermediate">
                <label for="intermediate">Intermediate</label><br>
                <input type="radio" id="advanced" name="fav_language" value="advanced">
                <label for="advanced">Advanced</label>
            </fieldset>

        </form>

        
        
        <?php
            date_default_timezone_set('UTC');
            $time = date('H:i, F j, Y');

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                #Create array for error messages:
                $errors = array();
                #Initialise variables with submitted values, or
                #add to the errors array for omissions

                #First name error
                if(empty($_POST['f_name'])) {
                    $errors[] = 'First name';
                }
                else {
                    $f_name = trim($_POST['f_name']);
                }


                #Last name error
                if(empty($_POST['l_name'])) {
                    $errors[] = 'Last name';
                }
                else {
                    $l_name = trim($_POST['l_name']);
                }


                #Adress error
                if(empty($_POST['address'])) {
                    $errors[] = 'Address';
                }
                else {
                    $address = trim($_POST['address']);
                }


                #Email error
                if(empty($_POST['email'])) {
                    $errors[] = 'Email';
                }
                else {
                    $email = trim($_POST['email']);
                }


                #Telephone number error
                if(empty($_POST['tel_num'])) {
                    $errors[] = 'Telephone number';
                }
                else {
                    $tel_num = trim($_POST['tel_num']);
                }

                #Write error messages or confirm successful form submission
                if(!empty($errors)) {
                    echo 'Error, please enter your ';
                    foreach ($errors as $msg) {
                        echo "-$msg ";
                    }
                }
                else {
                    echo "Success! Thanks for completing your personal details $f_name!";
                }
            }


        ?>

        
    </body>
</html>