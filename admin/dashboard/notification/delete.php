<?php
    include '../template/root.php';
    session_start();
    $id=$_GET['id'];
    var_dump($_GET);
    $delete = "DELETE FROM notification WHERE  id_notif= $id";

    if($conn->query($delete)){
        // echo "Berhasil Delete";
        $_SESSION['success']="Berhasil Delete";
                header("location:./");
    }
    else{
        echo mysqli_error($conn);
    }
?>