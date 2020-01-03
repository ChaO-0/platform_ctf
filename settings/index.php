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
        require_once "../template/connection.php";
        require_once "../template/nav.php";
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM users WHERE id_user='$id'";
        $result = $conn->query($sql);
        $username = '';
        $affiliation = '';
        $email = '';
        while($data = $result->fetch_assoc()){
            $username = $data['username'];
            $affiliation = $data['affiliation'];
            $email = $data['email'];
        }
    ?>
    <div class="container">
        <div class="row">
            <form class="col s12 center-align form-pad-top" id="update-form">
                <div class="card-panel card-mobile">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="username" value="<?php echo $username ?>" name="username" type="text" class="validate" required>
                            <label for="username">Username</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="confirm_password" name="confirm_password" type="password" class="validate">
                            <label for="confirm_password">Current Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="new_password" name="new_password" type="password" class="validate">
                            <label for="new_password">New Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" value="<?php echo $email ?>" name="email" type="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="affiliation" value="<?php echo $affiliation ?>" name="affiliation" type="text" class="validate">
                            <label for="affiliation">Affiliation</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="right-align">
                            <button class="btn waves-effect waves-light" id="update" type="button">Submit
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
            $('#settings').addClass('active');
            $('#update').click(function (e) {
                let data = $('#update-form').serialize();
                $.ajax({
                    type: "POST",
                    datatype: "json",
                    url: "update.php",
                    async: false,
                    data: data,
                    success: function (response) {
                        let data = JSON.parse(response);
                        if(data['update'] === true){
                            M.toast({html: "Successfully update data", displayLength: 1500, outDuration: 300, classes: 'rounded'});    
                        }
                        else{
                            M.toast({html: "Password doesn't match", displayLength: 1500, outDuration: 300, classes: 'rounded'});
                        }
                    }
                });
            });
        });

    </script>
</body>
</html>