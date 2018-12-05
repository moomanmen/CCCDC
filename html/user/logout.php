<?php
//logs out the user and destroys session
session_start();

$_SESSION['user'] = '';
session_destroy();
header("Location: login.php");