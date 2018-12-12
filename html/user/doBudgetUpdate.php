<?php
//updates the budget of a legislator

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
$budget = processText($_GET['budget']);
require 'dbconnect.php';

$sql = "UPDATE `Legislators` SET `budget` = $budget WHERE `email` = '$email'";

if ($conn->query($sql)) {
    echo "Update Successful";
} else {
    echo "Update failed: " . $conn->error;
}



