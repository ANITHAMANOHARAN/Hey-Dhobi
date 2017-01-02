<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
	$userId=$_SESSION['userId'];
}
require_once '../class/service/UserService.php';
$userService= new UserService();
$successUserUpdate=$userService->updateUserByUserId($_POST, $userId);
if($successUserUpdate)
{
	header("Location:../edit-profile.php?successUserUpdate=".$successUserUpdate);
}
?>