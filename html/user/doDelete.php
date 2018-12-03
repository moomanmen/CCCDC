<?php

session_start();
if ($_SESSION['user'] != 'admin') {
    header('Location: showApplications.php');
}


$email = $_GET['email'];
require 'dbconnect.php';


$sql = "DELETE FROM `users` WHERE `username` = '$email'";

if ($conn->query($sql)) {
    $sql = "DELETE FROM `legislators` WHERE `email` = '$email'";
    if ($conn->query($sql)) {
        echo "User deleted";
    } else {
        echo "Delete failed: " . $conn->error;
    }
} else {
    echo "Delete failed: " . $conn->error;
}



