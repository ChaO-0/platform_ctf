<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Challenge List &mdash; Admin</title>

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
          $chall='./';
          $notif='../notification/';
          include '../template/nav.php';
          
        ?>


      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Challenge List</h1>
          </div>

          <div class="section-body">
            <?php
                include '../template/root.php';
                $read_chall="SELECT challenges.id_chall ,challenges.title,challenges.descript,category.id_category, category.category, challenges.flag,challenges.hint, challenges.poin 
                              FROM `challenges` 
                              INNER JOIN category ON challenges.id_category =category.id_category ";
                $view = $conn -> query($read_chall);
                $no = 1;
              ?>

              <div class="card">
                <div class="card-header">
                  <a class="btn btn-icon icon-left btn-info" href="add.php">
                    <i class="fas fa-plus"></i>
                    Add Challenge
                  </a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">No.</th>
                          <th scope="col" class="title">Title</th>
                          <th scope="col">Description</th>
                          <th scope="col">Category</th>
                          <th scope="col">Flag</th>
                          <th scope="col">Hint</th>
                          <th scope="col">Poin</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        while($view_chall=$view->fetch_array(MYSQLI_ASSOC)){
                      ?>
                          <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $view_chall['title'];?></td>
                            <td><?php echo $view_chall['descript'];?></td>
                            <td><?php echo $view_chall['category'];?></td>
                            <td><?php echo $view_chall['flag'];?></td>
                            <td><?php echo $view_chall['hint'];?></td>
                            <td><?php echo $view_chall['poin'];?></td>
                            <td>
                            <a href="<?php echo 'edit.php?id='.$view_chall['id_chall'].'&&id_cate='.$view_chall['id_category']; ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Edit</a>
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
          
        </div>
      </footer>
    </div>
  </div>

  <?php
    include '../template/js.php';
  ?>

</body>
</html>