<?php
session_start();
require_once "connection.php";
// Check if admin is not logged in
if(!isset($_SESSION['admin'])) {
    header("Location: admin.php");
    exit;
}
// Database connection (code not shown)
// Assuming 'questions' table structure: id (AUTO_INCREMENT), question, options, correct_answer
if(isset($_POST['submit'])) {
    $question = $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $correct_answer = $_POST['correct_answer'];
    $insertQuery = "INSERT INTO questions (question, option1, option2, option3, option4, correct_answer) VALUES ('$question', '$option1', '$option2', '$option3', '$option4', '$correct_answer')";
    
    // Execute the insert query
    if(mysqli_query($connection, $insertQuery)) {
        // Redirect after successful insertion
        header("Location: all.php");
        exit;
    } else {
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($connection);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Question</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2; /* Light gray background color */
        }
        h2 {
            text-align: center;
        }
        form {
            width: 50%;
            margin: 0 auto;
            background-color: #fff; /* White background color */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle box shadow */
        }
        textarea, input[type="text"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50; /* Green button color */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049; /* Darker green color on hover */
        }
    </style>
</head>
<body>
    <h2>Add Question</h2>
    <form method="post" action="">
        <textarea name="question" placeholder="Enter question" required></textarea><br>
        <input type="text" name="option1" placeholder="Enter option1" required><br>
        <input type="text" name="option2" placeholder="Enter option2" required><br>
        <input type="text" name="option3" placeholder="Enter option3" required><br>
        <input type="text" name="option4" placeholder="Enter option4" required><br>
        <input type="text" name="correct_answer" placeholder="Enter correct answer" required><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
