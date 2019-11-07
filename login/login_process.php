<?php
    session_start();
    require_once('../template/connection.php');

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    $result = $conn->query($sql);
    $id = $result->fetch_assoc()['id_user'];

    if($result->num_rows == 1){
        $_SESSION['id'] = $id;
        header("location:../challenges");
    }else{
        $_SESSION['error'] = 'Wrong username or password';
        header("location:index.php");
    }
?> 