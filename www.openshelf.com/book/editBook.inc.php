<?php 
if (isset($_POST['add'])) {
		include '../config.php';

		$title = $conn->real_escape_string($_POST['title']);
		$author = $conn->real_escape_string($_POST['author']);
		$genre = $conn->real_escape_string($_POST['genre']); 
		$file = $_FILES['fileToUpload']['name'];
		$id=$_POST['id'];

		if (!$file) {
			header('../pages/editBook.php?upload=No file was Uploaded');
			exit();;
		}else{
			
			$tmp = $_FILES['fileToUpload']['tmp_name'];
			$path = "uploads/$file";
			move_uploaded_file($tmp, $path);

				$sql= $conn->query("UPDATE books SET title='$title', author='$author', genre='$genre', bookPath='$path' WHERE id='$id'");
				if ($sql) {
						header("Location: ../pages/books.php?edit='File Changed Successfully'");
						exit();
				}else{
					header("Location: ../pages/books.php?edit='Something Went Wrong'");
					exit();
			}
		}

		
	}



 ?>