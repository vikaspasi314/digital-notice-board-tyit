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
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .form-container {
            max-width: 500px;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        input, textarea, select {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            box-sizing: border-box;
        }
        button {
            background-color: #2c3e50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <p>Add a New Notice</p>
    </header>

    <div class="form-container">
        <form action="add_notice.php" method="POST">
            <label>Title:</label>
            <input type="text" name="title" required>

            <label>Description:</label>
            <textarea name="description" rows="4" required></textarea>

            <label>Category:</label>
            <input type="text" name="category" required>

            <button type="submit">Add Notice</button>
        </form>
    </div>
</body>
</html>
