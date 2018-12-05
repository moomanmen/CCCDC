<?php
//displays a page that lets users search the archive for applications
//  users can search by year, or by organization
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

//get a list of the organizations and places them into a select element
//value will be the name of the organization
require 'dbconnect.php';
$sql = "SELECT `organization` FROM `Applications` GROUP BY `organization` ORDER BY `organization`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $org_list = "";
    while ($row = $result->fetch_assoc()) {
        $org = $row['organization'];
        $org_list = $org_list . "<option value='$org'>$org</option>";
    }
}

//get a list of years for the user to select from and places them into a select element
$sql = "SELECT `year` FROM `Applications` GROUP BY `year` ORDER BY `year` DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $year_list = "";
    while ($row = $result->fetch_assoc()) {
        $year = $row['year'];
        $year_list = $year_list . "<option value='$year'>$year</option>";
    }
}
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Search Applications</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' type='text/css' href='adminStyle.css'>
        <script>
            function search() {
                var year = document.getElementById('year_id').value;
                var org = document.getElementById('org_id').value;
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("searchResults").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "searchApplications.php?year=" + year + "&org=" + org, true);
                xmlhttp.send();
            }



        </script>
    </head>
    <body onload='search()'>
        <?php require 'nav_bar.php'; ?>
        <h2>Search</h2>
        Organization: 
        <select id='org_id' onchange='search()'>
            <option value='all'>All</option>
            <?php echo $org_list; ?>
        </select>       

        Year: 
        <select id='year_id' onchange="search()">
            <option value='all'>All</option>
            <?php echo $year_list; ?>
        </select>

        <div  id='searchResults'></div>
    </body>
</html>
