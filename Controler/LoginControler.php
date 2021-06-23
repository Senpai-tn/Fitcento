<?php
require '../Model/User.php';
session_start();
$email = $_POST['email_register'];
$password = $_POST['password_register'];

$u = new User(null, $email, $password, null, null);

if (sizeof($u->login()) == 0) {
    $_SESSION['error'] = 'check information';
    header('location:../logins.php');
} else {
    $_SESSION['message'] = null;
    $_SESSION['id'] = $u->login()[0]['id'];
    header('location:../index.php');
}

?>
