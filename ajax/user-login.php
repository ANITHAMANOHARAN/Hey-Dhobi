<?php
require_once "../class/service/UserService.php";
$userService= new UserService();
$email=$_POST['email'];
$password=$_POST['password'];
$authenticate=$userService->authenticateUser($email, $password);
 if($authenticate == 1)
{
	header("location:../book-dhobi.php");
	
	
}
else {
	header("location:../account.php?login-success=".$authenticate);
}

?>