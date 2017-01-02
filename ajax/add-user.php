<?php
require_once "../class/service/UserService.php";
$userService = new UserService();
$successUserRegistration = $userService->addUsers($_POST);

$email=$_POST['email'];


 if($successUserRegistration== 1)
{
	header("location:../account.php?successUserRegistration=1");
}
else
{
	header("location:../account.php?successUserRegistration=1");
} 


?>