<?php
    session_start();
    include '../template/root.php';
    $id = $_GET['id'];
    $stat = $_GET['stat'];
    
    if($stat == 1){
        $edit = "UPDATE users 
        SET status = 0 WHERE id_user = $id";
            if($conn->query($edit)){
                // echo "Berhasil Update";
                $_SESSION['success']="Banned";
                header("location:./");
            }
            else{
                echo mysqli_error($conn);
            }
    }
    else{
        $edit = "UPDATE users 
        SET status = 1 WHERE id_user = $id";
            if($conn->query($edit)){
                // echo "Berhasil Update";
                $_SESSION['success']="Activated";
                header("location:./");
            }
            else{
                echo mysqli_error($conn);
            }
    }

?>