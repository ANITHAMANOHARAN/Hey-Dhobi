<?php
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
	
	$arr_json_response = array();
	
	if(isset($_REQUEST["mode"]))
	{
		$mode = $_REQUEST["mode"];
		
		if($mode=="update_user")
		{
			if(isset($_REQUEST["user_id"]))
			{
				$user_id = $_REQUEST["user_id"];
				require_once 'class/service/UserService.php';
				$userService= new UserService();
				$successUserUpdate=$userService->updateUserByUserId($_REQUEST, $user_id);
				
				if($successUserUpdate)
				{
					array_push($arr_json_response,"success");
				}
				else
				{
					array_push($arr_json_response,"error");
				}
			}
			else{
				array_push($arr_json_response,"invalid_parameter");
			}
		}
		else if($mode=="change_password")
		{
			if(isset($_REQUEST["user_id"]) && isset($_REQUEST["old_password"]) && isset($_REQUEST["new_password"]))
			{
				$user_id = $_REQUEST["user_id"];
				include_once 'class/service/db_connect.php';
				$stmt_exists_user = $pdo->prepare("SELECT * FROM user WHERE user_id=?");
				$stmt_exists_user->execute([$user_id]);
				$user  = $stmt_exists_user->fetch(PDO::FETCH_ASSOC);
				
				if($stmt_exists_user->rowCount() > 0)
				{
					$db_password = $user['PASSWORD'];
					$old_password = $_REQUEST['old_password'];
					
					$db_enc_password = hash('sha512', $db_password);
					$old_enc_password = hash('sha512', $old_password);
					
					if($db_enc_password==$old_enc_password)
					{
						$new_password = $_REQUEST["new_password"];
						$new_enc_password = hash('sha512', $new_password);
						
						$update_user = $pdo->prepare("UPDATE user SET PASSWORD=?,encrypted_password=? WHERE USER_ID=? ");
						if($update_user->execute([$new_password,$new_enc_password,$user_id])){
							array_push($arr_json_response,"success");
						}else{
							array_push($arr_json_response,"error");
						}
						
					}
					else{
						array_push($arr_json_response,"invalid_password");
					}
				}
				else{
					array_push($arr_json_response,"invalid_parameter");
				}
			}
			else{
				array_push($arr_json_response,"invalid_parameter");
			}
		}
		else if($mode=="dashboard")
		{
			if(isset($_REQUEST["user_id"]))
			{
				$userId=$_REQUEST['user_id'];
				require_once 'class/service/OrderService.php';
				$orderService= new OrderService();
				$viewCompletedCount=$orderService->countCompletedOrder($userId);
				$viewPendingCount=$orderService->countPendingOrder($userId);
				
				array_push($arr_json_response,$viewCompletedCount['COUNT']."@".$viewPendingCount['COUNT']);
				
			}else{
				array_push($arr_json_response,"invalid_parameter");
			}
		}
		else if($mode=="place_order")
		{
			if(isset($_REQUEST["user_id"]) && isset($_REQUEST["date"]) && isset($_REQUEST["time"]) && isset($_REQUEST["delivery-date"])
				&& isset($_REQUEST["delivery-time"]) && isset($_REQUEST["types"]) && isset($_REQUEST["others"]) && isset($_REQUEST["coupon"]) 
				&& isset($_REQUEST["message"]))
			{
				include_once 'class/service/db_connect.php';
				$user_id=urldecode($_REQUEST["user_id"]);
				$date=$_REQUEST["date"];
				$time=$_REQUEST["time"];
				$deliveryDate=$_REQUEST["delivery-date"];
				$deliveryTime=$_REQUEST["delivery-time"];
				$types=urldecode(trim($_REQUEST["types"]));
				$others=urldecode($_REQUEST["others"]);
				$message=urldecode($_REQUEST["message"]);
				$status="PENDING";
				$createdOn=time();
				$coupon=urldecode($_REQUEST['coupon']);
				
				$arr_types = explode(",",$types);
				
				$str="";
				for($i=0;$i<count($arr_types);$i++){
					$str.="?,";
				}
				
				$str =  substr($str,0,-1);
				
				$str_query = "SELECT GROUP_CONCAT(TYPE_ID) AS IDs FROM types WHERE TYPE IN ($str)";
				
				$types_query = $pdo->prepare($str_query);
				$types_query->execute($arr_types);
				$res_types  = $types_query->fetch(PDO::FETCH_ASSOC);
								
				//echo "count=".$types_query->rowCount()."\n";				
				$types_ids = $res_types["IDs"];
				$place_order = $pdo->prepare("INSERT INTO schedule_picker(USER_ID,DATE,TIME,DELIVERY_DATE, DELIVERY_TIME, TYPES,OTHERS,MESSAGE,STATUS,CREATED_ON,COUPON) VALUES (?,?,?,?,?,?,?,?,?,?,?) ");
				if($place_order->execute([$user_id,$date,$time,$deliveryDate,$deliveryTime,$types_ids,$others,$message,$status,$createdOn,$coupon])){
					array_push($arr_json_response,"success");
				}else{
					array_push($arr_json_response,"error");
				}
			}
			else{
				array_push($arr_json_response,"invalid_parameter");
			}
		}
		else if($mode=="active_orders")
		{
			if(isset($_REQUEST["user_id"]))
			{
				include_once 'class/service/db_connect.php';
				$user_id = $_REQUEST["user_id"];
				/*require_once 'class/service/OrderService.php';
				$orderService= new OrderService();
				$viewOrders=$orderService->viewOrdersByUserId($user_id);
				if(sizeof($viewOrders)==0){
					array_push($arr_json_response,"no_records");
				}else{
					$arr_json_response = $viewOrders;
				}
				*/
				
				$active_orders_query = "SELECT *,GROUP_CONCAT(TYPE) AS ORDER_TYPES
								FROM schedule_picker s 
								JOIN types t ON FIND_IN_SET( t.TYPE_ID,s.TYPES)
								WHERE USER_ID=? AND STATUS<>'COMPLETED' 
								GROUP BY s.ORDER_ID
								ORDER BY CREATED_ON";
				
				$active_orders_query = $pdo->prepare($active_orders_query);
				$active_orders_query->execute([$user_id]);
				$res_types  = $active_orders_query->fetch(PDO::FETCH_ASSOC);
				if($active_orders_query->rowCount()>0){
					array_push($arr_json_response,$res_types);
				}else{
					array_push($arr_json_response,"no_records");					
				}
				
			}else{
				array_push($arr_json_response,"invalid_parameter");
			}
		}
		else if($mode=="completed_orders")
		{
			if(isset($_REQUEST["user_id"]))
			{
				include_once 'class/service/db_connect.php';
				$user_id = $_REQUEST["user_id"];
				
				$active_orders_query = "SELECT *,GROUP_CONCAT(TYPE) AS ORDER_TYPES
								FROM schedule_picker s 
								JOIN types t ON FIND_IN_SET( t.TYPE_ID,s.TYPES)
								WHERE USER_ID=? AND STATUS='COMPLETED' 
								GROUP BY s.ORDER_ID
								ORDER BY CREATED_ON";
				
				$active_orders_query = $pdo->prepare($active_orders_query);
				$active_orders_query->execute([$user_id]);
				$res_types  = $active_orders_query->fetch(PDO::FETCH_ASSOC);
				if($active_orders_query->rowCount()>0){
					array_push($arr_json_response,$res_types);
				}else{
					array_push($arr_json_response,"no_records");
				}
				
			}else{
				array_push($arr_json_response,"invalid_parameter");
			}
		}
		else if($mode=="notifications")
		{
			if(isset($_REQUEST["user_id"]))
			{
				include_once 'class/service/db_connect.php';
				$user_id = $_REQUEST["user_id"];
				
				$active_orders_query = "SELECT *,GROUP_CONCAT(TYPE) AS ORDER_TYPES
								FROM schedule_picker s 
								JOIN types t ON FIND_IN_SET( t.TYPE_ID,s.TYPES)
								WHERE USER_ID=? 
								GROUP BY s.ORDER_ID
								ORDER BY CREATED_ON";
				
				$active_orders_query = $pdo->prepare($active_orders_query);
				$active_orders_query->execute([$user_id]);
				//$res_types  = $active_orders_query->fetch(PDO::FETCH_ASSOC);
				if($active_orders_query->rowCount()>0){
					
					while ($row = $active_orders_query->fetch(PDO::FETCH_ASSOC)) {
						array_push($arr_json_response,$row);
					}
					
				}else{
					array_push($arr_json_response,"no_records");
				}
				
			}else{
				array_push($arr_json_response,"invalid_parameter");
			}
		}
		
		else{
			array_push($arr_json_response,"invalid_parameter");
		}
		
	}
	else
	{
		array_push($arr_json_response,"invalid_parameter");
	}
	
	echo json_encode($arr_json_response);
?>