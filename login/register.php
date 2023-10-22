<?php

$db = new PDO('localhost','root','','artstack');

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$sql = 'INSERT INTO users (name, email, password) VALUES (?, ?, ?)';
$stmt = $db->prepare($sql);
$stmt->execute([$name, $email, $password]);

?>
