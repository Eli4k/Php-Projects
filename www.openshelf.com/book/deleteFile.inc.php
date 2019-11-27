<?php 
	
				

		include('../config.php');
		$sql = $conn->query("DELETE FROM books WHERE id = '".$_GET["id"]."'");
		if ($sql){
				if (unlink($_GET["src"])) {
					header("Location: ../pages/books.php");
					echo"<script>alert('File SuccessFully Deleted');</script>";
				}else{
			echo "<script>alert('There was a Problem');</script>";
			}
			
		}
 ?>