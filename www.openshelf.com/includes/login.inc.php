<?php 

session_start();

	if (isset($_POST['login'])) {

		include '../config.php';
			$uname = $conn->real_escape_string($_POST['uname']);
			$pwd = $conn->real_escape_string($_POST['password']);

			if (empty($uname) || empty($pwd)) {
				header('Location: ../pages/index.php?login=Fields are Empty');
				exit();
			}else{

				$query = $conn->query("SELECT * FROM user WHERE uname = '$uname' OR email = '$uname'");
		
				$queryResult = $query->num_rows;

				if ( $queryResult < 1) {
					header('Location: ../index.php?login=User does not Exist');
					exit();
				}else{

					$row = $query->fetch_assoc();

							$access = $row['access'];
							if ($access == 'blocked') {
								header("Location: ../pages/login.php?login=Account Blocked");
								exit();
							}else{

								$verification = $row['verified'];
								
								if ($verification == 0) {
									header("Location: ../pages/login.php?login=Account Not Verified");
									exit();
								}else{
									
									$pwdCheck = password_verify($pwd, $row['password']);
									if ($pwdCheck == false) {
										header('Location: ../index.php?login=Password Incorrect');
										exit();

								}elseif($pwdCheck == true){
									$_SESSION['uname'] = $row['uname'];
									$_SESSION['password']= $row['password'];
									$_SESSION['logedIn'] = "yes";
									$_SESSION['email'] = $row['email'];
									$_SESSION['priv'] = $row['priv'];
									$_SESSION['access'] = $row['access'];

									$status = $conn->query("UPDATE user SET status = 1 WHERE uname = '".$_SESSION['uname']."'");
	
								if ($status) {
									header('Location: ../pages/index.php?login=Success');
									exit();
								}else{
									echo $conn->error;
								}
							}
						}					
					}				
				}
			$conn->close();
		}	
		
		}else{
			header('Location: ../pages/index.php');
			exit();
			$conn->close();
		}

 ?>