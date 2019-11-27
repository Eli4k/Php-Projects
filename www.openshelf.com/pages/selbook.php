<?php 
   $output = '';

    include '../config.php';

     $sql = $conn->query("SELECT * FROM books");
     $qty = $sql->num_rows;

    $output.='
    
         <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-book"></i>
            Books</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Date Uploaded</th>
                    <th>Action</th>      
                  </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Date Uploaded</th>
                    <th>Action</th>      
                  </tr>
                </tfoot>
                <tbody>';

                     

                      $i=1;

                        while ($row = $sql->fetch_assoc()) {
                          $id = $row['id'];
                          $title = $row['title'];
                          $genre = $row['genre'];
                          $date = $row['dateUploaded'];
                          $src = $row['bookPath'];
                  

                         $output .= "<tr>
                                  <td><input type='checkbox' name='$id'></td>
                                  <td>$title</td>
                                  <td>$genre</td>
                                  <td>$date</td>
                                  <td>
                                   <a href='../book/readFile.inc.php?id=$id' class='btn btn-outline-info btn-md'>
                                          <i class='fas fa-book-reader'></i>
                                      </a>
                                    <a href='../pages/editBook.php?id=$id' class='btn btn-outline-secondary btn-md'>
                                          <i class='fas fa-edit'></i>
                                      </a>
                                  <button name='btn_del' id='btn_delete' data-id3='$id' class='btn btn-xs btn-danger'>
                                      <i class='fa fa-trash'></i>
                                  </button></td>
                                  <button type='hidden' id='hidden_src' data-id5='$src'></button>

                                </tr>";
                              $i++;
                           }
                       
                   
          $output.='
                 </tbody>
                    </table>
                   </div>
                  </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>';
            echo $output;
 ?>