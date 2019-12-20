<?php 
    require_once '../template/connection.php';
    session_start();
    $id = $conn->real_escape_string($_POST['id']);
    $flag = $conn->real_escape_string($_POST['flag']);
    $sql = "SELECT flag FROM challenges WHERE id_chall='$id'";
    $result = $conn->query($sql);
    $status;

    $flag_db = $result->fetch_assoc()['flag'];
    if($flag == $flag_db){
        $status = 1;
    }
    else{
        $status = 0;
    }
    $id_user = $_SESSION['id'];

    $sql = "INSERT INTO solves(id_user, id_chall, user_flag, status)
            VALUES('$id_user', '$id', '$flag', '$status')";
    
    if($result = $conn->query($sql)){
        if($status == 1){
            echo "Solved";
        }
        else{
            echo "Wrong";
        }
    }