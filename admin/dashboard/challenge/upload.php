<?php
    include '../template/root.php';
    session_start();
    $id_cate = $_POST['id_cate'];
    define("FILEROOT", $_SERVER['DOCUMENT_ROOT'] ."/platform_ctf");
    $id_chall = $conn->real_escape_string($_POST['id_chall']);
    $id_cate = $conn->real_escape_String($_POST['id_cate']);
    $destination = FILEROOT."/challenges/uploads/";
    $target_file = $destination.basename($_FILES["fileToUp"]["name"]);
    $file_name = $_FILES["fileToUp"]["name"];
    $file_size = $_FILES["fileToUp"]["size"];
    $file_tmp = $_FILES["fileToUp"]["tmp_name"];
    $file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $sql="INSERT INTO files(id_chall,file_name) VALUES($id_chall,'$file_name')";
    if($file_size >=5000000){
        echo "FILE TERLALU BESAR";
    }
    else{
        if(file_exists($target_file)){
            $sql = "UPDATE files SET id_chall = $id_chall, file_name='$file_name' WHERE id_chall = $id_chall AND file_name='$file_name'";
        }
        if($conn -> query($sql)){
            if(move_uploaded_file($file_tmp,$target_file)){
                echo "BERHASIL!";
                $_SESSION['success']="Berhasil Upload ".$file_name;
                header("location:./view.php?id=$id_chall&id_cate=$id_cate");
            }
            else{
                echo "gagal";
            }
        }
        else{
            echo"GAGAL INSERT KE DATABASE";
        }
        
    
    }
?>