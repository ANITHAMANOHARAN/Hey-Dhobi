<?php
$type="";
if(isset($_GET['type']))
{
	$type=$_GET['type'];
}
$id=$_GET['id'];
$firstDate=$_GET['firstDate'];
$result;
$date=date("m/d/Y");
if($type=="delivery")
{
	$date=date('m/d/Y', strtotime('+2 days'));
}
date_default_timezone_set("Asia/Kolkata");
$d=date("H:i");
$a;
if($id == $date){
		if(($d <="07:00"))
		{
			$result1="<option value='07:30:00 AM - 8:29:59 AM'>". "07:30:00 AM - 8:29:59 AM" ."</option>";
		
		}
		if(($d <="08:00") )
		{
			$result2="<option value='08:30:00 AM - 9:29:59 AM'>". "08:30:00 AM - 9:29:59 AM" ."</option>";
		}
		
		if(($d <="09:00"))
		{
			$result4="<option value='09:30:00 AM-10:29:59 AM'>". "09:30:00 AM - 10:29:59 AM" ."</option>";
		}
		if(($d <="10:00"))
		{
			
			$result5="<option value='10:30:00 AM - 11:29:59 AM'>". "10:30:00 AM - 11:29:59 AM" ."</option>";
		}
		
		if(($d <="11:00"))
		{
				
			$result5="<option value='11:30:00 AM - 1:29:59 PM'>". "11:30:00 AM - 1:29:59 PM" ."</option>";
		}
		if(($d <="13:00"))
		{
			$result6="<option value='01:30:00 PM - 3:29:59 PM'>". "01:30:00 PM - 3:29:59 PM" ."</option>";
		}
		if(($d <="15:00"))
		{
			$result7="<option value='03:30:00 PM - 5:29:59 PM'>". "03:30:00 PM - 5:29:59 PM" ."</option>";
		}
		if(($d <="17:00"))
		{
			$result8="<option value='05:30:00 PM - 6:29:59 PM'>". "05:30:00 PM - 6:29:59 PM" ."</option>";
		}
		if(($d <="18:00"))
		{
			$result9="<option value='06:30:00 PM - 7:29:59 PM'>". "06:30:00 PM - 7:29:59 PM" ."</option>";
		}
		if(($d <="19:00"))
		{
			$result10="<option value='07:30:00 PM - 8:29:59 PM'>". "07:30:00 PM - 8:29:59 PM" ."</option>";
		}
		if(($d <="20:00"))
		{
			$result11="<option value='08:30:00 PM - 9:30:59 PM'>". "08:30:00 PM - 9:30:59 PM" ."</option>";
		}
		
		
	
}
if($id < $date) {
	if($type=="delivery")
	{
		$result1="<option value='' disabled>". "The delivery date should be 2 days after the pick up date." ."</option>";
	}
	else
	{
		$result1="<option value='' disabled>". "Please Select The Current Date" ."</option>";
	}
}
 if($id>$date) {
 	$result1=
 	"<option value='07:30:00 AM - 8:29:59 AM'>". "07:30:00 AM - 8:29:59 AM" ."</option>.
 	<option value='08:30:00 AM - 9:29:59 AM'>". "08:30:00 AM - 9:29:59 AM" ."</option>
 	<option value='09:30:00 AM - 10:29:59 AM'>". "09:30:00 AM - 10:29:59 AM" ."</option>
 	<option value='10:30:00 AM - 11:29:59 AM'>". "10:30:00 AM - 11:29:59 AM" ."</option>
 	<option value='11:30:00 AM - 1:29:59 PM'>". "11:30:00 AM - 1:29:59 PM" ."</option>
	<option value='01:30:00 PM - 3:29:59 PM'>". "01:30:00 PM - 3:29:59 PM" ."</option>
	<option value='03:30:00 PM - 5:29:59 PM'>". "03:30:00 PM - 5:29:59 PM" ."</option>
	<option value='05:30:00 PM - 6:29:59 PM'>". "05:30:00 PM - 6:29:59 PM" ."</option>
	<option value='06:30:00 PM - 7:29:59 PM'>". "06:30:00 PM - 7:29:59 PM" ."</option>
	<option value='07:30:00 PM - 8:29:59 PM'>". "07:30:00 PM - 8:29:59 PM" ."</option>
	<option value='08:30:00 PM - 9:30:59 PM'>". "08:30:00 PM - 9:30:59 PM" ."</option>";
 	
 	
 }
echo $result1;
echo $result2;
echo $result4;
echo $result5;
echo $result6;
echo $result7;
echo $result8;
echo $result9;
echo $result10;
echo $result11;
?>