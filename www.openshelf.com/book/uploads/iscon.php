<?php 
	
	$conn = @fsockopen("www.google.com", 80);

	if ($conn) {
		$is_conn = true;
		header("Location: https://www.google.com");
	}else{
		echo "Not connected to Internet";
	}

 ?>