<!DOCTYPE html>
<html>
<head>
    <title>Quiz Rankings</title>
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

        table {
            width: 50%;
            margin: 0 auto;
            border-collapse: collapse;
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
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

    // Fetch quiz marks from the database
    $query = "SELECT username, marks FROM quiz_marks ORDER BY marks DESC"; // Updated column name to 'marks'
    $result = mysqli_query($connection, $query);

    // Check if there are any quiz marks
    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Quiz Rankings</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Rank</th><th>Username</th><th>Score</th></tr>";
        $rank = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $rank++ . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['marks'] . "</td>"; // Updated column name to 'marks'
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No quiz marks found.";
    }
    ?>
</body>
</html>
