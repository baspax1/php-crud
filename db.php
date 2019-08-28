<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dsn = "mysql:host=$servername;dbname=data";
	
	try {
	
		$connection = new PDO($dsn , $username, $password);
		// set the PDO error mode to exception
		//echo 'connection succesfully';
		
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
	}
	catch(PDOException $e)
    {
		echo "Connection failed: " . $e->getMessage();
	}
	
?>