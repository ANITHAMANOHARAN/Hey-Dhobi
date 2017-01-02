<?php 
require_once '../class/service/AdminService.php';
$adminService = new AdminService();
$orderId=$_GET['orderId'];
$successAddCost=$adminService->addCostById($orderId,$_POST);
header('location:../admin/view-order.php?successAddCost='.$successAddCost);

?>