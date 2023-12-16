<?php
session_start();
// $email=  "nolgmail.com";
// $password = "ADANOL123";
if($_POST)
{
    // if($_POST["email"] == $email){
        // if($_POST["password"]==$password){
            $name = $_POST['Uname'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $pwd = $_POST['Pword'];
            $phone = $_POST['phone'];

            
            // $_SESSION["email"]==$email;
            // $_SESSION["password"]==$password;
            // $_SESSION["phone"]==$phone;
            // $_SESSION["age"]==$age;

            $con = mysqli_connect("localhost" ,"root" ,"ADANOL123" ,"facebook");
            $insert = "insert into user values (null ,'$name' ,'$email' ,'$pwd','$phone', $age)";
            $query = mysqli_query($con , $insert);

            header("location: login.php");
            exit;
    //     }else{
    //         $_SESSION['message']="Username or password invalid";
    //     }
    // }else{
    //     $_SESSION['message']="Username or password invalid";
    // }
}
if(isset($_SESSION['message']))
{
    $message = $_SESSION['message'];
}else{
    $message = "";
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <style>
.form
    {
        border: inset;
        border-radius: 10%;
        width: 300px;
        height: 300px;
        background-color: #e7eae770;
        margin-top: 250px;
        padding: 20px;
        border-color: blueviolet;
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
    }
    </style>
    <body>
        <div align=center >
            <form METHOD="POST">
            <table >
              
        <tr>
            <td>
                <label for = "Uname"> User name: </label><br>
                <input class="fields" type="text" id = "Uname" name = "Uname">
            </td>
        </tr>
        </tr>
        <tr>
            <td>
                <label for="Pword"> Password:</label><br>
                <input class="fields" type="password" id = "Pword" name = "Pword">
                </td>
        </tr>
        <tr>
            <td>
                <label for="Phone_number"> Tel:</label><br>
                <input class="fields" type='tel' id = "phone_number" name = "phone">
                </td>
        </tr>
        <tr>
            <td>
                <label for="email"> email:</label><br>
                <input class="fields" type="text" id = "email" name = "email">
                </td>
        </tr>
        <tr>
            <td>
                <label for="age"> age:</label><br>
                <input class="fields" type="number" id = "age" name = "age">
                </td>
        </tr>
                <tr>
                    <td style="padding: 20px">
                         <center>
        <input type="submit" id="me" name= 'submit' value ="Submit">
                    </td>
                </tr>
            </form>
        </div>  
</body>
</html>
