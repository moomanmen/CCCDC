<?php

/*
 * This script will pull up a single application based on its id 
 */
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}


function get_file($folder_path) {
    if (is_dir($folder_path)) {
        // Get real path for our folder
        $rootPath = realpath($folder_path);
        // Create recursive directory iterator
        $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($rootPath), RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file) {
            // Skip directories (they would be added automatically)
            if (!$file->isDir()) {
                // Get real and relative path for current file
                $filePath = $file->getRealPath();

            }
        }
	return $filePath;
    }
}

//print out header
echo <<<EOL
<html>
    <head>
        <meta charset="UTF-8">
        <title>Application</title>
        <link rel='stylesheet' type='text/css' href='adminStyle.css'>
        <script>
            function showForm() {
                if(document.getElementById('updateForm').hidden == false) {
                    document.getElementById('updateForm').hidden = true;
                } else {
                document.getElementById('updateForm').hidden = false;
                }
            } 
        </script>
    </head>
    <body>
EOL;

require "nav_bar.php";

//creates session variable for application id
if (!isset($_SESSION['app_id'])) {
    $_SESSION['app_id'] = $_GET['id'];
}
$id = $_SESSION['app_id'];

require 'dbconnect.php';

$sql = "SELECT * FROM `Applications` WHERE `id` = '$id'";

$result = $conn->query($sql);


//print out the form with the application data
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    //makes sure that amount_given is a number
    if ($row['amount_given'] == "") {
        $row['amount_given'] = 0;
    }
    echo <<<EOL
        <p style='font-size:20px' id='id'> ID:  {$row['id']}
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
        <p style='font-size:20px' id='comments'> Comments:   {$row['comments']}
EOL;
} else {
    echo "Application not found";
}

//form for updating status and amount_given
echo "</br><button onclick='showForm()'>Edit</button>";
echo <<<EOL
    <form action='updateApplication.php' id='updateForm' method='POST' hidden>
        <input type='hidden' name='id' value='{$row['id']}'>
        <input type='hidden' name='prevAmountGiven' value='{$row['amount_given']}'>
        Status: <select name='status'>
            <option value='{$row['status']}' hidden>{$row['status']}</option>
            <option value='open'>Open</option>
            <option value='closed'>Closed</option>
        </select></br>
        Amount of money granted: <input type='number' name='amountAdded'></br>
        Comments:</br><textarea name='comments' rows='10' cols='30'>{$row['comments']}</textarea></br>
        <input type='submit' value='submit'>
    </form>
EOL;
if (isset($_SESSION['err_msg'])) {
    echo $_SESSION['err_msg'];
    $_SESSION['err_msg'] = "";
}


//uses file_path to get the file and downloads it using getFile.php
$file = get_file($row['file_path']);
if (is_dir($row['file_path'])) {
    echo "<a href='getFile.php?file=$file' download>Download Submitted files</a>";
}


$conn->close();

echo "</body>";
echo "</html>";
