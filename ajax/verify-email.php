<?php
require_once "../class/service/UserService.php";

$userService= new UserService();

$email=$_GET['email'];
$verificationCode=$_GET['hash'];
$success=$userService->verifyEmail($verificationCode,$email);
header("Location:../account.php?success=$success");
?>