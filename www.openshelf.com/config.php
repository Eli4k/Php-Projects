<?php 

		$serverName	= "localhost";
		$userName =  "root";
		$pwd = "";
		$dbName = "library";

		$conn = new mysqli($serverName, $userName, $pwd, $dbName);

		if ($conn->connect_error) {
			die("Connection Failed: ".$conn->connect_error);
		};


 ?>