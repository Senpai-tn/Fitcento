<?php
session_start();
require '../Model/User.php';
require '../Model/Purchase.php';
$plan = $_GET['plan'];
echo $plan;
$u = new User($_SESSION['id'], null, null, null, null);
$u->buy_plan($plan);

$price = 0;

switch ($plan) {
    case 'BEGINNER':
        $price = 40;
        break;
    case 'PREMIUM':
        $price = 80;
        break;
    case 'ULTIMATE':
        $price = 100;
        break;

    default:
        # code...
        break;
}

$p = new Purchase(null, $_SESSION['id'], $price, null);
$p->SavePurchase();
$_SESSION['message'] = 'Buy successfuly';
header('location:../index.php');
?>
