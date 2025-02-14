<?php
session_start();
require_once "connection.php";

// Check if admin is not logged in
if(!isset($_SESSION['admin'])) {
    header("Location: admin.php");
    exit;
}
$username = $_SESSION['admin'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f8ff; /* Light blue background color */
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            color: #333; /* Dark gray text color */
            background-color: #007bff; /* Blue heading background color */
            padding: 10px;
            border-radius: 5px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        li {
            display: inline-block;
            margin: 10px;
        }

        li a {
            display: block;
            text-decoration: none;
            color: #333; /* Dark gray text color */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff; /* White background color */
            transition: background-color 0.3s ease;
        }

        li a:hover {
            background-color: #f0f0f0; /* Light gray background color on hover */
        }
    </style>
</head>
<body>
    <h2>Welcome, <?php echo $username; ?>!</h2>
    <ul>
        <li><a href="add.php" style="background-color: #28a745; color: #fff;">Add Questions</a></li>
        <li><a href="all.php" style="background-color: #ffc107; color: #333;">View All Questions</a></li>
        <li><a href="players.php" style="background-color: #dc3545; color: #fff;">View Player Scores</a></li>
        <li><a href="ranking.php" style="background-color: #17a2b8; color: #fff;">Ranking</a></li>
        <li><a href="logout.php" style="background-color: #6c757d; color: #fff;">Logout</a></li>
    </ul>
</body>
</html>
