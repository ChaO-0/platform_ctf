<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Add Challenge &mdash; Admin</title>

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
                <h1>Challenge</h1>
            </div>

            <div class="section-body">
                <?php
                    include '../template/root.php';
                    $cate="SELECT * FROM category";
                    $view=$conn->query($cate);
                ?>
                <h2 class="section-title">Add Challenge</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Add Challenge</h4>
                            </div>
                            <div class="card-body">
                                <form action="proses.php" method="post">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="title">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control selectric" name="category">
                                                <?php
                                                    while($view_cate=$view->fetch_array(MYSQLI_ASSOC)){
                                                ?>
                                                    <option value="<?php echo $view_cate['id_category'];?>"><?php echo $view_cate['category'];?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea class="summernote-simple" name="desc"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Flag</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="flag">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Hint</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="hint">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Poin</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="number" class="form-control" name="poin">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary">Add</button>
                                        </div>
                                    </div>
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