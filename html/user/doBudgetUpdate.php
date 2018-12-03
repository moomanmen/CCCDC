<?php

session_start();
if ($_SESSION['user'] != 'admin') {
    header('Location: showApplications.php');
}


$email = $_GET['email'];
$budget = $_GET['budget'];
require 'dbconnect.php';

$sql = "UPDATE `legislators` SET `budget` = $budget WHERE `email` = '$email'";

if ($conn->query($sql)) {
    echo "Update Successful";
} else {
    echo "Update failed: " . $conn->error;
}



