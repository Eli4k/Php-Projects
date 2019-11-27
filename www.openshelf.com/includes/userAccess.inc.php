<?php 
	

	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		include '../config.php';

		$sql = $conn->query("SELECT access FROM user WHERE id = '$id'");
		
			if ($row = $sql->fetch_assoc()) {
				$access = $row['access'];

					if ($access == "unblocked") {
						$changedAcc = "blocked";
						$update = $conn->query("UPDATE user SET access = '$changedAcc' WHERE id = '$id'");
					
					}
					if ($access == "blocked"){
						$changedAcc = "unblocked";
						$update = $conn->query("UPDATE user SET access = '$changedAcc' WHERE id = '$id'");
					
					}
			}
	}

 ?>