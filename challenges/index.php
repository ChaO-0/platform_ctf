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
    <title>Document</title>
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
    ?>
    <div id="<?php echo "chall" . $row['id_chall']; ?>" class="modal">
        <div class="modal-content">
            <h3 class="center-align"><?php echo $row['title']; ?></h3>
            <div class="left-align">
                <?php echo $row['descript']; ?>
            </div>
            <div class="input-field">
                <input id="flag" type="text" class="validate">
                <label for="flag">Flag</label>
                <span class="helper-text">Input flag here</span>
            </div>
            <div class="center-align flag-submit">
                <button type="button" class="btn-large">Submit</button>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
    </div>
    <?php }?>
    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
            $('#challenges').addClass('active');
            $('.modal').modal();
            $('.chall').click(function(){
                // console.log($(this).attr('value'));
                var value = $(this).attr('value');
                $('.chall').removeClass('clicked');
                ($(this).addClass('clicked'));
                $.ajax({
                    type: "GET",
                    url: "view.php",
                    data: {id: value},
                    dataType: "html",
                    success: function(response){
                        // alert(response);
                        $(".chall-container").html(response);
                    }
                })
                // ($(this).removeClass('clicked'));
            })
        });
    </script>
</body>
</html>