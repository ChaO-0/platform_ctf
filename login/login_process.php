<?php
    session_start();
    require_once('../template/connection.php');

    $username = $conn->real_escape_string($_POST['username']);
    $password = md5($conn->real_escape_string($_POST['password']));
    
    $sql = "SELECT * FROM users WHERE BINARY username='$username' AND password='$password'";

    $result = $conn->query($sql);
    
    while($data = $result->fetch_assoc()){
        $id = $data['id_user'];
        $role = $data['role'];
    }

    if($result->num_rows == 1){
        $_SESSION['id'] = $id;
        $_SESSION['role'] = $role;
        header("location:../challenges");
    }else{
        $_SESSION['error'] = 'Wrong username or password';
        header("location:index.php");
    }
?> 