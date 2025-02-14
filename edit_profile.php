<?php
session_start();
require_once "connection.php";

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

// Get the current user's username
$username = $_SESSION['user'];

// Fetch the current user's profile details
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($connection, $query);
$user = mysqli_fetch_assoc($result);

// Handle form submission
if (isset($_POST['submit'])) {
    // Retrieve form data
    $newUsername = $_POST['username'];
    $newPassword = $_POST['password'];

    // Update the user's profile
    $updateQuery = "UPDATE users SET username = '$newUsername', password = '$newPassword' WHERE username = '$username'";
    mysqli_query($connection, $updateQuery);

    // Update the username in the session
    $_SESSION['user'] = $newUsername;

    // Redirect to the home page
    header("Location: home.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
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

        form {
            width: 300px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Edit Profile</h2>
    <form method="post" action="">
        <input type="text" name="username" value="<?php echo $user['username']; ?>" placeholder="New Username" required><br>
        <input type="password" name="password" placeholder="New Password" required><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
