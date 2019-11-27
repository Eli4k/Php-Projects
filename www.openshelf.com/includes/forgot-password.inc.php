<?php 

	if (isset($_POST['forgot'])) {

		include '../config.php';
		$email = $conn->real_escape_string($_POST['email']);
		$rvkey = md5(time().$email);

		if (empty($email)) {
			header('Location: ../pages/forgot-password.php');
			echo "Enter Email Address to Receive message";
			exit();
		}else{
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header('Location: ../pages/errorPage.php');
				exit();
			}else{

				$sql = $conn->query("SELECT * FROM user WHERE email='$email'");
				$result = $sql->num_rows;
				if ($result < 1) {
					echo "This Email does not Exist in our Database";
					header('Location: ../pages/errorPage.php?reset=Error');
					exit();
				}else{
					$to = $email;
					$subject = "Reset Password From Open Shelf";
					$message = "We got a message from $to concerning a password reset. Please click this link below to get directed to our reset password page. Thank You.<a href='http://localhost/www.openshelf.com/includes/resetLink.inc.php?rvkey=$rvkey'>Click Here</a>";
					$headers = "From: eliamev12@gmail.com \r\n";
					$headers .="MIME-Version: 1.0" . "\r\n";
					$headers .="Content-type:text/html;charset=UTF-8" . "\r\n"; 

					$mail = mail($to,$subject,$message,$headers);

						if ($mail) {
							header('Location: forgotVerify.inc.php?link=Sent');
							exit();
						}else{
							header('Location: ../pages/errorPage.php');	
					}
				
				}
			}
		}
	}else{
		header('Location: forgot-password.php');
		exit();
		$conn->close();
	}

 ?>