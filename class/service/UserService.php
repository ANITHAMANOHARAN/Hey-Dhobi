<?php
require_once 'class.mysql.php';

class UserService extends MySql
{
	function UserService()
	{
		$this->MySql();
	}
	
	function addUsers($post)
	{
		$userId;
		$successUserRegistration=0;
		$this->beginTransaction();
		
		try {
		
		$userId=$this->uuid();
		$fullName=$post['fullName'];
		$mobileNumber=$post['mobileNumber'];
		$state=$post['state'];
		$city=$post['city'];
		$suburb=$post['suburb'];
		$zip=$post['zip'];
		$address=$post['address'];
		$landmark=$post['landmark'];
		$email=$post['email'];
		$password=$post['password'];
		$verificationCode=md5(rand(1000,9999));
		$query1="SELECT * FROM user WHERE EMAIL='$email'";
		$createdOn=time();
		$this->ExecuteQuery($query,"select");
		
		$query="INSERT INTO user(USER_ID,FULL_NAME,MOBILE_NUMBER,STATE,ZIP,CITY,SUBURB,ADDRESS,LANDMARK,EMAIL,PASSWORD,VERIFICATION_CODE,CREATED_ON)
		VALUES('$userId','$fullName','$mobileNumber','$state','$zip','$city','$suburb','$address','$landmark','$email','$password','$verificationCode','$createdOn')";
		$this->ExecuteQuery($query,"insert");
				$successUserRegistration=1;
		
		$to=$email;
		$subject=" Welcome : Hey Dhobi Email Verification";
		$message1="Thank You For Signing Up!  \n";
		$message2="We are happy to have you on board :) \n";
		$message3="Please click the below link to verify your account : ";
		$message4="http://heydhobi.com/ajax/verify-email.php?hash=".$verificationCode."&email=".$email;
		$message=$message1.$message2.$message3.$message4;
		$header="From:noreply@heydhobi.com";
		mail($to,$subject,$message);
			
		$this->commitTransaction();
		
	}
	catch (Exception $e) 
	{
		$this-rollbackTransaction();
	}

	return $successUserRegistration=1;
	
}

function checkEmail($email)
{
	$data;
	$checkEmail=0;
	$this->beginTransaction();
	try {
		$query="SELECT EMAIL FROM user";
		$data=$this->ExecuteTransaction($query,"select");
		if($email==$data[0]['EMAIL'])
		{
			$checkEmail=0;
		}
		else {
			$checkEmail=1;
		}
		$this->commitTransaction();
		
	}
	catch (Exception $e)
	{
		$this->rollbackTransaction();
	}
	return $checkEmail;
}
function verifyEmail($verificationCode,$email)
{
	$success=0;
	$this->beginTransaction();
	try {
		$query="SELECT VERIFICATION_CODE FROM user WHERE EMAIL='".$email."'";
		$data=$this->ExecuteQuery($query,"select");
		if($verificationCode == $data[0]['VERIFICATION_CODE'])
		{
			$success=1;
			$query1="UPDATE user SET ARCHIVE='N' WHERE EMAIL='$email'";
			$this->ExecuteQuery($query1,"update");
		}
        $this->commitTransaction();		
	}
	catch(Exception $e)
	{
		$this->rollbackTransaction();
	}
	return $success;
}

function authenticateUser($email,$password)
{
	$authenticate=0;
	 		$this->beginTransaction();
	 		
	 		try {
	 			$query="SELECT * FROM user where EMAIL='".$email."'";
	 			$data=$this->ExecuteQuery($query,"select");
	 			
	 			if(empty($data))
	 			{
	 				$authenticate=-1;
	 			}
	 			elseif($data[0]['ARCHIVE'] == 'Y')
	 			{
	 				$authenticate = -2;
	 			}
	 			 elseif($password==$data[0]['PASSWORD'])
	 			{
	 				if (!isset($_SESSION))
	 				{
	 					session_start();
	 					$_SESSION['email']=$email;
	 					$_SESSION['userId']=$data[0]['USER_ID'];
	 					$_SESSION['user'] = $data[0];
	 				}
	 				$authenticate=1;
	 			}
	 			$this->commitTransaction();
	}
	catch(Exception $e)
	{
		$this->rollbackTransaction();
	}
	return $authenticate; 
	
}




function getUserByEmailId($email)
{
	$data;
	$this->beginTransaction();
	try
	{
		$query="SELECT EMAIL FROM user WHERE EMAIL='".$email."'";
		$data=$this->ExecuteQuery($query,"select");
		$this->commitTransaction();
	}
	catch(Exception $e)
	{
		$this->rollbackTransaction();
	}
	return $data[0];
}
  function forgotPassword($email)
  {
  	$this->beginTransaction();
  	try {
  		$random=rand(100000,999999);
  		
  		$query="UPDATE user SET PASSWORD='$random' WHERE EMAIL='$email'";
  		$this->ExecuteQuery($query,"update");
  		
  		$to=$email;
  		$subject="Hey Dhobi Password";
  		$message="Your password is $random. Login to the website and reset your password.";
  		$headers="From:noreply@HeyDhobi.com";
  		mail($to, $subject, $message);
  		$this->commitTransaction();
  		
  		
  	}
  	catch(Exception $e)
  	{
  		$this->rollbackTransaction();
  	}
  }
  function destroyUserSession($email,$password)
  {
  	$this->beginTransaction();
  	if(isset($_SESSION))
  	{
  		unset($_SESSION[$email]);
  		unset($_SESSION[$password]);
  	}
  	$this->commitTransaction();
  }
  
