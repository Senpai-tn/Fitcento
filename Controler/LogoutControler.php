<?php
session_start();
$_SESSION['id'] = null;
header('location:../index.php');
?>
