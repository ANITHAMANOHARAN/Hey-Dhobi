<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
	$userId=$_SESSION['userId'];
}
require_once '../class/service/UserService.php';
$userService= new UserService();
$successUpdatePassword=$userService->updateUserPasswordById($_POST, $userId);
if($successUpdatePassword)
{
	header("Location:../change-password.php?successUpdatePassword=".$successUpdatePassword);
}
?>