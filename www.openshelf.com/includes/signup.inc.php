<?php 

	if (isset($_POST['register'])) {

		include ('../config.php');

			$fname = $conn->real_escape_string($_POST['fname']);
			$lname = $conn->real_escape_string($_POST['lname']);
			$email = $conn->real_escape_string($_POST['email']);
			$pwd = $conn->real_escape_string($_POST['password']);
			$rpwd = $conn->real_escape_string($_POST['rpassword']);
			$uname = $conn->real_escape_string($_POST['uname']);
			$vkey = md5(time().$uname);
			$ip = $_SERVER['REMOTE_ADDR'];

				if (empty($fname) || empty($lname) || empty($email) || empty($pwd) || empty($rpwd) || empty($uname)) {
					header('Location: ../index.php?msg=Fields are Empty');
					exit();
				}else{
					if (!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname)) {
						header('Location: ../index.php?msg=Characters invalid');
						exit();
					}else{
						if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
							header('Location: ../index.php?msg=Email Invalid');
							exit();
						}
						else{
							$sql=$conn->query("SELECT * FROM user WHERE uname='$uname'");
							if ($rows= $sql->num_rows > 1) {
								header('Location: ../index.php?msg=User Already Exist');
								exit();
							}else{
								if ($rpwd !== $pwd ) {
									header('Location: ../index.php?msg=Password Does Not Match');
									exit();
								}else{
									$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
									$insert = $conn->query("INSERT INTO user (fname, lname, uname, email, password, ip, vkey) VALUES ('$fname', '$lname', '$uname','$email','$hashedPwd', '$ip', '$vkey');");
									if ($insert) {
										$to = $email;
										$subject = "Email Verification";
										$message = "<a href='http://localhost/www.openshelf.com/includes/verify.php?vkey=$vkey'>Register Account</a>";
										$headers = "From: eliamev12@gmail.com \r\n";
										$headers .="MIME-Version: 1.0" . "\r\n";
										$headers .="Content-type:text/html;charset=UTF-8" . "\r\n"; 

										mail($to,$subject,$message,$headers);

										header('location:ty.php?');
									}else{
										echo $conn->error;
									}

								}
							}

						}

					}
				}
			}else{		
				header('Location:../index.php?msg=Become A Memeber');
				exit();
				$conn->close();
			}



 ?>