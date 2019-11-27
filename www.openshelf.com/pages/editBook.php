<?php 
  $id = $_GET['id'];
      include'../config.php';
      $sql = $conn->query("SELECT * FROM books WHERE id='$id'");
      if ($row=$sql->fetch_assoc()) {
          $title=$row['title'];
          $author = $row['author'];
          $file = $row['bookPath'];
          $genre = $row['genre'];
       }
    
 ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Books</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Add Book</div>
      <div class="card-body">
        <form action="../book/editBook.inc.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" name="title" id="bookTitle" class="form-control" placeholder="Title" required="required" autofocus="autofocus"value="<?php echo $title;?>">
                  <label for="bookTitle">Title</label>
                </div>
              </div>

              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" name="author" id="inputAuthor" class="form-control" placeholder="Author" required="required" autofocus="autofocus" value="<?php echo $author;?>">
                    <label for="inputAuthor">Author</label>
                </div>
              </div>

              <div class="form-group">
                <div class="form-label-group">
                 <select class="form-control" name="genre">
                    <option>Select Genre</option>
                    <option>Fiction</option>
                    <option>Non-Fiction</option>
                    <option>Science & Technology</option>
                    <option>Other</option>
                 </select>
                </div>
              </div>

              <div class="form-group">
                <div class="form-label-group">
                  <input type="file" class="form-control" name="fileToUpload" value="<?php echo $file; ?>">
                </div>
              </div>

                 <input type="submit" name="add" class="btn btn-primary btn-block" value="Add">
                 <input type="hidden" name="id" value="<?php echo $id;?>">               
          </form>
        </div>
        
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
