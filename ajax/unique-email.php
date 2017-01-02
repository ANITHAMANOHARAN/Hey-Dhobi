<?php
require_once '../class/service/UserService.php';
$userService= new UserService();
$email= $_POST['email'];
$uniqueEmail=$userService->getUserByEmailId($email);
if(sizeof($uniqueEmail['EMAIL']) >=1 )
{
	echo 0;
}
else 
{
	echo 1;
}
?>