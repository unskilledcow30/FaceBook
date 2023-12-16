<?php

include_once('../db_ops/db_connect.php');

$sql = "SELECT * FROM user as u left join comments as c ON u.id_user = c.id_commenter UNION SELECT * FROM user as u right join comments as c ON u.id_user = c.id_commenter ";

$res = $conn->query($sql);
$users = $res->fetch_all(MYSQLI_ASSOC);

function split($elem){
    echo '<pre>';
    print_r($elem);
    echo '</pre>';
}
// split($users);
// die;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full join</title>

    <link rel="stylesheet" href="../styles/home.css">
    <link rel="stylesheet" href="../join_styles/inner.css">
</head>
<body>
<header>
        <div class="group">
            Group 1
        </div>
        <nav>
            <a href="../home.php" >Home</a>
            <a href="innerjoin.php">Inner join</a>
            <a href="leftjoin.php">Left join</a>
            <a href="rightjoin.php">Right join</a>
            <a href="crossjoin.php">Cross join</a>
            <a href="fulljoin.php" class="active">Full join</a>
            <a href="../Logout.php">Logout</a>
        </nav>
    </header>
    <h2>Below comes the Full join data</h2>

    <table>
        <tr>
            <th>UserName</td>
            <th>Email</td>
            <th>Phone Number</td>
            <th>Comment</td>
            <th>Date Commented</td>
        </tr>
        <?php
            foreach($users as $user):
        ?>
        <tr>
            <td><?= $user['user_name']?></td>
            <td><?= $user['email']?></td>
            <td><?= $user['phone_number']?></td>
            <td><?= $user['comment']?></td>
            <td><?= $user['date_commented']?></td>
        </tr>
        <?php endforeach;?>
    </table>
</body>
</html>