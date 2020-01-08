<?php 
    require_once '../template/connection.php';
    session_start();
    date_default_timezone_set("Asia/Hong_Kong");
    $id = $conn->real_escape_string($_POST['id']);
    $flag = $conn->real_escape_string($_POST['flag']);
    $sql = "SELECT flag FROM challenges WHERE id_chall='$id'";
    $date = date("Y-m-d H:i:s");
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

    $sql = "SELECT status FROM solves WHERE id_chall='$id' AND id_user='$id_user' AND status=1";
    $check = $conn->query($sql);
    // echo $check->num_rows;
    if($check->num_rows == 0){
        $sql = "INSERT INTO solves(id_user, id_chall, user_flag, created_at, status)
                VALUES('$id_user', '$id', '$flag', '$date', '$status')";
        if($result = $conn->query($sql)){
            if($status == 1){
                $data = array("message" => "Solved");
                echo json_encode($data);
            }
            else{
                $data = array("message" => "Incorrect");
                echo json_encode($data);
            }
        }
        else{
            echo $conn->error;
        }
    }
    else{
        $data = array("message" => "You already solved this challenge");
        echo json_encode($data);
    }