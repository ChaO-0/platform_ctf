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
                $logout='../';
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
                        $id=$_GET["id"];
                        $id_cate=$_GET["id_cate"];
                        $read_chall="SELECT challenges.id_chall ,challenges.title,challenges.descript,category.id_category, category.category, challenges.flag, challenges.poin 
                                    FROM challenges
                                    INNER JOIN category ON challenges.id_category =category.id_category 
                                    WHERE id_chall = $id";
                        $cate="SELECT * FROM category";
                        $view = $conn -> query($read_chall);
                        $result = $view ->fetch_assoc();
                        $view_c= $conn->query($cate);
                        
                        $no = 1;
                    ?>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3><?php echo $result['title']; ?></h3>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="true">Edit</a>
                                </li>
                                <li id="liHint" class="nav-item">
                                    <a class="nav-link" id="hint-tab" data-toggle="tab" href="#hint" role="tab" aria-controls="hint" aria-selected="false">Hint</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="file-tab" data-toggle="tab" href="#file" role="tab" aria-controls="file" aria-selected="false">File</a>
                                </li>
                            </ul>
                            <div class="tab-content tab-bordered" id="myTab3Content">
                                <div class="tab-pane fade show active" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                                    <form action="proses_edit.php" method="post" >
                                            <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="hidden" name="id_chall" value="<?php echo $id?>">
                                                
                                                <input value="<?php echo $result['title'];?>" type="text" class="form-control" name="title">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                            <div class="col-sm-12 col-md-7">
                                                <select class="form-control selectric" name="category">
                                                    <?php
                                                        while($view_cate=$view_c->fetch_array(MYSQLI_ASSOC)){
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
                                                <textarea class="summernote-simple" name="desc"><?php echo $result['descript'];?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Flag</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input value="<?php echo $result['flag'];?>" type="text" class="form-control" name="flag">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Poin</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input value="<?php echo $result['poin'];?>"type="number" class="form-control" name="poin">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button class="btn btn-primary">Edit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="hint" role="tabpanel" aria-labelledby="hint-tab">
                                    <?php
                                        $sqlHint = "SELECT hint FROM hint where id_chall = $id";
                                        $viewHint= $conn->query($sqlHint);
                                    ?>
                                    <p>                                    
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                            View Hint
                                        </button>
                                    </p>
                                    <div class="collapse" id="collapseExample">
                                        <?php while($readHint = $viewHint ->fetch_array(MYSQLI_ASSOC)){ ?>
                                            <div class="alert alert-info" role="alert">
                                                <?php echo $readHint['hint'] ?>
                                            </div>
                                        <?php }?>
                                    </div>
                                    <form action="add_hint.php" method="post" >
                                        <div class="form-group row mb-2">
                                            <input type="hidden" name="id_chall" value="<?php echo $id?>">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Hint</label>
                                            <div class="col-sm-12 col-md-7">
                                                <textarea class="summernote-simple" name="hint_desc"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button class="btn btn-primary">Add Hint</button>
                                            </div>
                                        </div>
                                    </form>
                                
                                </div>
                                <div class="tab-pane fade" id="file" role="tabpanel" aria-labelledby="file-tab2">
                                    <?php
                                            $sqlfiles = "SELECT file_name FROM files where id_chall = $id";
                                            $viewfiles= $conn->query($sqlfiles);
                                        ?>
                                        <p>                                    
                                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                View files
                                            </button>
                                        </p>
                                        <div class="collapse" id="collapseExample">
                                            <?php while($readfiles = $viewfiles ->fetch_array(MYSQLI_ASSOC)){ ?>
                                                <div class="alert alert-info" role="alert">
                                                    <a href="../../../challenges/uploads/<?php echo $readfiles['file_name'] ?>" target="_blank"><?php echo $readfiles['file_name'] ?></a>
                                                </div>
                                            <?php }?>
                                        </div>
                                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <div class="custom-file">
                                                    <input name="fileToUp" type="file" class="custom-file-input" id="customFile" >
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                    <p>Max size 4mb</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="hidden" name="id_chall" value="<?php echo $id; ?>">
                                                <button class="btn btn-primary">Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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

            if(isset($_SESSION['success'])){
            $success = $_SESSION['success'];
            ?>
            <script>
            
            alert("<?php echo $success;?> ");
            
            </script>
            <?php  
            unset($_SESSION['success']);
            } ?>

            <script>
                // Add the following code if you want the name of the file appear on select
                $(".custom-file-input").on("change", function() {
                    var fileName = $(this).val().split("\\").pop();
                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });
                // $("#liHint").hide();

            </script>
    </body>
</html>