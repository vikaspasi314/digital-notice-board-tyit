<?php
$conn = new mysqli("localhost", "root", "", "notice_board_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM notices ORDER BY posted_date DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Digital Notice Board</title>
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
                .notice-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 0 20px;
        }
        .notice-card {
            background-color: white;
            border-left: 5px solid #2c3e50;
            padding: 15px 20px;
            margin-bottom: 15px;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .date {
            color: gray;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Digital Notice Board</h1>
    </header>
            <div class="notice-container">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="notice-card">
                <h2><?php echo $row['title']; ?></h2>
                <p class="date">Posted on: <?php echo $row['posted_date']; ?> | <?php echo $row['category']; ?></p>
                <p><?php echo $row['description']; ?></p>
            </div>
        <?php } ?>
    </div>
</body>
</html>