<?php
require_once "../class/service/OrderService.php";
$orderService = new OrderService();
$userId=$_GET['userId'];
$successAddOrder =$orderService->addOrder($_POST, $userId);
if($successAddOrder==1)
{
	header('Location:../admin/add-customer-order.php?successAddOrder='.$successAddOrder);
}
?>