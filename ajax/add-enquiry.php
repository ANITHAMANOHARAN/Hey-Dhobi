<?php
require_once '../class/service/EnquiryService.php';
$enquiryService= new EnquiryService();
$successEnquiry=$enquiryService->AddEnquiryByUser($_POST);
if($successEnquiry)
{
	header("location:../index.php?successEnquiry=".$successEnquiry);
}

?>