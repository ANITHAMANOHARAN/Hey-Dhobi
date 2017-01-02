<?php
/*$host="localhost:2082"; // Host name 
$username="mcaca679_10dhobi"; // Mysql username 
$password="vXyap1-11Ngf"; // Mysql password 
$db_name="mcaca679_heydhobi"; // Database name */
		
try {
	//$pdo = new PDO('mysql:host=localhost:2082;dbname=1159707;charset=utf8mb4','1159707','Mub85Fr33HeyDhob');
	$pdo = new PDO('mysql:host=localhost:3306;dbname=mcaca679_heydhobi;charset=utf8mb4','mcaca679_10dhobi','vXyap1-11Ngf');
	
	//echo 'Connected to Database<br/>';

	
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

} catch(PDOException $e){
	//echo 'Connection failed'.$e->getMessage();
}

/*$servername = "localhost:2082";
$username = "mcaca679_10dhobi";
$password = "vXyap1-11Ngf";*/

/*try {
    $conn = new PDO("mysql:host=$servername;dbname=mcaca679_heydhobi", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }*/
	
	// Create connection
/*$conn = new mysqli($servername, $username, $password,"mcaca679_heydhobi");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";*/
?>