<?php
//page that gets info from user to be used to update the budget of a legislator
//TO-DO: use as modal instead of page

session_start();
if ($_SESSION['user'] != 'admin') {
    header('Location: showApplications.php');
    exit:
}


$email = $_GET['email'];
require 'dbconnect.php';

$sql = "SELECT * FROM `Legislators` WHERE `email` = '$email'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $leg = $row['name'];
    $budget = $row['budget'];
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
            function updateBudget(email, budget) {
                var newBudget = document.getElementById('newBudget').value;
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
                xmlhttp.open("GET", "doBudgetUpdate.php?email=" + email + "&budget=" + newBudget, true);
                xmlhttp.send();
            }


        </script>
    </head>
    <body>
        <?php include "nav_bar.php"; ?>
        <h2>Delete User</h2>
        <p id="response"><?php echo $leg ?> currently has a budget of <?php echo $budget?>.<br>

            Change to: <input type='number' id='newBudget'></br>
            <input type='button' value='Update' onclick='updateBudget("<?php echo $email ?>")'>

        </form>
</body>
</html>
