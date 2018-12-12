<?php
//this script authenticates a user and displays an error if username and passoword are incorrect
session_start();

function processText($text) {
    $text = strip_tags($text);
    $text = trim($text);
    $text = htmlspecialchars($text);
    return $text;
}

$username = processText($_POST['username']);
$password = processText($_POST['password']);


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
