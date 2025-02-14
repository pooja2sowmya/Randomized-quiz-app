<?php
session_start();
require_once "connection.php";

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate student credentials
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND role = 'student'";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);

    if($user) {
        $_SESSION['user_id'] = $user['id']; // Set user ID in session
        $_SESSION['user'] = $username;
        header("Location: home.php"); // Redirect to home page
        exit;
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
    <style>
        body {
            background-color: #9053c7; /* Purple background color */
            margin: 0;
            padding: 0;
        }

        h2 {
            margin: 0;
            width: 100%;
            position: absolute;
            top: 50%;
            font-size: 40px;
            margin-top: -40px;
            transform: translate(0, -50%);
            text-align: center;
            color: white;
            font-weight: bold;
        }

        form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
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
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: #f00;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>Student Login</h2>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>
