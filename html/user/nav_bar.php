<?php
//this is the navigation bar that will be used througout the admin pages
$user = $_SESSION['user'];
if(isset($_SESSION['budget'])) {
    $budget = $_SESSION['budget'];
}
//echo "$user </br>";

echo "<ul>"
. "<li style='float:left;color:white;padding:14px 16px'>$user</li>"
. "<li style='float:right'><a href='logout.php'>Logout</li></a>"
. "<li style='float:right'><a href='search.php'>Search</li></a>"
. "<li style='float:right'><a href='changePassword.php'>Change Password</li></a>";

//ony admin can see this
echo ($_SESSION['user'] == 'admin') ? "<li style='float:right'><a href='editLegislators.php'>Edit Legislators</li></a>" : "";


echo "<li style='float:right'><a href='showApplications.php'>Current Applications</li></a></ul>";



