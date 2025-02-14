<?php
session_start();
require_once "connection.php";

// Check if user is not logged in
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

// Retrieve 10 random questions from the database
$query = "SELECT * FROM questions ORDER BY RAND() LIMIT 10";
$result = mysqli_query($connection, $query);

// Check if the query executed successfully and returned valid results
if (!$result || mysqli_num_rows($result) == 0) {
    echo "Error: Unable to fetch questions. Please try again later.";
    exit;
}

// Calculate the end time of the quiz (5 minutes from now)
$endTime = time() + (5 * 60); // 5 minutes * 60 seconds/minute

// Initialize score
$score = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Trivia Quiz</title>
    <style>
        /* CSS Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        h2 {
            color: #007bff; /* Blue color for the heading */
            text-align: center;
            border-bottom: 2px solid #007bff; /* Double border */
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        #timer {
            color: #333;
            text-align: center;
            font-size: 1.5em;
            margin-bottom: 20px;
            background-color: #ffcccc; /* Light red background for timer */
            padding: 10px;
        }

        form {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 2px solid #000; /* Black double border around the question paper */
        }

        form div {
            margin-bottom: 20px;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        input[type="submit"] {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Style for quiz question */
        .question {
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        /* Style for options */
        .options label {
            display: block;
            margin-bottom: 5px;
        }
    </style>
    <script>
        var timerInterval; // Variable to store the timer interval

        // Function to update the timer every second
        function updateTimer() {
            var now = new Date().getTime();
            var distance = <?php echo $endTime * 1000 ?> - now;

            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("timer").innerHTML = minutes + "m " + seconds + "s ";

            if (distance < 0) {
                clearInterval(timerInterval);
                document.getElementById("timer").innerHTML = "Time's up!";
                document.getElementById("quizForm").submit(); // Automatically submit the quiz when time's up
            }
        }

        // Function to start the timer
        function startTimer() {
            timerInterval = setInterval(updateTimer, 1000);
        }

        // Function to stop the timer
        function stopTimer() {
            clearInterval(timerInterval);
        }

        // Function to handle window switch
        function handleWindowSwitch() {
            stopTimer();
            alert("You've switched windows. Your quiz will be automatically submitted.");
            document.getElementById("quizForm").submit(); // Automatically submit the quiz when window is switched
        }

        // Start the timer when the page loads
        window.onload = startTimer;

        // Event listener to detect when the user switches windows
        window.addEventListener("blur", function() {
            // Window switched, handle it
            handleWindowSwitch();
        });
    </script>
</head>
<body>
    <h2>Welcome to the Trivia Quiz</h2>
    <p id="timer">5m 0s</p>
    <form id="quizForm" method="post" action="results.php">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='question'>";
            echo "<p>" . $row['question'] . "</p>";
            echo "</div>";
            echo "<div class='options'>";
            // Display options
            echo "<label><input type='radio' name='answers[" . $row['id'] . "]' value='" . $row['option1'] . "' required> " . $row['option1'] . "</label>";
            echo "<label><input type='radio' name='answers[" . $row['id'] . "]' value='" . $row['option2'] . "' required> " . $row['option2'] . "</label>";
            echo "<label><input type='radio' name='answers[" . $row['id'] . "]' value='" . $row['option3'] . "' required> " . $row['option3'] . "</label>";
            echo "<label><input type='radio' name='answers[" . $row['id'] . "]' value='" . $row['option4'] . "' required> " . $row['option4'] . "</label>";
            echo "</div>";
        }
        ?>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
