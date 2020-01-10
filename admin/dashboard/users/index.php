<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Users &mdash; Admin</title>

  <?php
    $pre="../";
    include '../template/css.php';
  ?>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
        <?php
          $home='../';
          $user='./';
          $chall='../challenge/';
          $notif='../notification/';
          $logout='../';
          $solve='../solves';
          include '../template/nav.php';
        ?>


      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Users List</h1>
          </div>

          <div class="section-body">
            <?php
              include '../template/root.php';
              $read_users="SELECT * from users";
              $view = $conn -> query($read_users);
              $no = 1;
              $id = $_SESSION['id'];
            ?>
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th scope="col">No.</th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Affiliation</th>
                              <th scope="col">Role</th>
                              <th scope="col">Status</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            while($view_users=$view->fetch_array(MYSQLI_ASSOC)){
                          ?>
                              <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $view_users['username'];?></td>
                                <td><?php echo $view_users['email'];?></td>
                                <td><?php echo $view_users['affiliation'];?></td>
                                <td><?php echo ($view_users['role']==1?"Admin" : "Users");?></td>
                                <td><?php echo ($view_users['status']==1?"Aktif" : "Banned");?></td>
                                <td>
                                  <a href="statusUpdate.php?id=<?php echo ($view_users['id_user'])."&stat=".$view_users['status'];?>" class="btn btn-icon icon-left <?php echo ($view_users['status']==1?"btn-danger" : "btn-success");?>">
                                    <?php echo ($view_users['status']==1?"BAN" : "AKTIFKAN");?>
                                  </a>
                                  <?php if($view_users['role'] != 1 && $view_users['status'] != 0){ ?>
                                  <a href="roleUpdate.php?id=<?php echo $view_users['id_user'] . "&stat=" . $view_users['status']; ?>" class="btn btn-success">Make Admin</a>
                                  <?php }
                                        else{
                                           if($view_users['id_user'] != $id && $view_users['status'] != 0){
                                  ?>
                                  <a href="roleUpdate.php?id=<?php echo $view_users['id_user'] . "&stat=" . $view_users['status']; ?>" class="btn btn-danger">UnAdmin</a>
                                  <?php }
                                    } 
                                  ?>
                                </td>
                              </tr>
                            <?php }?>
                          </tbody>
                        </table>
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
                title: 'Success !',
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
                });
            </script>
</body>
</html>