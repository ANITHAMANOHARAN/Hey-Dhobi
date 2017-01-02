<?php
require_once 'class.mysql.php';
class EnquiryService extends MySql
{
	function EnquiryService()
	{
		$this->MySQL();
	}
	
	function AddEnquiryByUser($post)
	{
		$successEnquiry;
		$this->beginTransaction();
		
		try {
			$name=$post['name'];
			$emailId=$post['emailId'];
			$message=$post['message'];
			$query="INSERT INTO enquiry(NAME,EMAIL_ID,MESSAGE) VALUES('$name','$emailId','$message')";
			$this->ExecuteQuery($query,"insert");
			if(empty($query))
			{
				$successEnquiry=0;
			}
			else 
			{
				$successEnquiry=1;
			}
			$this->commitTransaction();
			
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction();
		}
		
		return $successEnquiry;
	}
	
	function viewEnquiry()
	{
		$data;
		$successViewEnquiry;
		$this->beginTransaction();
		try
		{
			$query="SELECT * FROM enquiry ";
			$data=$this->ExecuteQuery($query,"select");
			if(empty($data))
			{
				$successViewEnquiry=0;
			}
			else 
			{
				$successViewEnquiry=1;
			}
			$this->commitTransaction();
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction();
		}
		return $data;
		return $successViewEnquiry;
		
	}
	
}
?>