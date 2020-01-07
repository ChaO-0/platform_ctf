<?php
    include '../template/root.php';
    $id_chall = $_POST['id_chall'];
    $hint_desc = $_POST['hint_desc'];

    $sql = "INSERT INTO hint(id_chall, hint) VALUES ('$id_chall','$hint_desc')";
    if($conn -> query($sql)){
        echo "BERHAWSIL!";
    }
    else{
        echo"GAGAL INSERT KE DATABASE";
    }
?>