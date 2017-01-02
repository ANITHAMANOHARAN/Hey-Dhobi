<?php
require_once 'class.mysql.php';
class AdminService extends  MySql
{
	function AdminService()
	{
		$this->MySql();
	}
	function authenticateAdmin($adminEmail,$adminPassword)
	{
		$authenticateAdmin=false;
		$this->beginTransaction();
		try {
			$query="SELECT * FROM admin where ADMIN_EMAIL='".$adminEmail."'";
			$data=$this->ExecuteQuery($query,"select");
			
				
			if(empty($data))
			{
				$authenticateAdmin=false;
			}
			elseif($adminPassword==$data[0]['PASSWORD'])
			{
				if (!isset($_SESSION))
				{
					session_start();
					$_SESSION['adminEmail']=$adminEmail;
					$_SESSION['userId']=$data[0]['ADMIN_ID'];
					$_SESSION['adminId']=$data[0]['ADMIN_ID'];
					$_SESSION['type']="ADMIN";
				}
				$authenticateAdmin=true;
		}
		$this->commitTransaction();
		}
      catch(Exception $e)
      {
      	$this->rollbackTransaction();
      }
       return $authenticateAdmin;
      }
      function showUsers()
      {
      	$data;
      	$this->beginTransaction();
      	try {
      		$query="SELECT * FROM user order by FULL_NAME ASC";
      		$data=$this->ExecuteQuery($query,"select");
      		$this->commitTransaction();
      	}
      	catch(Exception $e)
      	{
      		$this->rollbackTransaction();
      	}
      	return $data;
      }
       
          
        function activateUser($userId)
	 	{
	 		$this->beginTransaction();
	 		try {
	 			$query="UPDATE user SET ACTIVE='Y' where USER_ID='".$userId."'";
	 			$this->ExecuteQuery($query,"update");
	 			$this->commitTransaction();
	 		}
	 		
	 		catch(Exception $e)
	 		{
	 			$this->rollbackTransaction();
	 		}
	 	}
	 	function deactivateUser($userId)
	 	{
	 		$this->beginTransaction();
	 		try {
	 			$query="UPDATE user SET ACTIVE='N' where USER_ID='".$userId."'";
	 			$this->ExecuteQuery($query,"update");
	 			$this->commitTransaction();
	 		}
	 	
	 		catch(Exception $e)
	 		{
	 			$this->rollbackTransaction();
	 		}
	 	}
	 	
	 	function viewOrders()
	 	{
	 		$viewOrders;
	 		$data;
	 		$this->beginTransaction();
	 		try {
	 			$query="SELECT * FROM schedule_picker WHERE STATUS<>'COMPLETED' AND STATUS <>'PROCESSING' AND STATUS <> 'ORDER CONFIRMED' ORDER BY CREATED_ON DESC ";
	 			$data=$this->ExecuteQuery($query,"select");
	 			if(empty($data))
	 			{
	 				$viewOrders=0;
	 			}
	 			else 
	 			{
	 				$viewOrders=1;
	 			}
	 			$this->commitTransaction();
	 		}
	 		catch(Exception $e)
	 		{
	 			$this->rollbackTransaction();
	 		}
	 		return $data;
	 		return $viewOrders;
	 	}
	 	
	 	 function viewOrdersPending()
	 	 {
	 	 	$viewOrders;
	 	 	$data;
	 	 	$this->beginTransaction();
	 	 	try {
	 	 		$query="SELECT * FROM schedule_picker WHERE STATUS<>'COMPLETED' AND STATUS <>'PENDING'   ORDER BY CREATED_ON DESC ";
	 	 		$data=$this->ExecuteQuery($query,"select");
	 	 		if(empty($data))
	 	 		{
	 	 			$viewOrders=0;
	 	 		}
	 	 		else
	 	 		{
	 	 			$viewOrders=1;
	 	 		}
	 	 		$this->commitTransaction();
	 	 	}
	 	 	catch(Exception $e)
	 	 	{
	 	 		$this->rollbackTransaction();
	 	 	}
	 	 	return $data;
	 	 	return $viewOrders;
	 	 }
	 	 
	 	
	 	function viewCompleteOrders()
	 	{
	 		$data;
	 		$this->beginTransaction();
	 		try{
	 			$query="SELECT * FROM schedule_picker WHERE STATUS='COMPLETED' ORDER BY CREATED_ON DESC";
	 			$data=$this->ExecuteQuery($query,"select");
	 			$this->commitTransaction();
	 		}
	 		catch(Exception $e)
	 		{
	 			$this->rollbackTransaction();
	 		}
	 		
	 		return $data;
	 	}
	 	
