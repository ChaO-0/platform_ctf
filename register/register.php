<?php
    session_start();
    require_once('../template/connection.php');

    $username = $conn->real_escape_string($_POST['username']);
    $password = md5($conn->real_escape_string($_POST['password']));
    $email = $conn->real_escape_string($_POST['email']);
    $confirm_password = md5($conn->real_escape_string($_POST['confirm_password']));
    $affiliation = $conn->real_escape_string($_POST['affiliation']);

    $sql = "SELECT username FROM users WHERE username = '$username'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $_SESSION['error'] = "Username already exist";
        die(header("location:/platform_ctf/register"));
    }

    if($password == $confirm_password){
        $sql = "INSERT INTO users (username, password, email, affiliation, role, status)
                VALUES ('$username', '$password', '$email', '$affiliation', 0, 1)";

        $result = $conn->query($sql);
        if($result){
            header("location:/platform_ctf/login");
            session_destroy();
            die();
        }
        else{
            echo mysqli_error($conn);
        }
    }
    else{
        $_SESSION['error'] = "Password doesn't match";
        header("location:/platform_ctf/register");
        die();
    }