<?php
require_once "../class/service/OrderService.php";
$orderService = new OrderService();
if (session_status() == PHP_SESSION_NONE) {
	session_start();
	$userId=$_SESSION['userId'];
}
$successAddOrder =$orderService->addOrder($_POST, $userId);
if($successAddOrder==1)
{
	header('Location:../thank-you.php?successAddOrder='.$successAddOrder);
}
?>