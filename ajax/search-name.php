<?php
require_once '../class/service/AdminService.php';
$term = $_GET['term'];
$adminService= new AdminService();
$cities = $adminService->viewName($term);
$cityName = array();
$index = 0;
foreach($cities as $city)
{
	$cityName[$index]['label'] = $city['FULL_NAME'];
	$cityName[$index]['value'] = $city['USER_ID'];
	$index++;
}
echo json_encode($cityName);

?>