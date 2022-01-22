<?php
session_start();
include("../includes/chatdb.php");

$fromUser = $_POST['fromUser'];
$toUser = $_POST['toUser'];
$message = $_POST['message'];

$output = "";

$sql = "INSERT INTO messages (FromUser, ToUser, Message) VALUES ('$fromUser','$toUser','$message') 
INSERT INTO messages(suggestion.suggestion);";


if ($con->query($sql)) {
    $output .= "";
} else {
    $output .= "Error. Please Try Again.";
}
echo $output;