  function checkUser($email)
  {
  	$data;
  	$this->beginTransaction();
  	try{
  		$query="SELECT * FROM user WHERE EMAIL='$email'";
  		$data=$this->ExecuteQuery($query,"select");
  		$this->commitTransaction();
  	}
  	catch(Exception $e)
  	{
  		$this->rollbackTransaction();
  	}
  	
  	return  $data;
  }
  
  function randomPassword($email)
  {
  	$this->beginTransaction();
  	
  	try{
  		$random=rand(100000,999999);
  		$query="UPDATE user SET PASSWORD='$random' WHERE EMAIL='$email'";
  		$this->ExecuteQuery($query,"update");
  		$to=$email;
  		$subject="HeyDhobi Password";
  		$header="norepy@heydhobi";
  		$message="Your password is $random Login to the website and reset your password.";
  		mail($to,$subject,$message);
  		$this->commitTransaction();
  		
  	}
  	catch(Exception $e)
  	{
  		$this->rollbackTransaction();
  	}
  }
  
  function getUserByUserId($userId)
  {
  	$data;
  	$this->beginTransaction();
  	try {
  		$query="SELECT * FROM user WHERE USER_ID='".$userId."'";
  		$data=$this->ExecuteQuery($query,"select");
  		$this->commitTransaction();
  	}
	catch(Exception $e)
	{
		$this->rollbackTransaction();
	}
	return $data[0];
  }
  
  function updateUserByUserId($post,$userId)
  {
  	$successUserUpdate;
  	$this->beginTransaction();
  	try {
  	$fullName=$post['fullName'];
  	$mobileNumber=$post['mobileNumber'];
  	$city=$post['city'];
  	$suburb=$post['suburb'];
  	$address=$post['address'];
  	$landmark=$post['landmark'];
  	$zip=$post['zip'];
  	$query="UPDATE user SET FULL_NAME='".$fullName."',LANDMARK='".$landmark."',MOBILE_NUMBER='".$mobileNumber."',CITY='".$city."',SUBURB='".$suburb."',ADDRESS='".$address."',ZIP='".$zip."' WHERE USER_ID='".$userId."'";
	$this->ExecuteQuery($query,"update");  	
  	if(empty($query))
  	{
  		$successUserUpdate=0;
  	}
  	else 
  	{
  		$successUserUpdate=1;
  	}
  	$this->commitTransaction();
  	}
  	catch(Exception $e)
  	{
  		$this->rollbackTransaction();
  	}
  	return $successUserUpdate;
  }
  
  function viewSuburbById($suburbId)
  {
  	$data;
  	$this->beginTransaction();
  	try{
  		$query="SELECT * FROM suburb WHERE SUBURB_ID='$suburbId'";
  		$data=$this->ExecuteQuery($query,"select");
  		$this->commitTransaction();
  	}
  	catch(Exception $e)
  	{
  		$this->rollbackTransaction();
  	}
  	return $data[0];
  }
  
  function viewSuburb()
  {
  	$data;
  	$this->beginTransaction();
  	try{
  		$query="SELECT * FROM suburb";
  		$data=$this->ExecuteQuery($query,"select");
  		$this->commitTransaction();
  	}
  	catch(Exception $e)
  	{
  		$this->rollbackTransaction();
  	}
  	return $data;
  }
  
  function getPasswordByUserId($userId)
  {
  	$data;
  	$this->beginTransaction();
  	try {
  		$query="SELECT PASSWORD FROM user WHERE USER_ID='".$userId."'";
  		$data=$this->ExecuteQuery($query,"select");
  		$this->commitTransaction();
  	}
  	catch(Exception $e)
  	{
  		$this->rollbackTransaction();
  	}
  	return $data[0];
  }
  function updateUserPasswordById($post,$userId)
  {
  	$successUpdatePassword;
  	$this->beginTransaction();
  	try
  	{
  		$oldPassword=$post['oldPassword'];
  		$newPassword=$post['newPassword'];
  		$query="UPDATE user SET PASSWORD='".$newPassword."' WHERE USER_ID='".$userId."'";
  		$this->ExecuteQuery($query,"update");
  		if(empty($query))
  		{
  			$successUpdatePassword=0;
  		}
  		else 
  		{
  			$successUpdatePassword=1;
  		}
  		$this->commitTransaction();
  	}
  	catch(Exception $e)
  	{
  		$this->rollbackTransaction();
  	}
  	
  	return $successUpdatePassword;
  }
  
}

?>