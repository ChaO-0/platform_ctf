<?php
    include '../template/root.php';
    session_start();
    $title = $conn->real_escape_string($_POST['title']);
    $category = $conn->real_escape_string($_POST['category']);
    $desc = $conn->real_escape_string($_POST['desc']);
    $flag = $conn->real_escape_string($_POST['flag']);
    $poin= $conn->real_escape_string($_POST['poin']);
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