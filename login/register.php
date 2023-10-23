<?php
$db = new mysqli("localhost:3306", "root", "", "artstack");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

if ($db->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();
?>
