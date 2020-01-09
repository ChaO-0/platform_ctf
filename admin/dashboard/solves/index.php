<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Solves &mdash; Admin</title>

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
          $solve='./';
          $logout='../';
          include '../template/nav.php';
        ?>


      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Solves List</h1>
          </div>

          <div class="section-body">
            <?php
              include '../template/root.php';
              $limit = 10;
              $page = isset($_GET['page']) ? (int)$_GET["page"] : 1;
              $start = ($page > 1) ? ($page * $limit) - $limit : 0;
              $query = "SELECT * FROM solves";
              $view = $conn->query($query);
              $total = $view->num_rows;
              $pages = ceil($total / $limit);
              
              $read_solves="SELECT users.username, challenges.title, user_flag,created_at, solves.status 
                            FROM solves INNER JOIN users ON users.id_user = solves.id_user 
                            INNER JOIN challenges ON challenges.id_chall = solves.id_chall
                            LIMIT $start,$limit";
              $views = $conn -> query($read_solves);
              $no = $start+ 1;
              
            ?>
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th scope="col">No.</th>
                              <th scope="col">Username</th>
                              <th scope="col">Challenge</th>
                              <th scope="col">Submitted Flag</th>
                              <th scope="col">Date</th>
                              <th scope="col">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            while($view_solves=$views->fetch_array(MYSQLI_ASSOC)){
                          ?>
                              <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $view_solves['username'];?></td>
                                <td><?php echo $view_solves['title'];?></td>
                                <td><?php echo $view_solves['user_flag'];?></td>
                                <td><?php echo $view_solves['created_at'];?></td>
                                <?php ($stat = $view_solves['status']==1?"Benar" : "Salah");?>
                                <td>
                                    <?php if($stat == "Salah"){ ?>
                                        <a class="btn btn-icon icon-left btn-danger btn_chall text-white">Salah</a>
                                    <?php } else{ ?>
                                        <a class="btn btn-icon icon-left btn-success btn_chall text-white">Benar</a>
                                    <?php } ?>
                                </td>
                              </tr>
                            <?php }?>
                          </tbody>
                        </table>
                      </div>
              </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <?php
                            for($i = 1; $i <= $pages; $i++){
                        ?>
                        <li class="page-item <?php if($_GET['page'] == $i){ echo "active"; } ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php } ?>
                    </ul>
                </nav>
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