<?php
    include '../template/root.php';
    session_start();
    $id_chall = $_POST['id_chall'];
    $id_cate = $_POST['id_cate'];
    $hint_desc = $_POST['hint_desc'];

    $sql = "INSERT INTO hint(id_chall, hint) VALUES ('$id_chall','$hint_desc')";
    if($conn -> query($sql)){

        $_SESSION['success']="Berhasil Tambah Hint ! ";
        header("location:./view.php?id=$id_chall&&id_cate=$id_cate");
    }
    else{
        echo"GAGAL INSERT KE DATABASE";
    }
?>