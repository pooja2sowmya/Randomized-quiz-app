<?php
session_start();
require_once "connection.php";

// Check if admin is not logged in
if(!isset($_SESSION['admin'])) {
    header("Location: admin.php");
    exit;
}

// Retrieve all questions from the database
$query = "SELECT * FROM questions";
$result = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>All Questions</title>
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
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff; /* White background color */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2; /* Light gray background color for table header */
        }

        tr:hover {
            background-color: #f5f5f5; /* Light gray background color on hover */
        }

        a {
            text-decoration: none;
            color: #007bff; /* Blue link color */
        }

        a:hover {
            color: #0056b3; /* Darker blue color on hover */
        }
    </style>
</head>
<body>
    <h2>All Questions</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Question</th>
            <th colspan= "4">Options</th>
            <th>Correct Answer</th>
            <th>Action</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['question']; ?></td>
            <td><?php echo $row['option1']; ?></td>
            <td><?php echo $row['option2']; ?></td>
            <td><?php echo $row['option3']; ?></td>
            <td><?php echo $row['option4']; ?></td>
            <td><?php echo $row['correct_answer']; ?></td>
            <td><a href="editquestions.php?id=<?php echo $row['id']; ?>">Edit</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
