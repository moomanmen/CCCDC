<?php
//performs the search and passes the results to search.php for display
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}


function processText($text) {
    $text = strip_tags($text);
    $text = trim($text);
    $text = htmlspecialchars($text);
    return $text;
}
//resets application id stored in the session
unset($_SESSION['app_id']);
require 'dbconnect.php';

$year = processText($_GET['year']);
$org = processText($_GET['org']);

//sets sql statement based on options selected oon search.php
if ($year == $org) {
    $sql = "SELECT * FROM `Applications` ORDER BY `id`";
} else if ($org == 'all') {
    $sql = "SELECT * FROM `Applications` WHERE `year` = '$year' ORDER BY `id`";
} else if ($year == 'all') {
    $sql = "SELECT * FROM `Applications` WHERE `organization` = '$org' ORDER BY `id`";
} else {
    $sql = "SELECT * FROM `Applications` WHERE `organization` = '$org' AND `year` = '$year' ORDER BY `id`";
}

$results = $conn->query($sql);

//displays table of applications
if ($results->num_rows > 0) {

    echo "<div class='appTable'><table><tr>"
            . "<th>ID</th>"
            . "<th>Status</th>"
            . "<th>Organization</th>"
            . "<th>Amount Requested</th>"
            . "<th>Amount Given</th>"
            . "<th>Legislator</th>"
            . "</tr>";
    while ($row = $results->fetch_assoc()) {
        $id = $row['id'];
        echo "<tr>";
        echo "<td> <a href='getApplication.php?id=$id'> $id </a></td>";
        echo "<td>". $row['status'] . "</td>";
        echo "<td>" . $row['organization'] . "</td>";
        echo "<td>" . $row['amount_requested'] . "</td>";
        echo "<td>" . $row['amount_given'] . "</td>";
        echo "<td>" . $row['legislator'] . "</td>";
        echo "</tr>";
    }
    echo "</table></div>";
} else {
    echo "No results";
}

$conn->close();

