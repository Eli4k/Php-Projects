<?php 
	
	if (isset($_POST['reset'])) {
			include '../config.php';

			$pwd = $conn->real_escape_string('password');
			$rPwd= $conn->real_escape_string('rpassword');
			$uname = $conn->real_escape_string('uname');

			if (empty($uname) || empty($pwd) || empty($rpwd)) {
				header('Location: ../pages/reset-password.php?resetMessage=Fields are Empty');
				exit();
			}else{
				if ($pwd !== $rPwd) {
					header('Location: ../pages/reset-password.php?resetMessage=Password does not match');
					exit();
				}else{

					$searchData = $conn->query("SELECT * FROM user WHERE uname = '$uname' OR email='$uname'");
					if ($result = $searchData->num_rows > 0) {
						var_dump($result);
					}else{
						echo "no such user";
					}

				}
			}
	}else{
		echo $conn->connect_error;
	}

 ?>