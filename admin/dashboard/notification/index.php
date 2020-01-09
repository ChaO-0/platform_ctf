<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Notification List &mdash; Admin</title>

  <?php
    $pre="../";
    include '../template/css.php';
  ?>


<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
        <?php
          $home='../';
          $user='../users/';
          $chall='../challenge';
          $notif='../notification/';
          $logout='../';
          include '../template/nav.php';
          
        ?>


      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Notification List</h1>
          </div>

          <div class="section-body">
            <?php
                include '../template/root.php';
                $read_notif="SELECT id_notif,title,description,status FROM `notification` ";
                $view = $conn -> query($read_notif);
                $no = 1;
              ?>
              </div>
              <div class="card">
                <div class="card-header">
                
                  <a class="btn btn-icon icon-left btn-info" href="add.php">
                    <i class="fas fa-plus"></i>
                    Add Notification
                  </a>

                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">No.</th>
                          <th scope="col">Title</th>
                          <th scope="col">Description</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        while($view_notif=$view->fetch_array(MYSQLI_ASSOC)){
                      ?>
                        
                          <tr>
                          
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $view_notif['title'];?></td>
                            <td><?php echo $view_notif['description'];?></td>
                          
                            <td>
                            <a href="<?php echo 'edit.php?id='.$view_notif['id_notif']; ?>" class="btn btn-icon icon-left btn-primary btn_chall"><i class="far fa-edit"></i>Edit</a>
                            
                            <a href="<?php echo 'delete.php?id='.$view_notif['id_notif']; ?>" class="btn btn-icon icon-left btn-danger btn_chall"><i class="fas fa-trash-alt"></i> Delete</a>
                            </td>
                          </tr>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          <button id="toastr-2">HAI</button>
        </div>
      </footer>
    </div>
  </div>

  <?php
    include '../template/js.php';

    if(isset($_SESSION['success'])){
      $success = $_SESSION['success'];
    ?>
    <script>
      
      $("#toastr-2").click(function() {
                iziToast.success({
                title: 'SUKSES !',
                message: '<?php echo $success ?>',
                position: 'topRight'
                });
                });
      $("#toastr-2").click();
      
    </script>
    <?php  
      unset($_SESSION['success']);
    } ?>

            <script>
                // Add the following code if you want the name of the file appear on select
                $("#toastr-2").hide();
              
            </script>
</body>
</html>