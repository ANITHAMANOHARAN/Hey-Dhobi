<?php
require '../class/service/AdminService.php';
$adminService= new AdminService();
$userId=$_GET['userId'];
$activateUsers=$adminService->activateUser($userId);
header("location:../admin/user-management.php");
?>