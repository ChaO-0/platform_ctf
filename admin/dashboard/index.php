<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard &mdash; Admin</title>

  <?php
    $pre=" ";
    require_once 'template/css.php';
  ?>


<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
      <?php
        $home='./';
        $user='users/';
        $chall='challenge/';
        $notif='notification/';
        $solve = './solve';
        $logout='';
        include 'template/nav.php';
        // return isset($_SESSION['id']) ? '' : header('location:/platform_ctf/login');
      ?>
      
      <?php
        include 'template/root.php';
        $query_users="SELECT COUNT(*) as total FROM users ";
        $total_user=$conn->query($query_users)->fetch_assoc();
        $query_chall= "SELECT COUNT(*) as total FROM challenges";
        $total_chall= $conn->query($query_chall)->fetch_assoc();
        $query_notif= "SELECT COUNT(*) as total FROM notification";
        $total_notif= $conn->query($query_notif)->fetch_assoc();
        $query_solve= "SELECT COUNT(*) as total FROM solves";
        $total_solve=$conn->query($query_solve)->fetch_assoc();
      ?>
  <!-- TEST -->
      <!-- Card Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Users</h4>
                  </div>
                  <div class="card-body">
                    <?php
                      echo $total_user['total'];
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-fire"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Challenges</h4>
                  </div>
                  <div class="card-body">
                    <?php
                    
                      echo $total_chall['total'];
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-bell"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Notification</h4>
                  </div>
                  <div class="card-body">
                      <?php
                        echo $total_notif['total'];
                      ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Solves</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $total_solve['total']; ?>
                  </div>
                </div>
              </div>
            </div>                  
          </div>


          <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <form method="post" class="needs-validation" novalidate="">
                    <div class="card">
                      <div class="card-header">
                        <h4>Make Notification</h4>
                      </div>
                      <div class="card-body pb-0">
                        <div class="form-group">
                          <label>Title</label>
                          <input type="text" name="title" class="form-control" required>
                          <div class="invalid-feedback">
                            Please fill in the title
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Content</label>
                          <textarea class="summernote-simple"></textarea>
                        </div>
                      </div>
                      <div class="card-footer pt-0">
                        <button class="btn btn-primary">Save Draft</button>
                      </div>
                    </div>
                  </form>
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
    include 'template/js.php';
  ?>

</body>
</html>