	 	function viewUserOrders($userId)
	 	{
	 	$data;
	 	$this->beginTransaction();
	 	try{
	 		$query="SELECT * FROM schedule_picker WHERE USER_ID='$userId'";
	 		$data=$this->ExecuteQuery($query,"select");
	 		$this->commitTransaction();
	 	}
	 	catch(Exception $e)
	 	{
	 		$this->rollbackException();
	 	}
	 		return $data;
	 	}
	 	function showOrders()
	 	{
	 		$data;
	 		$this->beginTransaction();
	 		try
	 		{
	 			$query="SELECT * FROM schedule_picker";
	 			$data=$this->ExecuteQuery($query,"select");
	 			$this->commitTransaction();
	 		}
	 		catch(Exception $e)
	 		{
	 			$this->rollbackTransaction();
	 		}
	 		return $data;
	 	}
	 	
	 	function confirmedStatus($orderId)
	 	{
	 		$confirmOrder=0;
	 		try {
	 			$query="UPDATE schedule_picker SET STATUS='ORDER CONFIRMED' WHERE ORDER_ID='".$orderId."'";
	 			$this->ExecuteQuery($query,"update");
	 			if(empty($query))
	 			{
	 				$confirmOrder=0;
	 			}
	 			else 
	 			{
	 				$confirmOrder=1;
	 			}
	 			$this->commitTransaction();
	 			
	 		}
	 		catch(Exception $e)
	 		{
	 			$this->rollbackTransaction();
	 		}
	 		return $confirmOrder;
	 	}
	
	
	function ProcessingStatus($orderId)
	{
		$processOrder=0;
		try {
			$query="UPDATE schedule_picker SET STATUS='PROCESSING' WHERE ORDER_ID='".$orderId."'";
			$this->ExecuteQuery($query,"update");
			if(empty($query))
			{
				$processOrder=0;
			}
			else 
			{
				$processOrder=1;
			}
			$this->commitTransaction();
		 	
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction();
		}
		return $processOrder;
	}
	
	function CompletedStatus($orderId)
	{
		$completeOrder=0;
		try {
			$query="UPDATE schedule_picker SET STATUS='COMPLETED' WHERE ORDER_ID='".$orderId."'";
			$this->ExecuteQuery($query,"update");
			if(empty($query))
			{
				$completeOrder=0;
			}
			else{
				$completeOrder=1;
			}
			$this->commitTransaction();
	
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction();
		}
		return $completeOrder;
	}
	function viewEnquiry()
	{
		$data;
		$this->beginTransaction();
		try {
			$query="SELECT * FROM enquiry WHERE ARCHIVE='N'";
			$data=$this->ExecuteQuery($query,"select");
			$this->commitTransaction();
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction();
		}
		return $data;
	}
	
	function deleteEnquiry($enquiryId)
	{
		$this->beginTransaction();
		try 
		{
		$query="UPDATE enquiry SET ARCHIVE='Y' WHERE ENQUIRY_ID='".$enquiryId."'";
		$this->ExecuteQuery($query,"update");
		$this->commitTransaction();
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction();
		}
	}
	function addSubAdmin($post)
	{
		$successAddSubAdmin=0;
		$this->beginTransaction();
		try {
			$name=$post['name'];
			$email=$post['email'];
			$password=$post['password'];
			$query="INSERT INTO admin(ADMIN_NAME,ADMIN_EMAIL,PASSWORD,TYPE,ARCHIVE) VALUES('$name','$email','$password','SUB-ADMIN','N')";
			$this->ExecuteQuery($query,"insert");
			if(empty($query))
			{
				$successAddSubAdmin=0;
			}
			else
			{
				$successAddSubAdmin=1;
			}
			$this->commitTransaction();
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction();
		}
		return $successAddSubAdmin;
	}
	 
	function getSubAdmins()
	{
		$data;
		$this->beginTransaction();
		try{
			$query="SELECT * FROM admin WHERE ARCHIVE='N'";
			$data=$this->ExecuteQuery($query,"select");
			$this->commitTransaction();
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction();
	
		}
		return $data;
	}
	 
	 
	function getSubAdminById($subAdminId)
	{
		$data;
		$this->beginTransaction();
		try{
			$query="SELECT * FROM admin WHERE ADMIN_ID='".$subAdminId."'";
			$data=$this->ExecuteQuery($query,"select");
			$this->commitTransaction();
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction();
		 	
		}
		return $data[0];
	}
	 
