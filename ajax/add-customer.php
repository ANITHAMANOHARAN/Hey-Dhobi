<?php
require_once "../class/service/UserService.php";
$userService = new UserService();
$successUserRegistration = $userService->addUsers($_POST);
header("location:../admin/add-customer.php?successUserRegistration=1");

?>