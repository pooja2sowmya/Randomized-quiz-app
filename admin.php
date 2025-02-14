<?php
session_start();
require_once "connection.php";

// Check if form is submitted
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate admin credentials
    if(authenticateAdmin($username, $password, $connection)) {
        $_SESSION['admin'] = $username;
        header("Location: adminhome.php");
        exit;
    } else {
        $error = "Invalid username or password";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('background-image-url.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        h1, h2 {
            color:light pink;
            text-align: center;
            text-shadow: 2px 2px 4px #000000;
        }

        h1 {
            margin-top: 50px;
            font-size: 36px;
        }

        h2 {
            margin-top: 20px;
            font-size: 24px;
        }

        form {
            width: 300px;
            margin: 100px auto;
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
    <h1>Welcome to Quiz Bank Admin Panel</h1>
    <h2>Admin Login</h2>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>
