<?php 
require_once '../class/service/AdminService.php';
$orderId=$_GET['orderId'];
$adminService= new AdminService();
$processOrder=$adminService->ProcessingStatus($orderId);
header("location:../admin/view-order1.php?processOrder=".$processOrder);
?>