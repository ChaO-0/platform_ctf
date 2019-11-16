<?php
        session_start();
        include '../template/root.php ';
        $id_chall = $_POST['id_chall'];
        $title = $_POST['title'];
        $category = $_POST['category'];
        $desc = $_POST['desc'];
        $flag = $_POST['flag'];
        $hint = $_POST['hint'];
        $poin= $_POST['poin'];
        $status = 1;
        $edit = "UPDATE challenges 
                SET title = '$title', descript = '$desc', id_category = '$category',
                flag = '$flag', hint = '$hint', poin = '$poin' WHERE id_chall = $id_chall";

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