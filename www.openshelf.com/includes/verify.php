<?php 
	
	if (isset($_GET['vkey'])) {
		$vkey = $_GET['vkey'];

		include('../config.php');
		$validate = $conn->query("SELECT verified, vkey FROM user WHERE verified = 0 AND vkey='$vkey' LIMIT 1 ");
			
			if ($validate->num_rows == 1) {
				$update = $conn->query("UPDATE user SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");
				if ($update) {
					echo "Your Account has been Verified you may now Login";
			}else{
					echo "Sorry Account already exsist";	
					$conn->error;
				}
			}
			$conn->close();
	}else{
		die("Something went wrong");
		$conn->close();
	}


 ?>