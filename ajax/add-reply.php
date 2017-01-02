<?php
require_once '../class/service/AdminService.php';
$adminService=new AdminService();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $adminId=$_SESSION['adminId'];
    }
 $email=$_GET['email'];
$enquiryId=$_GET['enquiryId'];

$successReply=$adminService->addReply($_POST,$adminId,$enquiryId,$email);
header('location:../admin/view-enquiry.php?successReply='.$successReply);

?>