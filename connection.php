<?php
// Database credentials
$host = "localhost"; // Change this to your database host
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "hello"; // Change this to your database name

// Attempt to connect to MySQL database
$connection = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
function authenticateAdmin($username, $password, $connection) {
    // Query to check if the user is an admin
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND is_admin = 1";
    $result = mysqli_query($connection, $query);
    return mysqli_num_rows($result) == 1;
}

?>
