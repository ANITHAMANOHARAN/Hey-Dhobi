<?php 
require_once '../class/service/AdminService.php';
$orderId=$_GET['orderId'];
$adminService= new AdminService();
$confirmOrder=$adminService->confirmedStatus($orderId);
header("location:../admin/view-order.php?confirmOrder=".$confirmOrder);
?>