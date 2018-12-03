<?php

session_start();
require 'dbconnect.php';

$year = $_GET['year'];
$org = $_GET['org'];

if ($year == $org) {
    $sql = "SELECT * FROM `Applications`";
} else if ($org == 'all') {
    $sql = "SELECT * FROM `Applications` WHERE `year` = '$year' ORDER BY `id`";
} else if ($year == 'all') {
    $sql = "SELECT * FROM `Applications` WHERE `organization` = '$org' ORDER BY `id`";
} else {
    $sql = "SELECT * FROM `Applications` WHERE `organization` = '$org' AND `year` = '$year' ORDER BY `id`";
}

$results = $conn->query($sql);

if ($results->num_rows > 0) {

    echo "<div class='appTable'><table><tr>"
            . "<th>ID</th>"
            . "<th>Organization</th>"
            . "<th>Amount Requested</th>"
            . "<th>Legislator</th>"
            . "</tr>";
    while ($row = $results->fetch_assoc()) {
        $id = $row['id'];
        echo "<tr>";
        echo "<td> <a href='getApplication.php?id=$id'> $id </td>";
        echo "<td>" . $row['organization'] . "</td>";
        echo "<td>" . $row['amount_requested'] . "</td>";
        echo "<td>" . $row['legislator'] . "</td>";
        echo "</tr>";
    }
    echo "</table></div>";
} else {
    echo "No result";
}

$conn->close();

