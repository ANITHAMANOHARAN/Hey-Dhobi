<?php
require_once '../class/service/AdminService.php';
$subAdminId=$_GET['subAdminId'];
$adminService= new AdminService();
$successUpdateSubAdmin=$adminService->updateSubAdminById($_POST,$subAdminId);
if(successUpdateSubAdmin)
{
	header("location:../admin/view-sub-admin.php?successUpdateSubAdmin=".$successUpdateSubAdmin);
}

?>