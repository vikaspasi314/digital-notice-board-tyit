<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: admin_login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "notice_board_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'];
$description = $_POST['description'];
$category = $_POST['category'];
$posted_date = date("Y-m-d");

$sql = "INSERT INTO notices (title, description, posted_date, category) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $title, $description, $posted_date, $category);

if ($stmt->execute()) {
    header("Location: admin_dashboard.php?success=1");
    exit;
} else {
    echo "Error adding notice: " . $conn->error;
}
?>