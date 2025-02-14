<?php
session_start();
require_once "connection.php";

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

// Get the username from the session
$username = $_SESSION['user'];

// Retrieve the quiz score from the quiz_marks table
$query = "SELECT score FROM quiz_marks WHERE username = '$username'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$score = ($row) ? $row['score'] : 'Not available'; // If score is not available, set it to 'Not available'
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quiz Results</title>
    <!-- Add your CSS styles here -->
    <style>
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

        .score-container {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .score {
            text-align: center;
            font-size: 24px;
            color: #007bff;
        }

        .home-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <h2>Quiz Results</h2>
    <div class="score-container">
        <p class="score">Your quiz score: <?php echo $score; ?></p>
        <a href="home.php" class="home-link">Go back to Home Page</a>
    </div>
</body>
</html>
