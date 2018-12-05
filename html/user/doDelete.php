<?php
//deletes the user from legislator table and user table

session_start();
if ($_SESSION['user'] != 'admin') {
    header('Location: showApplications.php');
}

function processText($text) {
    $text = strip_tags($text);
    $text = trim($text);
    $text = htmlspecialchars($text);
    return $text;
}

$email = processText($_GET['email']);
require 'dbconnect.php';


$sql = "DELETE FROM `users` WHERE `username` = '$email'";

if ($conn->query($sql)) {
    $sql = "DELETE FROM `Legislators` WHERE `email` = '$email'";
    if ($conn->query($sql)) {
        echo "User deleted";
    } else {
        echo "Delete failed: " . $conn->error;
    }
} else {
    echo "Delete failed: " . $conn->error;
}



