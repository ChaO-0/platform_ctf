<?php
        session_start();
        include '../template/root.php';
        $id_chall = $conn->real_escape_string($_POST['id_chall']);
        $title = $conn->real_escape_string($_POST['title']);
        $desc = $conn->real_escape_string($_POST['desc']);
        $status = 1;
        $edit = "UPDATE notification 
                SET title = '$title', description = '$desc'
                WHERE id_notif = $id_chall";

        if($conn->query($edit)){
                // echo "Berhasil Update";
                $_SESSION['success']="Berhasil Update";
                header("location:./");
        }
        else{
                echo mysqli_error($conn);
        }
        // var_dump($_POST);
?>