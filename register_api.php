<?php
	//ini_set('display_errors', 1); 
	//error_reporting(E_ALL);
	
	$arr_json_response = array();
	include_once 'class/service/db_connect.php';
	
	//ALTER TABLE  `user` ADD  `encrypted_password` VARCHAR( 255 ) NOT NULL AFTER  `PASSWORD`
	
	function uuid()
	{
		return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
	}
	
	function sendPushNotificationToGCM($registatoin_ids, $message) {
		//var_dump($message);
		
		//Google cloud messaging GCM-API url
		$url = 'https://android.googleapis.com/gcm/send';
		$fields = array(
			'registration_ids' => $registatoin_ids,
			'data' => $message,
		);
		// Google Cloud Messaging GCM API Key
		define("GOOGLE_API_KEY", "AIzaSyA9-0zHIdE7rxUFfeCSRi_aOrN-KaULzTU");//Server Key 		
		$headers = array(
			'Authorization: key=' . GOOGLE_API_KEY,
			'Content-Type: application/json'
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);	
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);				
		if ($result === FALSE) {
			die('Curl failed: ' . curl_error($ch));
		}
		curl_close($ch);
		return $result;
	}

	if(isset($_REQUEST["mode"]))
	{		
		$mode = $_REQUEST["mode"];
		
		if($mode=="fetch_suburbs")
		{
			try{
				
				if($stmt = $pdo->query("SELECT * FROM suburb")){
					//$stmt->execute(); 
					//$stmt->store_result();
					//$stmt->bind_result($suburb_id,$suburb);
					
					while ($data = $stmt->fetch( PDO::FETCH_ASSOC )) {
						array_push($arr_json_response,$data['SUBURB_ID']."#".$data['SUBURB']."#".$data['SUBURB']);
					}
					
				}else{
					array_push($arr_json_response,"error");
				}
			}catch(Exception $e){
				array_push($arr_json_response,"error");
			}
			
		}
		else if($mode=="register")
		{
			$email = $_REQUEST["email"];
			if($stmt = $pdo->prepare("SELECT * FROM user WHERE EMAIL=?")){
				$stmt->execute([$email]); 
				$stmt->fetch();
				
				if($stmt->rowCount()==0)
				{
					require_once "class/service/UserService.php";
					$userService = new UserService();
					$successUserRegistration = $userService->addUsers($_REQUEST);
					
					if($successUserRegistration== 1)
					{
						array_push($arr_json_response,"success");
					}
					else
					{
						array_push($arr_json_response,"error");
					}
					
				}
				else
				{
					array_push($arr_json_response,"email_already");
				}
				
				
			}else{
				array_push($arr_json_response,"error");
			}
			
			
			
		}
		else if($mode=="login")
		{
			require_once "class/service/UserService.php";
			$userService= new UserService();
			$email=$_REQUEST['email'];
			$password=$_REQUEST['password'];
			
			$encrypted_pwd_check = $pdo->prepare("SELECT USER_ID,PASSWORD,encrypted_password FROM user WHERE EMAIL=?");
			$encrypted_pwd_check->execute([$email]);
			$unsecure_pwd = $encrypted_pwd_check->fetch(PDO::FETCH_ASSOC);
			
			//echo "length=".strlen(trim($unsecure_pwd["encrypted_password"]));
			
			if($encrypted_pwd_check->rowCount() > 0)
			{
				if(isset($unsecure_pwd["encrypted_password"]) && $unsecure_pwd["encrypted_password"]!==''){
				}else{				
					$db_password = $unsecure_pwd['PASSWORD'];
					$user_id = $unsecure_pwd['USER_ID'];
					
					$secure_password = hash('sha512', $db_password);
					$updt_enc_pwd = $pdo->prepare("UPDATE user SET encrypted_password=? WHERE USER_ID=? ");
					$updt_enc_pwd->execute([$secure_password,$user_id]);
				}					
			
				$authenticate=$userService->authenticateUser($email, $password);
				
				if($authenticate == 1){
					$user_id=$_SESSION['userId'];
					$gcm_reg_id = $_REQUEST["gcm_reg_id"];
					
					$stmt_gcm_exists_user = $pdo->prepare("SELECT * FROM gcm_users WHERE user_id=?");
					$stmt_gcm_exists_user->execute([$user_id]);
					$stmt_gcm_exists_user->fetch();
					
					if($stmt_gcm_exists_user->rowCount() > 0)
					{	
						$del_exists = $pdo->prepare("DELETE FROM gcm_users WHERE user_id=?");
						$del_exists->execute([$user_id]);
						//$del_exists->close();
					}

					//$stmt_gcm_exists_user->close();
					
					//NOW SAVE TO DB
					$insrt_gcm = $pdo->prepare("INSERT INTO gcm_users (user_id,gcm_reg_id)  VALUES(?,?) ");
					$insrt_gcm->execute([$user_id,$gcm_reg_id]);
					//$insrt_gcm->close();
		
					$gcmRegIds = array($gcm_reg_id);
					$message = array("notification_message"=>"Login test success");
					//sendPushNotificationToGCM($gcmRegIds, $message);
					
					array_push($arr_json_response,"success#".$user_id."#".$_SESSION['user']['FULL_NAME']."#".$email
					."#".$_SESSION['user']['MOBILE_NUMBER']
					."#".$_SESSION['user']['LANDMARK']
					."#".$_SESSION['user']['ADDRESS']
					."#".$_SESSION['user']['ZIP']
					."#".$_SESSION['user']['SUBURB']);
				}
				else if($authenticate == -2)
					array_push($arr_json_response,"inactive");
				else if($authenticate == 0 || $authenticate == -1)
					array_push($arr_json_response,"wrong");
			}
			else
				array_push($arr_json_response,"wrong");
			
		}
		else if($mode=="forgot_password")
		{
			require_once "class/service/UserService.php";
			$userService= new UserService();
			$email=$_REQUEST['email'];
			
			$data=$userService->checkUser($email);
			if(sizeOf($data)==0){
				array_push($arr_json_response,"no_email");
			}else{
				$changePassword=$userService->randomPassword($email);
				array_push($arr_json_response,"sent");
			}
		}
		
	}
	else
	{
		array_push($arr_json_response,"invalid_parameter");
	}
	
	echo json_encode($arr_json_response);
?>