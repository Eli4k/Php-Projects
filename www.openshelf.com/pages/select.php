<?php 
   $output = '';

    include '../config.php';

     $sql = $conn->query("SELECT * FROM user");
     $qty = $sql->num_rows;

    $output.='
    <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-user-circle"></i>
            Users</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Verified</th>
                    <th>Priviledges</th>
                    <th>IP</th>
                    <th>Access</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Verified</th>
                    <th>Priviledges</th>
                    <th>IP</th>
                    <th>Access</th>
                  </tr>
                </tfoot>
                <tbody>';

                     

                      $i=1;

                        while ($row = $sql->fetch_assoc()) {
                          $id = $row['id'];
                          $uname = $row['uname'];
                          $email = $row['email'];
                          $status = $row['status'];
                          $verified = $row['verified'];
                          $priv = $row['priv'];
                          $ip = $row['ip'];
                          $access = $row['access'];

                          switch ($status) {
                            case "0":
                                $status = "Offline";
                              break;            
                            default:
                              $status = "Online";
                              break;
                          }

                           switch ($priv) {
                            case "2":
                                $priv = "Client";
                              break;            
                            case "1":
                                $priv = "Administrator";
                              break;
                          }

                            switch ($verified) {
                            case "0":
                                $verified = "Not Verified";
                              break;            
                            default:
                                $verified = "Verified";
                              break;
                          }


                         $output .= "<tr>
                                  <td><input type='checkbox' name='$id'></td>
                                  <td>$uname</td>
                                  <td>$email</td>
                                  <td>$status</td>
                                  <td>$verified</td>
                                  <td>$priv</td>
                                  <td>$ip</td>
                                  <td><button name='btn_change' id='change_access' data-id4='$id' class='btn btn-xs btn-info'>$access</button></td>
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