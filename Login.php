<?php
session_start();
//  ini_set('display_errors',1);
//  ini_set('display_startup_errors',1);
//  error_reporting(E_ALL);

 $host="localhost";
 $name="root";
 $password="ADANOL123";
 $db="facebook";
 $conn = mysqli_connect($host,$name,$password,$db);
 $error = "";

if(isset($_POST['Login']))
{
        if( empty($_POST['email']) && empty($_POST['Pword'])){
            die("invalid input");
        }
        else{
            $mail = $_POST['email'];
            $pass = $_POST['Pword'];

            $sql = "SELECT * FROM user WHERE email = '$mail' AND pwd = '$pass'";
            $query = $conn->query($sql);
            
            $count = mysqli_num_rows($query);
            if($count == 1){
                $row = mysqli_fetch_assoc($query); 
            
                if($row['email'] == $mail && $row['pwd'] == $pass){              
                    $_SESSION["username"] = $row['name'];
                    $_SESSION['conn'] = $conn;
    
                    header("Location:home.php");
                }
               else{
                   echo "Account not found";
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
</head>
<body>
    <div align = center>
        <form method="POST" action="">
          <span ><?= $error ?></span>
            <table>
            <tr>
            <td>
                <label for="email"> email:</label><br>
                <input class="fields" type="text" id = "email" name="email">
                </td>
        </tr>
        <td>
                <label for="Pword"> Password:</label><br>
                <input class="fields" type="password" id = "Pword" name="Pword">
                </td>
        </tr>
        <tr>
                    <td style="padding: 20px">
                         <center>
        <input type="submit" id="M" value ="Login" name='Login'>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>