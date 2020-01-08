<?php
    include '../template/root.php';
    session_start();
    $title = $_POST['title'];
    $category = $_POST['category'];
    $desc = $_POST['desc'];
    $flag = $_POST['flag'];
    $poin= $_POST['poin'];
    $status = 1;

    $ins_chal="INSERT INTO challenges VALUES( NULL,'$title','$desc',$category,'$flag','$poin','$status')";
    if($conn->query($ins_chal)){
        $_SESSION['success']="Berhasil Input";
        header("location:./");
    }
    else{
        echo mysqli_error($conn);
    }
?>