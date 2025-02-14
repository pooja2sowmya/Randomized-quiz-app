<?php
session_start();

// Check if user is not logged in
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION['user'];
$role = isset($_SESSION['role']) ? $_SESSION['role'] : ''; // Check if role is set in the session

// Determine the greeting message based on the user's role
if ($role === 'admin') {
    $greeting = "Welcome, Admin $username!";
    $startQuizLink = "#"; // Change this link if admins can also take the quiz
} else {
    $greeting = "Welcome, $username!";
    $startQuizLink = "quiz.php"; // Link to the quiz page for regular users
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #343a40;
            text-align: center;
            margin-top: 50px;
        }

        .quiz-link, .logout-link, .profile-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
            font-weight: bold;
            cursor: pointer;
        }

        .quiz-link {
            background-color: #007bff;
            color: #fff;
        }

        .quiz-link:hover {
            background-color: #0056b3;
        }

        .logout-link {
            background-color: #dc3545;
            color: #fff;
        }

        .logout-link:hover {
            background-color: #bd2130;
        }

        .profile-link {
            background-color: #ffc107;
            color: #333;
        }

        .profile-link:hover {
            background-color: #e0a800;
        }
    </style>
</head>
<body>
    <h2><?php echo $greeting; ?></h2>
    <a href="<?php echo $startQuizLink; ?>" class="quiz-link">Start Quiz</a>
    <a href="logout.php" class="logout-link">Logout</a>
    <a href="edit_profile.php" class="profile-link">Edit Profile</a>
</body>
</html>
