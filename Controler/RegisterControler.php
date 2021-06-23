<?php

require '../Model/User.php';

$email = $_POST['email'];
$password = $_POST['password'];
$u = new User(1, $email, $password, 'beginner', new DateTime());

$u->register();

?>
