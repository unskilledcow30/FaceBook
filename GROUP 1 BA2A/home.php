<?php 
    session_start();

    include_once('db_ops/db_connect.php');

    if(isset($_SESSION['username'])){

        $query = "SELECT * FROM user";
        $result = $conn->query($query);

        $users = $result->fetch_all(MYSQLI_ASSOC);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="styles/home.css">
</head>
<body>

    <header>
        <div class="group">
            Group &nbsp;<span>One</span> 
        </div>
        <nav>
            <a href="" class="active">Home</a>
            <a href="joins/innerjoin.php">Inner join</a>
            <a href="joins/leftjoin.php">Left join</a>
            <a href="joins/rightjoin.php">Right join</a>
            <a href="joins/crossjoin.php">Cross join</a>
            <a href="joins/fulljoin.php">Full join</a>
            <a href="Logout.php">Logout</a>
        </nav>
    </header>
    <h2>Welcome <?php echo $_SESSION["username"]?> </h2>
    Here are the various users of your application:

    <div class="users">
        <?php 
            foreach($users as $user):
        ?>
        <li> <?php echo $user['user_name']?></li>

        <?php endforeach;?>
    </div>
    
</body>
</html>