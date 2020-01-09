<?php
    include '../template/root.php';
    session_start();
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $status = 1;

    $ins_chal="INSERT INTO notification(title,description,status) VALUES( '$title','$desc','$status')";
    if($conn->query($ins_chal)){
        $_SESSION['success']="Berhasil Input";
        header("location:./");
    }
    else{
        echo mysqli_error($conn);
    }
?>