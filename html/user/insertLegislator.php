<?php

session_start();

require 'dbconnect.php';

//get variables from form
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$repeat = $_POST['repeat'];
$budget = $_POST['budget'];
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
        $sql->close;
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
