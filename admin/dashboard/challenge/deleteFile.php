<?php
    include '../template/root.php';
    $file = $_GET['name'];
    $dir = "../../../challenges/uploads/";
    $id = $_GET['id'];
    $id_cate = $_GET['id_cate'];
    session_start();
    $delete = "DELETE FROM files WHERE  file_name = '$file'";
    if($conn->query($delete)){
        // echo "Berhasil Delete";
        if (!unlink($dir.$file)) {
            echo ("Error deleting $file");
        } else {
            echo ("Deleted $file");
            $_SESSION['success']="Berhasil Delete";
            header("location:./view.php?id=$id&&id_cate=$id_cate");
        }
    }
    else{
        echo mysqli_error($conn);
    }
    
?> 