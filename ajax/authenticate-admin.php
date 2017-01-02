<?php
require_once '../class/service/AdminService.php';
$adminService= new AdminService();
$adminEmail=$_POST['adminEmail'];
$adminPassword=$_POST['adminPassword'];
$authenticateAdmin=$adminService->authenticateAdmin($adminEmail, $adminPassword);
if($authenticateAdmin)
{
	header("Location:../admin/index.php");
}
else 
{
	header("Location:../admin/admin-login.php");
}
if(!isset($_SESSION['adminId']))
{
	header("Location:../admin/admin-login.php");
}
?>