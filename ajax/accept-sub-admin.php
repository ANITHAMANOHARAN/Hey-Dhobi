<?php
require_once '../class/service/AdminService.php';
$adminService= new AdminService();
$subAdminId=$_GET['subAdminId'];
$activateReviews=$adminService->acceptSubAdmin($subAdminId);
header("location:../admin/view-sub-admin.php");
?>