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
        <table class="striped centered" id="users_table">
            <?php require_once 'users.php'; ?>
        </table>
        <br>
        <ul class="pagination center-align">
            <?php for($i = 1; $i <= $pages; $i++){ ?>
            <li class="waves-effect teal accent-4 <?php if($page == $i){ echo "active"; } ?> paging"><a><?php echo $i ?></a></li>
            <?php } ?>
        </ul>
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