<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
    <?php 
        require_once "../template/nav.php"; 
        require_once "../template/connection.php";
    ?>
    <div class="container">

        <div class="row">
            <div class="col s12 m12">
                <div class="card">
                    <div class="card-content ">
                        <span class="card-title">1. Notif</span>
                        <p>I am a very simple card. I am good at containing small bits of information.
                        I am convenient because I require little markup to use effectively.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        $(document).ready(function(){
            $('#users').addClass('active');
            $('.paging').click(function(){
                let page = $(this).text();
                $.ajax({
                    type: "get",
                    url: "users.php",
                    data: {page : page},
                    dataType: "html",
                    success: function (response) {
                        $("#users_table").html(response);
                    }
                });
                $(".paging").removeClass("active");
                $(this).addClass("active");
            })
        })
    </script>
</body>
</html>