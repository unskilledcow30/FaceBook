<?php
session_start();

include_once('db_ops/db_connect.php');

if(isset($_POST['submit']))
{

    $email_error = $pass_error = $passconf_error = "";
    $name = htmlspecialchars($_POST['Uname']);

    // input validation

    $test = 1;
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $email = $_POST['email'];
    }else{
        $email_error = "Invalid Email Address";
        $test = 0;
    }
    $pwd = $_POST['Pword'];
    $pwdconf = $_POST['Pwordconf'];

    if(strlen($pwd) < 5){
        $pass_error = "Password must be atleast 5 xters";
        $test = 0;
    }elseif($pwd != $pwdconf){
        $passconf_error = "Passwords must match";
        $test = 0;
    }

    $password = password_hash($pwd, PASSWORD_BCRYPT);

    $age = $_POST['age'];
    $phone = $_POST['phone'];

    if($test == 0){
        $_SESSION['message'] = '<script>alert("Registration Not successful") </script>';
    }else{
        // Database insertion
        $insert = "insert into user values (null , ?, ?, ?, ?, ?)";

        $statement = $conn->prepare($insert);
        $statement->bind_param("sssis", $name, $email, $password, $age, $phone);

        $statement->execute();

        $_SESSION['message'] = '<script>alert("Registration successful") </script>';

        header("Location: index.php");

        $statement->close();
        exit;
    }   

}
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/register.css">
</head>
<body>

    <?php 
        if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
        }
    ?>
    <form METHOD="POST" id="Register">
        <h1>Register</h1>
        <div class="carousel">
            <div class="slider">
                <div class="slider-section">
                    <div class="input-region">
                        
                        <input class="fields" type="text" id = "Uname" name = "Uname" required>
                        <label for = "Uname"> User name </label>       
                    </div>
                    <div class="input-region">
                        
                        <input class="fields" type="email" id = "email" name = "email" required>
                        <label for="email"> Email</label>
                    </div>
                    <span class="error" ><?= $email_error??NULL?></span>
                    <div class="input-region">
                        
                        <input class="fields" type="password" id = "Pword" name = "Pword" required>
                        <label for="Pword"> Password</label>
                    </div>
                    <span class="error" ><?= $pass_error??NULL?></span>
                    <span class="dir" onclick="swap(1)"> Next</span>
                   
                </div>
                <div class="slider-section">
                <div class="input-region">
                        
                        <input class="fields" type="password" id = "Pwordconf" name = "Pwordconf" required>
                        <label for="Pwordconf"> Password Confirmation</label>
                    </div>
                    <span class="error" ><?= $passconf_error??NULL?></span>
                    <div class="input-region">
                        
                        <input class="fields" type='tel' id = "phone_number" name = "phone" required>
                        <label for="Phone_number"> Tel:</label>
                    </div>
                    <div class="input-region">
                        
                        <input class="fields" type="number" id = "age" name = "age" required>
                        <label for="age"> age:</label>
                    </div>
                        
                    <div class="submit-section">
                        <span class="dir" onclick="swap(0)">Previous</span>
                        <button class="submit" type="submit" name= 'submit' value ="Submit">Register</button>
                    </div>
                    
                </div>
            </div>      
        </div>
        
       
        <p>Already have an account, <a href="index.php">Login</a></p>
    </form>
        
    <script src="js/index.js"></script>
</body>
</html>