	function acceptSubAdmin($subAdminId)
	{
	
		$this->beginTransaction();
		try {
			$query="UPDATE admin SET STATUS='Y' WHERE ADMIN_ID='".$subAdminId."'";
			$this->ExecuteQuery($query,"update");
			$this->commitTransaction();
		 	
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction();
		}
	}
	function rejectSubAdmin($subAdminId)
	{
		 
		$this->beginTransaction();
		try {
			$query="UPDATE admin SET STATUS='N' WHERE ADMIN_ID='".$subAdminId."'";
			$this->ExecuteQuery($query,"update");
			$this->commitTransaction();
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction();
		}
	}
	 
	function updateSubAdminById($post,$subAdminId)
	{
		$successUpdateSubAdmin;
		$this->beginTransaction();
		try {
			$name=$post['name'];
			$email=$post['email'];
			$query="UPDATE admin SET ADMIN_NAME='".$name."',ADMIN_EMAIL='".$email."' WHERE ADMIN_ID='".$subAdminId."'";
			$this->ExecuteQuery($query,"update");
			if(empty($query))
			{
				$successUpdateSubAdmin=0;
			}
			else
			{
				$successUpdateSubAdmin=1;
			}
			$this->commitTransaction();
		 	
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction();
		}
		return $successUpdateSubAdmin;
	}
	 
	function deleteSubAdminById($subAdminId)
	{
		$successDeleteSubAdmin;
		$this->beginTransaction();
		try {
			$query="UPDATE admin SET ARCHIVE='Y' WHERE ADMIN_ID='".$subAdminId."'";
			$this->ExecuteQuery($query,"update");
			if(empty($query))
			{
				$successDeleteSubAdmin=0;
			}
			else
			{
				$successDeleteSubAdmin=1;
			}
			$this->commitTransaction();
		 	
		} catch (Exception $e) {
			$this->rollbackTransaction();
		}
		return $successDeleteSubAdmin;
	}
	
	function addReply($post,$adminId,$enquiryId,$email)
	{
		$successReply;
		$this->beginTransaction();
		try
		{
			$message=$post['message'];
			$createdOn=time();
			$query="INSERT INTO reply(ENQUIRY_ID,ADMIN_ID,EMAIL_ID,MESSAGE,CREATED_TIME,ARCHIVE) values('".$enquiryId."','".$adminId."','".$email."','".$message."','".$createdOn."','N')";
			$this->ExecuteQuery($query,"insert");
			$message=$message;
			$to=$email;
			$header="noreply@heyDhobi.com";
			$subject="Reply";
			mail($to,$subject,$message);
			if(!empty($query))
			{
				$successReply=1;
			}
			else 
			{
				$successReply=0;
			}
			$this->commitTransaction();
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction();
		}
		return $successReply;
	}
	 
	function viewOrderById($orderId)
	{
		$data;
		$this->beginTransaction();
		try{
			$query="SELECT * FROM schedule_picker WHERE ORDER_ID='$orderId'";
			$data=$this->ExecuteQuery($query,"select");
			$this->commitTransaction();
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction;
		}
		return $data[0];
	}
	
	
	
