<?php
    include '../template/root.php';
    session_start();
    $id=$_GET['id'];
    var_dump($_GET);
    $dir = "../../../challenges/uploads/";
    $sqlFile="SELECT id_chall,file_name FROM files WHERE id_chall = $id";
    $FileList = $conn -> query($sqlFile);
    //first delete file
    while($readFile=$FileList->fetch_array(MYSQLI_ASSOC)){
        if (!unlink($dir.$readFile['file_name'])) {
            echo ("Error deleting $file");
        } else {
            $_SESSION['success']="Berhasil Delete";
        }
    }

    $delete = "DELETE FROM files WHERE  id_chall= '$id'";
    if($conn->query($delete)){
        // echo "Berhasil Delete";
        $_SESSION['success']="Berhasil Delete";
    }
    else{
        echo mysqli_error($conn);
    }

    //second deleting hint
    $delete = "DELETE FROM hint WHERE  id_chall = '$id'";
    if($conn->query($delete)){
        $_SESSION['success']="Berhasil Delete";
    }
    else{
        echo mysqli_error($conn);
    }

    //third deleting challenge
    $delete = "DELETE FROM challenges WHERE  id_chall = '$id'";
    if($conn->query($delete)){
        // echo "Berhasil Delete";
        $_SESSION['success']="Berhasil Delete";
        header("location:./");
    }
    else{
        echo mysqli_error($conn);
    }

?>