<?php

require_once 'class.mysql.php';

class MasterService extends MySql
{
	function MasterService()
	{
		$this->MySql();
	}
	
	function getAllStates()
	{
	    $data;
		$this->beginTransaction();
		try
		{
			
			$query = "SELECT * FROM states";
			$data= $this->ExecuteQuery($query,"select");
			$this->commitTransaction();
		}
		catch(Exception $e)
	   {
	   		$this->rollbackTransaction();
	   }
	   
	  return $data;
	}
	
	function getCitiesByState($stateId)
	{
		$data;
		$this->beginTransaction();
		try
		{
			$query="SELECT * FROM cities where state_id='".$stateId."'";
			$data=$this->ExecuteQuery($query,"select");
			$this->commitTransaction();
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction();
		
		}
		
	return $data;
		
	}
	function getState($stateId)
	{
		$data;
		$this->beginTransaction();
		try
		{
			
			$query = "SELECT * FROM states where id='$stateId'";
			$data= $this->ExecuteQuery($query,"select");
			$this->commitTransaction();
		}
		catch(Exception $e)
	   {
	   		$this->rollbackTransaction();
	   }
	   
	  return $data;
	}
	function getStates($stateId)
	{
		$data;
		$this->beginTransaction();
		try
		{
				
			$query = "SELECT * FROM states where id='$stateId'";
			$data= $this->ExecuteQuery($query,"select");
			$this->commitTransaction();
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction();
		}
	
		return $data[0];
	}
	
	
	function getCity($cityId)
	{
		$data;
		$this->beginTransaction();
		try
		{
			$query="SELECT * FROM cities where id='".$cityId."'";
			$data=$this->ExecuteQuery($query,"select");
			$this->commitTransaction();
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction();
		
		}
		
	return $data;
		
	}
	function getCities($cityId)
	{
		$data;
		$this->beginTransaction();
		try
		{
			$query="SELECT * FROM cities where id='".$cityId."'";
			$data=$this->ExecuteQuery($query,"select");
			$this->commitTransaction();
		}
		catch(Exception $e)
		{
			$this->rollbackTransaction();
	
		}
	
		return $data[0];
	
	}
	 
	function getReligion($religionId)
	{
		$data;
		$this->beginTransaction();
		try
		{
			$query="SELECT RELIGION_NAME FROM religion WHERE RELIGION_ID='".$religionId."'";
			$data=$this->ExecuteQuery($query,"select");
			$this->commitTransaction();
		}
		catch (Exception $e)
		{
			$this->rollbackTransaction();
		}
		
		return $data;
	}

	function getAllReligion()
	{
		$data;
		$this->beginTransaction();
		try {
			$query="SELECT * FROM religion";
			$data=$this->ExecuteQuery($query,"select");
			$this->commitTransaction();
		}
		
		catch(Exception $e)
		{
			$this->rollbackTransaction();
		}
		return $data;
	}
	function runQuery($query) {
		$result = mysql_query($query);
		while($row=mysql_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}
}	
	?>