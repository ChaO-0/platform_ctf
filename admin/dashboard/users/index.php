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
                                <a href="#" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Edit</a>
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
          
        </div>
      </footer>
    </div>
  </div>

  <?php
    include '../template/js.php';
  ?>

</body>
</html>