<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Edit Challenge &mdash; Admin</title>

    <?php
    $pre="../";
    include '../template/css.php';
    ?>


    <body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <?php
            $home='../';
            $user='../users.php';
            $chall='./';
            $notif='../notification/';
            $logout='../';
            $solve='../solves';
            include '../template/nav.php';
            
            ?>


        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
            <div class="section-header">
                <h1>Challenge</h1>
            </div>

            <div class="section-body">
                <?php
                    include '../template/root.php';
                    $id= $_GET['id'];
                    $id_cate= $_GET['id_cate'];
                    $cate="SELECT * FROM category";
                    $chall="SELECT * FROM challenges where id_chall = $id";
                    $view_c=$conn->query($chall);
                    $view=$conn->query($cate);
                ?>
                <h2 class="section-title">Edit Challenge</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Challenge</h4>
                            </div>
                            <div class="card-body">
                                <form action="proses_edit.php" method="post">
                                    <?php 
                                        while($view_chall=$view_c->fetch_array(MYSQLI_ASSOC)){ 
                                    ?>
                                        <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="hidden" name="id_chall" value="<?php echo $id?>">
                                            
                                            <input value="<?php echo $view_chall['title'];?>" type="text" class="form-control" name="title">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control selectric" name="category">
                                                <?php
                                                    while($view_cate=$view->fetch_array(MYSQLI_ASSOC)){
                                                        if($view_cate['id_category']==$id_cate){
                                                ?>
                                                    <option selected value="<?php echo $view_cate['id_category'];?>" ><?php echo $view_cate['category'];?></option>
                                                    <?php } else {?>
                                                        <option  value="<?php echo $view_cate['id_category'];?>"><?php echo $view_cate['category'];?></option>
                                                    <?php } ?>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea class="summernote-simple" name="desc"><?php echo $view_chall['descript'];?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Flag</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input value="<?php echo $view_chall['flag'];?>" type="text" class="form-control" name="flag">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Hint</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input value="<?php echo $view_chall['hint'];?>" type="text" class="form-control" name="hint">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Poin</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input value="<?php echo $view_chall['poin'];?>"type="number" class="form-control" name="poin">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary">Edit</button>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </form>
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