<?php
$id = $_GET['id'];
$src = $_GET['src'];
	
		include '../config.php';
	$sub = isset($_POST['sub']);

		switch ($sub) {
			case 'Continue':
				$sql = $conn->query("DELETE FROM books WHERE id in ($id)");
				if($sql){
					header('Location ../pages/books.php?Deleted Successfully');
				}else{
					header('Location ../pages/books.php?Error');
				}
				
				break;
			
			case 'Cancel':
			header('Location ../pages/books.php');
				break;
		}
?>
<form method="POST" action="">
	<table width="800" align="center">
		<tr>
			<th>Are you sure you want to delete the record(s)?</th>
		</tr>
		<tr>
			<th><input type="Submit" value="Continue" name="sub">
				<input type="Submit" value="Cancel" name="sub">
			</tr>

	</table>
</form>