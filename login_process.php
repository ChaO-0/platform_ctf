<?php
    //Untuk testing doang
    //Kalo udah bisa login, passwordnya di hash + dikasi escape string
    //Masih ada error entah kenapa anjg
    session_start();
    require_once('connection.php');

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT id FROM platform_ctf";

    $result = $conn->query($sql);
    echo $result->num_rows;
    var_dump($result);
    while($row = $result->fetch_assoc()){
            echo $row['id'];
            echo $row['username'];
            echo $row['password'];
            echo $row['email'];
            echo $row['affiliation'];
    }
?> 