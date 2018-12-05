<?php
//script that changes a users password, given old password, new password, and new password again
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['submit'])) {
    require 'dbconnect.php';

    function processText($text) {
        $text = strip_tags($text);
        $text = trim($text);
        $text = htmlspecialchars($text);
        return $text;
    }

    $user = $_SESSION['user'];
    $sql = "SELECT `password` FROM `users` WHERE `username` = '$user'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $hash = $row['password'];

    $password = processText($_POST['currentPwd']);
    $newPwd = processText($_POST['newPwd']);
    $repeatPwd = processText($_POST['repeatPwd']);

    if (password_verify($password, $hash)) {
        if ($newPwd == $repeatPwd) {
            $hash = password_hash($newPwd, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE `users` SET `password` = ? WHERE `username` = ?");
            $stmt->bind_param("ss", $hash, $user);

            if ($stmt->execute()) {
                $_SESSION['msg'] = 'Password changed successfully';
            } else {
                $_SESSION['msg'] = 'Password change failed';
            }
        } else {
            $_SESSION['msg'] = "Passwords do not match";
        }
    } else {
        $_SESSION['msg'] = "Incorrect password";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel='stylesheet' type='text/css' href='adminStyle.css'>
    </head>
    <body>
        <?php include "nav_bar.php"; ?>
        <h2>Change Password</h2>
        <form action='changePassword.php' method='POST'>
            Current Password: <input type='password' name='currentPwd'></br>
            New Password: <input type='password' name='newPwd'></br>
            Repeat Password: <input type='password' name='repeatPwd'></br>
            <input type='submit' value='Submit' name='submit'></br>
            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                $_SESSION['msg'] = "";
            }
            ?>
        </form>
    </body>
</html>
