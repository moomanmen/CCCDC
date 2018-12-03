<?php

/*
 * This script will pull up a single application based on its id 
 */
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

//print out header
echo <<<EOL
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel='stylesheet' type='text/css' href='adminStyle.css'>
        <script>
            function 
        </script>
    </head>
    <body>
EOL;

require "nav_bar.php";

$id = $_GET['id'];

require 'dbconnect.php';

$sql = "SELECT * FROM `Applications` WHERE `id` = '$id'";

$result = $conn->query($sql);


//print out the form with the application data
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    echo <<<EOL
        <p style='font-size:20px' id='id'> Id:  {$row['id']}
	<p style='font-size:20px' id='name'> Applicant Name:  {$row['first_name']}  {$row['last_name']}
    	<p style='font-size:20px' id='email'> Applicant Email:   {$row['email']}
    	<p style='font-size:20px' id='phone_number'> Applicane Phone Number:   {$row['phone_number']}
    	<p style='font-size:20px' id='org'> Organization:   {$row['organization']}
    	<p style='font-size:20px' id='amount_req'> Amount Requested:   {$row['amount_requested']}
    	<p style='font-size:20px' id='amount_given'> Amount Given:   {$row['amount_given']}
    	<p style='font-size:20px' id='legislator'> Legislator(s) Applied To:   {$row['legislator']}
    	<p style='font-size:20px' id='date'> Date Requested: {$row['date_requested']}
    	<p style='font-size:20px' id='status'> Status:   {$row['status']}
    	<p style='font-size:20px' id='description'> Description:   {$row['description']}
EOL;
} else {
    echo "Application not found";
}


echo "</br><button oncllick='showForm()'>Edit</button>";
echo "<form action='updateApplication.php' hidden>"
. "<input type='select' name='state'>"
        . "<option>";



$conn->close();

echo "</body>";
echo "</html>";