	function addCostById($orderId,$post)
	{
		$successAddCost=0;
		$this->beginTransaction();
		try{
			$washAndFoldWeight=$post['washAndFoldWeight'];
			$washAndFoldRate=$post['washAndFoldRate'];
			$ironingWeight=$post['ironingWeight'];
			$ironingRate=$post['ironingRate'];
			$washAndIronWeight=$post['washAndIronWeight'];
			$washAndIronRate=$post['washAndIronRate'];
			$dryAndCleanWeight=$post['dryAndCleanWeight'];
			$dryAndCleanRate=$post['dryAndCleanRate'];
			$extraWashAndFold=$post['extraWashAndFold'];
			$extraIroning=$post['extraIroning'];
			$extraWashAndIron=$post['extraWashAndIron'];
			$extraDryClean=$post['extraDryClean'];
			$mobile=$post['cust_number'];
		
		$query="UPDATE schedule_picker SET WASH_AND_FOLD_W='$washAndFoldWeight',WASH_AND_FOLD_R='$washAndFoldRate',IRONING_W='$ironingWeight',IRONING_R='$ironingRate',
				WASH_AND_IRON_W='$washAndIronWeight',WASH_AND_IRON_R='$washAndIronRate',DRY_CLEAN_W='$dryAndCleanWeight',DRY_CLEAN_R='$dryAndCleanRate',EXTRA_WASH_AND_FOLD='$extraWashAndFold',EXTRA_DRY_CLEAN='$extraDryClean',EXTRA_IRONING='$extraIroning',EXTRA_WASH_IRON='$extraWashAndIron' WHERE ORDER_ID='$orderId'";
		$this->ExecuteQuery($query,"update");
		$this->commitTransaction();
		
		$message = "We have received your order. Details are '".$extraWashAndFold."' '".$extraIroning."' '".$extraWashAndIron."' '".$extraDryClean."'. You can track the status of your order on Heydhobi.com";
		$this->sendSMS($mobile, $message);
		
		
		/*$message = "We have received your order. Details are '".$extraWashAndFold."' '".$extraIroning."' '".$extraWashAndIron."' '".$extraDryClean."'. You can track the status of your order on Heydhobi.com";
				//$mobile = '9820996279';
				$msg = urlencode($message);
				$url = "http://sms.jsmedias.in/api/sendmsg.php?user=dumbs&pass=10dumbs&sender=DIRECT&phone=".$mobile."&text=".$msg."&priority=ndnd&stype=normal";
			    file_get_contents($url);*/
		
		
		$successAddCost=1;
		}
		
		catch(Exception $e)
		{
			$this->rollbackTransaction();
		}
		
		return $successAddCost;
	}
	
	
	function sendSMS($mobile, $message)
	{
		$msg = urlencode($message);
			$url ="http://api-alerts.solutionsinfini.com/v3/?method=sms&api_key=A650989f73fd2bcac08e1bcd6dcdf7176&to=".$mobile."&sender=HDhobi&message=".$msg;
		    file_get_contents($url);
	}
	
function countUser()
	 		{
	 			$data;
	 			$this->beginTransaction();
	 			try {
	 				$query="SELECT COUNT(*) as TOTAL FROM user WHERE ARCHIVE='N'  ";
	 				$data=$this->ExecuteQuery($query, "select");
	 				$this->commitTransaction();
	 			}
	 			catch(Exception $e)
	 			{
	 				$this->rollbackTransaction();
	 			}
	 			return $data[0];
	 		}
	 		
	 		function newOrder()
	 		{
	 			$data;
	 			$this->beginTransaction();
	 			try {
	 				$query="SELECT COUNT(*) as TOTAL FROM schedule_picker WHERE STATUS='PENDING'";
	 				$data=$this->ExecuteQuery($query, "select");
	 				$this->commitTransaction();
	 			}
	 			catch(Exception $e)
	 			{
	 				$this->rollbackTransaction();
	 			}
	 			return $data[0];
	 		}
	 		

	 		function countPendingOrder()
	 		{
	 			$data;
	 			$this->beginTransaction();
	 			try {
	 				$query="SELECT COUNT(*) as TOTAL FROM schedule_picker WHERE STATUS='PROCESSING' OR STATUS='ORDER CONFIRMED'";
	 				$data=$this->ExecuteQuery($query, "select");
	 				$this->commitTransaction();
	 			}
	 			catch(Exception $e)
	 			{
	 				$this->rollbackTransaction();
	 			}
	 			return $data[0];
	 		}
	 		
	 		function countEnquiry()
	 		{
	 			$data;
	 			$this->beginTransaction();
	 			try {
	 				$query="SELECT COUNT(*) as TOTAL FROM enquiry WHERE ARCHIVE='N'";
	 				$data=$this->ExecuteQuery($query, "select");
	 				$this->commitTransaction();
	 			}
	 			catch(Exception $e)
	 			{
	 				$this->rollbackTransaction();
	 			}
	 			return $data[0];
	 		}
	 		
	 		function addSubscription($userId,$packageId,$validitiy)
	 		{
	 			$addSubscription;
	 			$this->beginTransaction();
	 			try
	 			{
	 				
	 				$expireDate=date('d/m/Y', strtotime('+'. intval($validitiy).'days'));
	 				$currentTime=time();
	 				$query="INSERT INTO user_subscription(USER_ID,PACKAGE_ID,SUBSCRIPTION_DATE,EXPIRE_DATE) VALUES('$userId','$packageId','$currentTime','$expireDate')";
	 				$this->ExecuteQuery($query,"insert");
	 				if(empty($query))
	 				{
	 					$addSubscription=0;
	 				}
	 				else
	 				{
	 					$addSubscription=1;
	 				}
	 				$this->commitTransaction();
	 				
	 			}
	 			catch(Exception $e)
	 			{
	 				$this->rollbackTransaction();
	 			}
	 			return $addSubscription;
	 		}
	 		
