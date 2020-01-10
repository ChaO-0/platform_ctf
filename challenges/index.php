<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Challenges</title>
</head>
<body>
    <?php
        require_once("../template/nav.php");
        require_once("../template/connection.php");
        if(empty($_SESSION['id'])){
            header('location:/platform_ctf/login');
            die();
        }
        $sql = "SELECT * FROM category";
        $result = $conn->query($sql);
    ?>
    <div class="row chall-list">
        <div class="col xl2 m4 s12">
            <div class="categories">
                <div class="list-categories">
                    <a class="waves-effect waves-light btn chall clicked" value=0>ALL</a>
                    <?php while($row = $result->fetch_assoc()){ ?>
                    <a class="waves-effect waves-light btn chall" value="<?php echo $row['id_category']; ?>"><?php echo $row['category']; ?></a> <?php } ?>
                    <!-- <a href="#" class="waves-effect waves-light btn">Reverse Engineering</a>
                    <a href="#" class="waves-effect waves-light btn">Reverse Engineering</a>
                    <a href="#" class="waves-effect waves-light btn">Reverse Engineering</a>
                    <a href="#" class="waves-effect waves-light btn">Reverse Engineering</a>
                    <a href="#" class="waves-effect waves-light btn">Reverse Engineering</a> -->
                </div>
            </div>
        </div>
        
        <div class="col xl10 m8 s12">
            <div class="chall-container">
                    <?php 
                        require_once "view.php"; ?>
            </div>
        </div>
    </div>
    <?php 
        $sql = "SELECT * FROM challenges";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            $id = $row['id_chall'];
            $user = $_SESSION['id'];
            $findsolve = "SELECT id_user, status FROM `solves` WHERE id_chall='$id' AND id_user='$user' AND status=1";
            $solved = $conn->query($findsolve);
            $get_hint = "SELECT id_hint FROM hint WHERE id_chall = '$id'";
            $hints = $conn->query($get_hint);
            $get_file = "SELECT file_name FROM files WHERE id_chall='$id'";
            $files = $conn->query($get_file);
    ?>
    <div id="<?php echo "chall" . $row['id_chall']; ?>" class="modal">
        <div class="modal-content">
            <h3 class="center-align"><?php echo $row['title']; while($data = $solved->fetch_assoc()){if($data['status'] == 1)echo "(Solved)";} ?></h3>
            <div class="left-align">
                <?php echo $row['descript']; ?>
            </div>
            <br>
            <?php
                if($files->num_rows > 0){
            ?>
            <div class="row files">
            <?php 
                    for($i = 0; $i < $files->num_rows; $i++){
            ?>
                <div class="col l3">
                    <a href="uploads/<?php while($file = $files->fetch_assoc()){ echo $file['file_name']; break; } ?>" class="btn-large modal-trigger" download><?php echo $file['file_name'] ?></a>
                </div>
            <?php
                    }
                    ?>
                    </div>
            <?php
                }
            ?>
            <?php 
                if($hints->num_rows > 0){ 
                    for($i = 0; $i < $hints->num_rows; $i++){
            ?>
            <div class="row hints">
                <div class="col s12">
                    <a href="#hint<?php while($hint = $hints->fetch_assoc()){ echo $hint['id_hint'];break; } ?>" class="btn modal-trigger">Hint</a>
                </div>
            </div>
            <?php }
                }
            ?>
            <div class="input-field">
                <input type="text" class="flag-val" id="<?php echo 'flag' . $row['id_chall']; ?>">
                <label for="flag">Flag</label>
                <span class="helper-text">Input flag here</span>
            </div>
            <div class="center-align flag-submit">
                <button type="button" value="<?php echo $row['id_chall']; ?>" class="btn-large">Submit</button>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
    </div>
    <?php 
        }
        $sql = "SELECT id_hint, hint FROM hint";
        $result = $conn->query($sql);
        // print_r($result);
        while($row = $result->fetch_assoc()){
    ?>
    <div id="hint<?php echo $row['id_hint']; ?>" class="modal">
        <div class="modal-content">
            <h4>This is a hint for you !</h4>
            <p><?php echo $row['hint']; ?></p>
            </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">I Get It</a>
        </div>
    </div>
    <?php } ?>
    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
            $('#challenges').addClass('active');
            $('.modal').modal();
            $('.chall-card').find('.teal.accent-3').removeClass('blue-grey darken-1');
            $('.chall').click(function(){
                let value = $(this).attr('value');
                $('.chall').removeClass('clicked');
                ($(this).addClass('clicked'));
                $.ajax({
                    type: "GET",
                    url: "view.php",
                    data: {id: value},
                    dataType: "html",
                    success: function(response){
                        $(".chall-container").html(response);
                        $('.chall-card').find('.teal.accent-3').removeClass('blue-grey darken-1');
                    }
                });
            });
            $(document).on('keypress', 'input', function(e) {
                if(e.which == 13) {
                    $(this).closest('.modal-content').children('.flag-submit').click();
                }
            });
        });
        $('.flag-submit').click(function(){
            let input_id = $(this).children('button').val();
                let flag = ($("#flag" + input_id).val());
                var values = {
                   'id' : input_id,
                   'flag' : flag
                };
            $.ajax({
                type: "POST",
                url: "solve.php",
                data: values,
                success: function (response) {
                    let result = JSON.parse(response);
                    if(result['message'] == "Solved"){
                        let message = result['message'];
                        M.toast({html: message, displayLength: 1500, outDuration: 1000, classes: 'rounded teal accent-3'});
                        $('#card' + input_id).addClass('teal accent-3').removeClass('blue-grey darken-1');
                    }
                    else if(result['message'] == "You already solved this challenge"){
                        let message = result['message'];
                        M.toast({html: message, displayLength: 1500, outDuration: 1000, classes: 'rounded teal accent-3'});
                    }
                    else{
                        let message = result['message'];
                        M.toast({html: message, displayLength: 1500, outDuration: 1000, classes: 'rounded red accent-3'});    
                    }
                }
            });
        })
    </script>
</body>
</html>