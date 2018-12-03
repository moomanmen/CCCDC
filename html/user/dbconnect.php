<?php

$dbname = 'CCCDC';
$server = 'localhost';
$server_username = 'admin';
$server_password = 'Pizza';


$conn = new mysqli($server, $server_username, $server_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
