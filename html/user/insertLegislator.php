<?php

session_start();
if ($_SESSION['user'] != 'admin') {
    header('Location: showApplications.php');
    exit;
}

require 'dbconnect.php';

function processText($text) {
    $text = strip_tags($text);
    $text = trim($text);
    $text = htmlspecialchars($text);
    return $text;
}

$name = processText($_POST['name']);
$email = processText($_POST['email']);
$password = processText($_POST['password']);
$repeat = processText($_POST['repeat']);
$budget = processText($_POST['budget']);
$hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "SELECT `username` from `users` WHERE `username` = '$email'";
$result = $conn->query($sql);

//check if user already exists
if ($result->num_rows != 0) {
    $_SESSION['insert_err'] = 'User already exists';

//check if passwords do not match
} elseif ($password != $repeat) {
    $_SESSION['insert_err'] = 'Passwords do not match';
}

//inserts user into legislators table and users table
else {
    $sql = $conn->prepare('INSERT INTO `Legislators` (`name`, `email`, `budget`) VALUES (?, ?, ?) ');
    $sql->bind_param("ssd", $name, $email, $budget);
    if ($sql->execute()) {
        $sql->close();
        $sql = $conn->prepare('INSERT INTO `users` (`username`, `password`) VALUES (?, ?) ');
        $sql->bind_param("ss", $email, $hash);
        if (!($sql->execute())) {
            $_SESSION['insert_err'] = 'Insert failed';
        }
    } else {
        $_SESSION['insert_err'] = 'Insert failed';
    }
}



header("Location: editLegislators.php");
