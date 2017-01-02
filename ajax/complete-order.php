<?php 
require_once '../class/service/AdminService.php';
$orderId=$_GET['orderId'];
$adminService= new AdminService();
$completeOrder=$adminService->CompletedStatus($orderId);
header("location:../admin/view-complete-order.php?completeOrder=".$completeOrder);
?>