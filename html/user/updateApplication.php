<?php
//script that updates the application 

session_start();
if (!isset($_SESSION['user'])) {
    header("Location: showApplications.php");
    exit();
}

function processText($text) {
    $text = strip_tags($text);
    $text = trim($text);
    $text = htmlspecialchars($text);
    return $text;
}

$id = $_SESSION['app_id'];
$prevAmountGiven = $_POST['prevAmountGiven'];
$amountAdded = processText($_POST['amountAdded']);
$status = processText($_POST['status']);
$comments = processText($_POST['comments']);
$newAmountGiven = $prevAmountGiven + $amountAdded;

require "dbconnect.php";

$sql = $conn->prepare("UPDATE `Applications` SET status = ?, comments = ?, amount_given = ? WHERE `id` = ?");
$sql->bind_param("ssds", $status, $comments, $newAmountGiven, $id);

if ($sql->execute()) {
    $sql->close();
} else {
    $_SESSION['insert_err'] = 'Insert failed';
}
$conn->close();

header("Location: getApplication.php");
exit;
