<?php
session_start();

$valid_username = "admin";
$valid_password = "notice123";

$entered_username = $_POST['username'];
$entered_password = $_POST['password'];

if ($entered_username == $valid_username && $entered_password == $valid_password) {
    $_SESSION['loggedin'] = true;
    header("Location: admin_dashboard.php");
    exit;
} else {
    echo "Invalid username or password. <a href='admin_login.php'>Try again</a>";
}
?>