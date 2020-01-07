<?php
    include '../template/root.php';
    define("FILEROOT", $_SERVER['DOCUMENT_ROOT'] ."\platform_ctf");
    $id_chall = $_POST['id_chall'];
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