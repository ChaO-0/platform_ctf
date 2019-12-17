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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Welcome</title>
</head>
<body>  
    <?php
        require_once '../template/nav.php';
    ?>

    <div class="container">
        <div class="row">
            <form class="col s12 center-align form-pad-top" id="login-form">
                <div class="card-panel card-mobile">
                    <div class="red-text center-align">
                        <?php
                            if(isset($_SESSION['error'])){
                                $error = $_SESSION['error'];
                                // echo "<script>M.toast({html: '$error', displayLength: 1500, classes: 'rounded'})</script>";
                                session_destroy();
                            }
                        ?>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="username" name="username" type="text" class="validate" required>
                            <label for="username">Username</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" name="password" type="password" class="validate" required>
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 right-align">
                            <button class="btn waves-effect waves-light" type="button" name="action" id="login">Submit
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        });

        $(document).on('keypress', 'input', function(e) {
            if(e.which == 13) {
                $('#login').click();
                return false;
            }
        });

        function validate() {
            var valid = true;
            $("#login-form input[required], #login-form textarea[required]").each(function(){
                $(this).removeClass('invalid');
                $(this).attr('title','');
                if(!$(this).val()){ 
                    $(this).addClass('invalid');
                    $(this).attr('data-tooltip','This field is required');
                    $(document).ready(function(){
                        $('.invalid').tooltip({exitDelay: 800});
                    })
                    valid = false;
                }
            }); 
            return valid;
        }

        $('#login').click(function (e) {
            var valid = validate();
            if(valid){
                var data = $('#login-form').serialize();
                $.ajax({
                    type: "POST",
                    url: "login_process.php",
                    async: false,
                    data: data,
                    success: function (response) {
                        if(response == 1){
                            M.toast({html: "Login success", displayLength: 1500, outDuration: 300, classes: 'rounded'});
                            setTimeout(() => {
                                window.location.href = "../challenges/index.php";
                            }, 1000);
                        }
                        else{
                            M.toast({html: "Wrong username or password !", displayLength: 1500, outDuration: 300, classes: 'rounded'});
                        }
                    }
                });
            }
        });
    </script>
</body>
</html>