	 		function userSubscription($userId)
	 		{
	 			$data;
	 			$this->beginTransaction();
	 			try{
	 				$query="SELECT * FROM user_subscription WHERE USER_ID='$userId'";
	 				$data=$this->ExecuteQuery($query,"select");
	 				$this->commitTransaction();
	 			}
	 			catch(Exception $e)
	 			{
	 				$this->rollbackTransaction();
	 			}
	 			return $data;
	 		}
	 		
	 		function viewSubscriptionById($packageId)
	 		{
	 			$data;
	 			$this->beginTransaction();
	 			try{
	 				$query="SELECT * FROM subscription_package WHERE PACKAGE_ID='$packageId'";
	 				$data=$this->ExecuteQuery($query,"select");
	 				$this->commitTransaction();
	 			}
	 			catch(Exception $e)
	 			{
	 				$this->rollbackTransaction();
	 			}
	 			return $data;
	 		}
	 		
	 		function activatePlan($packageId)
	 		{
	 			$activatePackage=0;
	 			$this->beginTransaction();
	 			try{
	 				$query="UPDATE user_subscription SET  STATUS='ACTIVE' WHERE PACKAGE_ID='$packageId'";
	 				$this->ExecuteQuery($query,"update");
	 				if(empty($query))
	 				{
	 					$activatePackage=0;
	 				}
	 				else
	 				{
	 					$activatePackage=1;
	 				}
	 				$this->commitTransaction();
	 			}
	 			catch(Exception $e)
	 			{
	 				$this->rollbackTransaction();
	 			}
	 			return $activatePackage;
	 		}
	 		
	 		function deactivatePlan($packageId)
	 		{
	 			$deactivatePackage=0;
	 			$this->beginTransaction();
	 			try{
	 				$query="UPDATE user_subscription SET  STATUS='DEACTIVE' WHERE PACKAGE_ID='$packageId'";
	 				$this->ExecuteQuery($query,"update");
	 				if(empty($query))
	 				{
	 					$deactivatePackage=0;
	 				}
	 				else
	 				{
 	 					$deactivatePackage=1;
	 				}
	 				$this->commitTransaction();
	 			}
	 			catch(Exception $e)
	 			{
	 				$this->rollbackTransaction();
	 			}
	 			return $deactivatePackage;
	 		}
	 		
	 		function viewUserById($userId)
	 		{
	 			$data;
	 			$this->beginTransaction();
	 			try{
	 				$query="SELECT * FROM user WHERE USER_ID='$userId'";
	 				$data=$this->ExecuteQuery($query,"select");
	 				$this->commitTransaction();
	 			}
	 			catch(Exception $e)
	 			{
	 				$this->rollbackTransaction();
	 			}
	 			return $data[0];
	 		}
	 		
	 		function viewSuburbById($suburb)
	 		{
	 			$data;
	 			$this->beginTransaction();
	 			try {
	 				$query="select * from suburb where SUBURB_ID='$suburb'";
	 				$data=$this->ExecuteQuery($query,"select");
	 				$this->commitTransaction();
	 			}
	 			catch(Exception $e)
	 			{
	 				$this->rollbackTransaction();
	 			}
	 			return $data[0];
	 		}
	 		
	 		function viewName($term)
	 		{
	 			$this->beginTransaction();
	 			$data;
	 			try{
	 				$query="SELECT * FROM  user WHERE FULL_NAME LIKE '%".$term."%' ORDER BY USER_ID ASC";
	 				$data=$this->ExecuteQuery($query,"select");
	 				$this->commitTransaction();
	 			}
	 			catch(Exception $e)
	 			{
	 				$this->rollbackTransaction();
	 			}
	 			return $data;
	 		}
	 		
	 		function viewNameById($userId)
	 		{
	 			$data;
	 			$this->beginTransaction();
	 			try{
	 				$query="SELECT * FROM user WHERE USER_ID='$userId'";
	 				$data=$this->ExecuteQuery($query,"select");
	 				$this->commitTransaction();
	 			}
	 			catch(Exception $e)
	 			{
	 				$this->rollbackTransaction();
	 			}
	 			return $data;
	 		}
	 		
}
?>