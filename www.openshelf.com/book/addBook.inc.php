<?php 
	
	if (isset($_POST['add'])) {

		include '../config.php';

		$title = $conn->real_escape_string($_POST['title']);
		$author = $conn->real_escape_string($_POST['author']);
		$genre = $conn->real_escape_string($_POST['genre']); 
		$file = $_FILES['fileToUpload']['name'];

		if (!$file) {
			header('../pages/addBook.php?upload=No file was Uploaded');
			exit();;
		}else{
			
			$tmp = $_FILES['fileToUpload']['tmp_name'];
			$path = "uploads/$file";
			move_uploaded_file($tmp, $path);

				$sql= $conn->query("INSERT INTO books(bookPath, title, genre, author) VALUES ('$path', '$title', '$genre', '$author')");
				if ($sql) {
						header("Location: ../pages/books.php?upload='File Successfully Added'");
						exit();
				}else{
					header("Location: ../pages/books.php?upload='Something Went Wrong'");
					exit();
			}
		}

		
	}

 ?>