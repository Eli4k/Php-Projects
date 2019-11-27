<?php

	$id = $_GET['id'];
	if (isset($id)) {
		include '../config.php';
		$sql = $conn->query("SELECT bookPath FROM books WHERE id='$id'");
		if ($row = $sql->fetch_assoc()) {
				$file = $row['bookPath'];
					header('Content-type: application/pdf');
					header('Content-Dispostion: inline; filename="' . $file . '"');
					header('Content-Transfer-Encoding: binary');
					header('Accept-Ranges: bytes');
					@readfile($file);
						
		}					
	}
			
	



 ?>