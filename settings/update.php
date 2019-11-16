<?php
    session_start();
    require_once('../template/connection.php');

    $username = $conn->real_escape_string($_POST['username']);
    $confirm_password = md5($conn->real_escape_string($_POST['confirm_password']));
    $new_password = md5($conn->real_escape_string($_POST['new_password']));
    $email = $conn->real_escape_string($_POST['email']);
    $affiliation = $conn->real_escape_string($_POST['affiliation']);
    $id = $_SESSION['id'];

    if(empty($_POST['new_password']) && empty($_POST['confirm_password'])){
        $sql = "UPDATE users SET username='$username', email='$email', affiliation='$affiliation'
                WHERE id_user='$id'";
        if($conn->query($sql)){
            header("location:.");
            die();
        }
        else{
            echo mysqli_error($conn);
            die();
        }
    }

    if(!empty($_POST['confirm_password']) && !empty($_POST['new_password'])){
        $sql = "SELECT password FROM users WHERE id_user='$id'";
        $result = $conn->query($sql);
        $password_db = $result->fetch_assoc()['password'];

        if($password_db == $confirm_password){
            echo "ok";    
             $sql = "UPDATE users SET username='$username', password='$new_password' ,email='$email', 
                     affiliation='$affiliation' WHERE id_user='$id'";
             if($conn->query($sql)){
                 header("location:.");
                 die();
             }
             else{
                 echo mysqli_error($conn);
                 die();
             }
        }
        else{
            $_SESSION['error'] = "Password doesnt match";
            header("location:.");
        }
    }

    if(empty($_POST['confirm_password']) && !empty($_POST['new_password'])){
        $_SESSION['error'] = "Please fullfil the password requirement";
        header("location:.");
    }

    if(!empty($_POST['confirm_password']) && empty($_POST['new_password'])){
        $_SESSION['error'] = "Please fullfil the password requirement";
        header("location:.");
    }