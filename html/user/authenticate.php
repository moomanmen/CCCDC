<?php

session_start();


$username = $_POST['username'];
$password = $_POST['password'];


require 'dbconnect.php';


$sql = "SELECT * FROM `users` WHERE `username` = '$username'";

$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $hash = $row['password'];
    if (password_verify($password, $hash)) {
        $_SESSION['user'] = $username;
        header('Location: showApplications.php');
        $conn->close;
        exit;
    } else {
        $_SESSION['login_err'] = 'Username and password do not match';
        header('Location: login.php');
        $conn->close;
        exit;
    }
} else {
    $_SESSION['login_err'] = 'Username and password do not match';
    header('Location: login.php');
    $conn->close;
    exit;
    ;
}



$conn->close;
