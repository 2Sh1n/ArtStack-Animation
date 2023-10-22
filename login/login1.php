<?php

$db = new PDO('localhost','root','', 'artstack');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = 'SELECT * FROM users WHERE email = ?';
$stmt = $db->prepare($sql);
$stmt->execute([$email]);

$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
  // The user is authenticated.
} else {
  // The user is not authenticated.
}

?>
