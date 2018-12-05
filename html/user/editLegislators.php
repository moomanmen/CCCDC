<?php
//displays a page that allows the aadmin to edit the legislators with add and delete 
//  functionality as well as the ability to edit budget
session_start();

if ($_SESSION['user'] != 'admin') {
    header('Location: showApplications.php');
    exit;
}

require 'dbconnect.php';

echo <<<EOL
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel='stylesheet' type='text/css' href='adminStyle.css'>
        <script>           
        
            function addLeg() {
                if(document.getElementById('addLegForm').hidden == false) {
                    document.getElementById('addLegForm').hidden = true;
                } else {
                document.getElementById('addLegForm').hidden = false;
                }
            } 

    </script>
    </head>
    <body>
EOL;

require "nav_bar.php";

$sql = "SELECT * FROM `Legislators`";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //displays legislators
    echo "<h2>Legislators</h2><br>";
    while ($row = $result->fetch_assoc()) {
        $email = $row['email'];
        
        echo "Name: {$row['name']}<br>"; 
        echo "Email: {$row['email']}<br>"; 
        echo "Budget: {$row['budget']}<br>";
        echo "<a href='updateBudget.php?email=$email'>Edit budget</a> ";
        echo "<a href='deleteUser.php?email=$email'>Delete</a><br><hr>";
        
    }

} else {
    echo "No current Legislators";
}

echo "<div id='response'></div>";
echo "<button onclick='addLeg()'>Add Legislator</button>";

//form for adding users
echo <<<EOL
<div id='addLegForm' hidden>
    <form action='insertLegislator.php' method='POST'>
        Name: <input name='name' type='text'><br>
        Budget: <input name='budget' type='number'><br>
        Email: <input name='email' type='email'><br>
        Password: <input name='password' type='password'><br>
        Repeat Password: <input name='repeat' type='password'><br>
        <input type='submit' value='Submit'><br>
    </form>
</div><br>
EOL;

if (isset($_SESSION['insert_err'])) {
    echo $_SESSION['insert_err'];
    $_SESSION['insert_err'] = "";
}


echo "</body></html>";
 
$conn->close();