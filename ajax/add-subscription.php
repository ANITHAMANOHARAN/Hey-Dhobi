<?php 
require_once '../class/service/AdminService.php';
$adminService= new AdminService();
$userId=$_GET['userId'];
$packageId=$_GET['packageId'];
$validitiy=$_GET['validitiy'];
$addSubscription=$adminService->addSubscription($userId,$packageId,$validitiy);
header('location:../admin/add-subscription.php?addSubscription='.$addSubscription);


?>