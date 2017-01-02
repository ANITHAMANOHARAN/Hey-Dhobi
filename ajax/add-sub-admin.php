<?php
require_once '../class/service/AdminService.php';
$adminService= new AdminService();
$successAddSubAdmin=$adminService->addSubAdmin($_POST);
if($successAddSubAdmin)
{
	header("Location:../admin/index.php?successAddSubAdmin=".$successAddSubAdmin);
}
?>