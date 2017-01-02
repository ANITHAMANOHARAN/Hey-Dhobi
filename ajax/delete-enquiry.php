<?php
require_once '../class/service/AdminService.php';
$enquiryId= $_GET['enquiryId'];
$adminService= new AdminService();
$deleteEnquiry=$adminService->deleteEnquiry($enquiryId);
header("location:../admin/view-enquiry.php");
?>