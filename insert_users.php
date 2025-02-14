<?php
require_once "connection.php";

// Define user data to be inserted
$usersData = array(
    array("username" => "admin", "password" => "adminpassword", "role" => "admin", "is_admin" => 1),
    array("username" => "student1", "password" => "password1", "role" => "student", "is_admin" => 0),
    array("username" => "student2", "password" => "password2", "role" => "student", "is_admin" => 0)
);

// Prepare SQL statement
$query = "INSERT INTO users (username, password, role, is_admin) VALUES (?, ?, ?, ?)";
$statement = mysqli_prepare($connection, $query);

// Bind parameters and execute the statement for each user
foreach ($usersData as $userData) {
    mysqli_stmt_bind_param($statement, "sssi", $userData['username'], $userData['password'], $userData['role'], $userData['is_admin']);
    mysqli_stmt_execute($statement);
}

// Close statement
mysqli_stmt_close($statement);

echo "User data inserted successfully.";
?>
