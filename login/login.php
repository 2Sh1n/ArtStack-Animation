<?php
session_start();

$db = new mysqli("localhost:3306", "root", "", "artstack");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $db->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        echo "Login successful!";
        // You can set session variables here to maintain user's session
    } else {
        echo "Login failed. Invalid credentials.";
    }
} else {
    echo "Login failed. User not found.";
}

$db->close();
?>