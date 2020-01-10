<?php
    include '../template/root.php';
    session_start();
    $id_chall = $conn->real_escape_string($_POST['id_chall']);
    $id_cate = $conn->real_escape_string($_POST['id_cate']);
    $hint_desc = $conn->real_escape_string($_POST['hint_desc']);

    $sql = "INSERT INTO hint(id_chall, hint) VALUES ('$id_chall','$hint_desc')";
    if($conn -> query($sql)){

        $_SESSION['success']="Berhasil Tambah Hint ! ";
        header("location:./view.php?id=$id_chall&&id_cate=$id_cate");
    }
    else{
        echo"GAGAL INSERT KE DATABASE";
    }
?>