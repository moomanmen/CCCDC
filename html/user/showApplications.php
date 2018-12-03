<?php

session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

require 'dbconnect.php';

$sql = "SELECT * FROM  `Applications` WHERE `status` <> 'closed' ORDER BY `status` DESC";

$results = $conn->query($sql);

print "<!DOCTYPE html>"
        . "<html><head><title>Applicaitions</title>"
        . "<link rel='stylesheet' type='text/css' href='adminStyle.css'</head>"
        . "<body>";

include 'nav_bar.php';
echo "<h2>Current Applications</h2>";

if ($results->num_rows > 0) {

    echo "<div class='appTable'><table><tr>"
    . "<th>ID</th>"
    . "<th>Organization</th>"
    . "<th>Amount Requested</th>"
    . "<th>Legislator</th>"
    . "</tr>";
    while ($row = $results->fetch_assoc()) {
        $id = $row['id'];
        $legislators = explode("-", $row['legislator']);
        echo "<tr>";
        echo "<td> <a href='getApplication.php?id=$id'> $id </td>";
        echo "<td>" . $row['organization'] . "</td>";
        echo "<td>" . $row['amount_requested'] . "</td>";
        echo "<td>";
        foreach ($legislators as $leg) {
            if ($leg != "") {
                echo "$leg, ";
            }
        }
        echo "</td>";
        echo "</tr>";
    }
    echo "</table></div>";
}

print "</body></html>";


$conn->close();
?>

