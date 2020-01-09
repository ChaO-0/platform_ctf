<?php
    include '../template/root.php';
    $hint = $_GET['idHint'];
    $dir = "../../../challenges/uploads/";
    $id = $_GET['id'];
    $id_cate = $_GET['id_cate'];
    session_start();
    $delete = "DELETE FROM hint WHERE  id_hint = '$hint'";
    if($conn->query($delete)){
        // echo "Berhasil Delete";
        $_SESSION['success']="Berhasil Delete";
        header("location:./view.php?id=$id&&id_cate=$id_cate");
    }
    else{
        echo mysqli_error($conn);
    }
    
?> 