<?php
    include '../template/root.php';
    define("FILEROOT", $_SERVER['DOCUMENT_ROOT'] . "/platform-ctf/challenges/uploads/");
    $id_chall = $_POST['id_chall'];
    $target_file = FILEROOT.basename($_FILES["fileToUp"]["name"]);
    $file_name = $_FILES["fileToUp"]["name"];
    $file_size = $_FILES["fileToUp"]["size"];

    $sql="INSERT INTO files(id_chall,file_name) VALUES($id_chall,'$file_name')";
    


?>