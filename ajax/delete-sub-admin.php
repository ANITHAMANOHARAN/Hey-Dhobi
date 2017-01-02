<?php
require '../class/service/AdminService.php';
$subAdminId=$_GET['subAdminId'];
$adminService= new AdminService();
$successDeleteSubAdmin=$adminService->deleteSubAdminById($subAdminId);
header("location:../admin/view-sub-admin.php?successDeleteSubAdmin=".$successDeleteSubAdmin);

?>