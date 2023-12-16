<?php
session_start();

 include_once('db_ops/db_connect.php');
 $error = "";

if(isset($_POST['Login']))
{
    if( empty($_POST['email']) && empty($_POST['Pword'])){
            $error_message = "invalid input";
        }
        else{
            $mail = $_POST['email'];
            $password = $_POST['Pword'];

            $sql = "SELECT * FROM user WHERE email = '$mail'";
            $query = $conn->query($sql);

            $result = $query->fetch_assoc();

            function split($elem){
                echo '<pre>';
                print_r($elem);
                echo '</pre>';
            }
    
            // split($result);
            
            if($result){
                if(password_verify($password, $result['password'])){
                    $_SESSION['username'] = $result['user_name'];
                    header("Location:home.php");
                }
                else{
                    $error_message = 'invalid credentials';
                }    
           }
           
       }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <link rel="stylesheet" href="styles/index.css">
</head>
<body>

    <?php 
        if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
        }
    ?>
    <form method="POST" action="">
        <h1>Login</h1>
        <span class="error" ><?= $error_message??NULL?></span>
        <div class="input-region">          
            <input class="fields" type="text" id = "email" name="email" required>
            <label for="email"> Email</label>
        </div>
        <div class="input-region">       
            <input class="fields" type="password" id = "Pword" name="Pword" required>
            <label for="Pword"> Password</label>
        </div>
        <button class="submit" type="submit" value ="Login" name='Login'>Login</button>
        <p>Don't have an account, <a href="Register.php">Register</a></p>
    </form>


</body>
</html>