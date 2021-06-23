<?php
session_start();
require '../Model/Message.php';
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$m = new Message(null, $email, $phone, $name, $message, null);
$m->SaveMessage();
$_SESSION['message'] = 'Message sent';
header('location:../index.php');
?>
