<?php 
    session_start();
    include '../template/root.php';
    $id = $_GET['id'];
    $stat = $_GET['stat'];
    $get_role = "SELECT role FROM users WHERE id_user=$id";
    $role = $conn->query($get_role)->fetch_assoc()['role'];
    var_dump($role); 
    
    if($stat == 1 && $role == 0){
        $edit = "UPDATE users 
                SET role = 1 WHERE id_user = $id";
            if($conn->query($edit)){
                // echo "Promote";
                $_SESSION['success']="Promoted Successfully !";
                header("location:./");
            }
            else{
                echo mysqli_error($conn);
            }
    }
    else if($stat == 1 && $role ==1){
        $edit = "UPDATE users 
                SET role = 0 WHERE id_user = $id";
            if($conn->query($edit)){
                // echo "Demote";
                $_SESSION['success']="Demoted Successfully !";
                header("location:./");
            }
            else{
                echo mysqli_error($conn);
            }
    }
    
?>