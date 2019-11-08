<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Users &mdash; Admin</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
        <?php
          $home='./';
          $user='users.php';
          $chall='challenge/';
          $notif='notification.php';
          include 'template/nav.php';
        ?>


      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Users List</h1>
          </div>

          <div class="section-body">
            <?php
              include 'template/root.php';
              $read_users="SELECT * from users";
              $view = $conn -> query($read_users);
              $no = 1;
            ?>
          <div class="table-responsive">
                      <table class="table table-sm">
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

  <!-- General JS Scripts -->
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>