<?php
session_start();
require_once "connection.php";

// Check if admin is not logged in
if(!isset($_SESSION['admin'])) {
    header("Location: admin.php");
    exit;
}

// Fetch all player scores from the quiz_marks table
$query = "SELECT * FROM quiz_marks";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Player Scores</title>
    <style>
        /* CSS Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Player Scores</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Score</th>
            <th>Completion Time</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['marks']; ?></td> <!-- Changed 'score' to 'marks' -->
            <td><?php echo $row['completion_time']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
