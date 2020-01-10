<?php
        session_start();
        include '../template/root.php';
        $id_chall = $conn->real_escape_string($_POST['id_chall']);
        $title = $conn->real_escape_string($_POST['title']);
        $category = $conn->real_escape_string($_POST['category']);
        $desc = $conn->real_escape_string($_POST['desc']);
        $flag = $conn->real_escape_string($_POST['flag']);
        $poin= $conn->real_escape_string($_POST['poin']);
        $status = 1;
        $edit = "UPDATE challenges 
                SET title = '$title', descript = '$desc', id_category = '$category',
                flag = '$flag', poin = '$poin' WHERE id_chall = $id_chall";

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