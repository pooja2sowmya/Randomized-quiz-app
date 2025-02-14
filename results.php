<!DOCTYPE html>
<html>
<head>
    <title>Quiz Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2;
        }

        h2 {
            color: #007bff;
            text-align: center;
        }

        .score-container {
            width: 50%;
            margin: 0 auto;
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
    <?php
    session_start();
    require_once "connection.php";

    // Check if user is logged in
    if (!isset($_SESSION['user'])) {
        header("Location: index.php");
        exit;
    }

    // Initialize score
    $score = 0;

    // Retrieve submitted answers
    if (isset($_POST['answers'])) {
        $submittedAnswers = $_POST['answers'];

        // Loop through submitted answers
        foreach ($submittedAnswers as $questionId => $submittedAnswer) {
            // Retrieve correct answer from database
            $query = "SELECT correct_answer FROM questions WHERE id = $questionId";
            $result = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($result);
            $correctAnswer = $row['correct_answer'];

            // Check if submitted answer is correct
            if ($submittedAnswer === $correctAnswer) {
                $score++;
            }
        }

        // Update user's score and latest completion time
        $username = $_SESSION['user'];
        $currentTime = date('Y-m-d H:i:s');
        $updateQuery = "UPDATE users SET score = $score, completion_time = NOW() WHERE username = '$username'";
        mysqli_query($connection, $updateQuery);

        // Insert quiz marks and completion time into quiz_marks table
        $insertQuery = "INSERT INTO quiz_marks (username, marks, completion_time) VALUES ('$username', $score, NOW())";
        mysqli_query($connection, $insertQuery);
    }
    ?>
    <h2>Quiz Results</h2>
    <div class="score-container">
        <p class="score">Your score: <?php echo $score; ?></p>
        <a href="home.php" class="home-link">Go back to Home Page</a>
    </div>
</body>
</html>
