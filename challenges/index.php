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
        if(empty($_SESSION['id'])){
            header('location:/platform_ctf/login');
            die();
        }
    ?>
    <div class="row chall-list">
        <div class="col xl2 m4">
            <div class="categories">
                <div class="list-categories">
                    <a href="#" class="waves-effect waves-light btn">Reverse Engineering</a>
                    <a href="#" class="waves-effect waves-light btn">Reverse Engineering</a>
                    <a href="#" class="waves-effect waves-light btn">Reverse Engineering</a>
                    <a href="#" class="waves-effect waves-light btn">Reverse Engineering</a>
                    <a href="#" class="waves-effect waves-light btn">Reverse Engineering</a>
                </div>
            </div>
        </div>
        
        <div class="col xl10 m8">

            <div class="chall-container">
                <?php for($i=0;$i<20;$i++){ ?>
                    <a href="#">
                        <div class="chall-card">
                            <div class="card blue-grey darken-1">
                                <div class="card-content white-text">
                                    <span class="card-title">Card Title</span>
                                    <p>50</p>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php } ?>
                

            </div>
        </div>

    </div>
    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
            $('#challenges').addClass('active');
        });
    </script>
</body>
</html>