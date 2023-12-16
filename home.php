<?php 
    session_start();

    $host="localhost";
    $name="root";
    $password="ADANOL123";
    $db="facebook";
    $conn = mysqli_connect($host,$name,$password,$db);

    if(isset($_SESSION['username'])){

        $query = "SELECT * FROM user";
        $result = $conn->query($query);

        $users = $result->fetch_all(MYSQLI_ASSOC);

        function split($elem){
            echo '<pre>';
            print_r($elem);
            echo '</pre>';
        }

        // split($users);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>

    <P>Welcome <?php echo $_SESSION["username"]?> </P>
    Here are the various users of your application
    <?php 
        foreach($users as $user):
    ?>
    <p> <?php echo $user['name']?></p>

    <?php endforeach;?>
</body>
</html>