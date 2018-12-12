<?php
//page with a confirm delete functionality. 
//TO-DO: Make into a modal instead of separate page?


session_start();
if ($_SESSION['user'] != 'admin') {
    header('Location: showApplications.php');
}


$email = $_GET['email'];
require 'dbconnect.php';

$sql = "SELECT * FROM `Legislators` WHERE `email` = '$email'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $leg = $row['name'];
    $email = $row['email'];
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete User</title>
        <link rel='stylesheet' type='text/css' href='adminStyle.css'>
        <script>
            function deleteUser(email) {
                 if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("response").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "doDelete.php?email=" + email, true);
                xmlhttp.send();
            }

            
        </script>
    </head>
    <body>
        <?php include "nav_bar.php";?>
        <h2>Delete User</h2>
            <p id="response">Are you sure that you want to delete <?php echo $email?>?
            
            <input type='button' value='Yes' onclick='deleteUser("<?php echo $email?>")' >

        </form>
    </body>
</html>
