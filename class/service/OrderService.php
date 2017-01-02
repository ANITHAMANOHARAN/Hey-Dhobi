<?php 
require_once 'class.mysql.php';
class OrderService extends MySql
{
	function OrderService()
	{
		$this->MySql();
	}
	
	function addOrder($post,$userId)
	{
		$successAddOrder;
		$this->beginTransaction();
		try {
		$date=$post['date'];
		$time=$post['time'];
		$deliveryDate = $post['delivery-date'];
		$deliveryTime=$post['delivery-time'];
		$q1=implode(',', $post['types']);
		$others=$post['others'];
		$coupon=$post['coupon'];
		$message=$post['message'];
		$createdOn=time();
		$query="INSERT INTO schedule_picker(USER_ID,DATE,TIME,DELIVERY_DATE, DELIVERY_TIME, TYPES,OTHERS,MESSAGE,STATUS,CREATED_ON,ORDER_DELIVERY,COUPON) VALUES('$userId','$date','$time','$deliveryDate','$deliveryTime','$q1','$others','$message','PENDING','$createdOn','$orderDelivery','$coupon')";
		$this->ExecuteQuery($query, "insert");
		
		$query1="SELECT * FROM user WHERE USER_ID='".$userId."'";
		$data1=$this->ExecuteQuery($query1,"select");
		
		$usermob = $data1[0]['MOBILE_NUMBER'];
		$username = $data1[0]['FULL_NAME'];
		$sms = "Hi ".$username.", We have received your order! We will soon connect you. www.heydhobi.com";
		$this->sendSMS($usermob, $sms);
				
		if(empty($query))
		{
			$successAddOrder=0;
		}
		else 
		{
			$successAddOrder=1;
			$sms = "Hello Admin, you have a new enquiry! Please login to your admin panel for more details. www.heydhobi.com";
				//$mobile = '9820996279';
				$mobile='9396141414';
				$this->sendSMS($mobile, $sms);		
		}
		$this->commitTransaction();
	}
	catch (Exception $e)
	{
		$this->rollbackTransaction();
		
	}
	
	return $successAddOrder;
	}
	
	function viewOrdersByUserId($userId)
	{
		$data;
		$successViewOrders;
		try {
			$query="SELECT * FROM schedule_picker WHERE USER_ID='".$userId."' ORDER BY CREATED_ON";
			$data=$this->ExecuteQuery($query,"select");
			$this->commitTransaction();
			if(empty($data))
			{
				$successViewOrders=0;
			}
			else 
			{
				$successViewOrders=1;
			}
			$this->commitTransaction();
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction();
		}
		return $data;
		return $successViewOrders;
	}
	
	function viewOrdersByUserId1($userId)
	{
		$data;
		$successViewOrders;
		try {
			$query="SELECT * FROM schedule_picker WHERE USER_ID='".$userId."'AND STATUS!= 'COMPLETED'  ORDER BY CREATED_ON";
			$data=$this->ExecuteQuery($query,"select");
			$this->commitTransaction();
			if(empty($data))
			{
				$successViewOrders=0;
			}
			else
			{
				$successViewOrders=1;
			}
			$this->commitTransaction();
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction();
		}
		return $data;
		return $successViewOrders;
	}
	
	function viewTypes()
	{
		$data;
		$this->beginTransaction();
		try{
			$query="SELECT * FROM types";
			$data=$this->ExecuteQuery($query,"select");
			$this->commitTransaction();
			
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction();
		}
		return $data;
	}
	
	function countPendingOrder($userId)
	{
		$data;
		$this->beginTransaction();
		try
		{
			$query=" SELECT COUNT(*) AS 'COUNT' FROM  schedule_picker WHERE STATUS='PENDING' AND USER_ID='$userId'";
			$data=$this->ExecuteQuery($query,"select");
			$this->commitTransaction();
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction();
		}
		return $data[0];
	}
	
	function countCompletedOrder($userId)
	{
		$data;
		$this->beginTransaction();
		try{
			$query="SELECT COUNT(*) AS 'COUNT' FROM schedule_picker WHERE STATUS='COMPLETED' AND USER_ID='$userId'";
			$data=$this->ExecuteQuery($query,"select");
			$this->commitTransaction();
			
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction();
		}
		return $data[0];
	}
	
	function viewCompletedOrdersById($userId)
	{
		$data;
		$this->beginTransaction();
		try {
			$query="SELECT * FROM schedule_picker WHERE STATUS='COMPLETED' AND USER_ID='$userId'";
			$data=$this->ExecuteQuery($query,"select");
			$this->commitTransaction();
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction();
		}
		return $data;
	}
	function viewSubscriptions($name)
	{
		$data;
		$this->beginTransaction();
		try{
			$query="SELECT * FROM subscription_package WHERE PACKAGE_NAME='$name'";
			$data=$this->ExecuteQuery($query,"select");
			$this->commitTransaction();
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction();
		}
		return $data;
			
	}

	function sendSMS($mobile, $message)
	{
		$msg = urlencode($message);
			$url ="http://api-alerts.solutionsinfini.com/v3/?method=sms&api_key=A650989f73fd2bcac08e1bcd6dcdf7176&to=".$mobile."&sender=HDhobi&message=".$msg;
		    file_get_contents($url);
	}
}

?>