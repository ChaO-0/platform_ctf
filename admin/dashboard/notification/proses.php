<?php
    include '../template/root.php';
    session_start();
    $title = $conn->real_escape_string($_POST['title']);
    $desc = $conn->real_escape_string($_POST['desc']);
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