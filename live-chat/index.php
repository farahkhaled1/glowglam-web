<?php 
session_start();
include("../includes/chatdb.php");
include("../includes/links.php");

if(isset($_GET["userId"]))
{
$_SESSION["userId"] = $_GET["userId"];
header("location: chatbox.php");
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4>Please Select Your Account</h4>
    </div>
    <div class="modal-body">
        <ol>
            <?php
            $users = mysqli_query($con, 'SELECT * FROM users') 
            or die("Failed to query database".mysql_error());
            while($user = mysqli_fetch_assoc($users))
            {
                echo '<li>
                <a href="index.php?userId='.$user['id'].'">'.$user['firstname'].'</a>
                </li>
                ';
            };
            ?>
        </ol>
        <a href="../register.php" style="float:right;">Register here.</a>
        </div>
        </div>
        </div>
</body>
</html>