<?php 
require_once '../class/service/UserService.php';
$userService = new UserService();
$email=$_POST['email'];
$data=$userService->checkUser($email);
if(sizeOf($data)==0)
{
	header('location:../forgot-password.php?checkEmail=0');
}
else
{
	$changePassword=$userService->randomPassword($email);
	header('location:../forgot-password.php?checkEmail=1');
	
}


?>