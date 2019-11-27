<?php 

	session_start();
	 if (isset($_GET['logout'])) {
	 	include '../config.php';
	 		$query = $conn->query("UPDATE user SET status = 0 WHERE uname = '".$_SESSION['uname']."'");
	 		if ($query) {
	 				session_unset();
	 				session_destroy();
	 				header('Location: ../pages/login.php');
	 				exit();
	 				$conn->close();
	 			}	else{
	 				echo $conn->error;
	 			}
	 }

?>