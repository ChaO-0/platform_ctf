<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Document</title>
</head>
<body>
    <nav>
        <div class="nav-wrapper teal">
            <a href="index.html" class="brand-logo center">KCTF</a>
            <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="register.php">Register</a></li>
              <li><a href="login.php">Login</a></li>
            </ul>
            <ul class="left hide-on-med-and-down">
              <li><a href="#">Notifications</a></li>
              <li><a href="#">Users</a></li>
              <li><a href="#">Scoreboard</a></li>
              <li><a href="#">Challenges</a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile">
      <li><a href="#">Notifications</a></li>
      <li><a href="#">Users</a></li>
      <li><a href="#">Scoreboard</a></li>
      <li><a href="#">Challenges</a></li>
      <li class="divider" tabindex="-1"></li>
      <li><a href="#">Login</a></li>
      <li><a href="#">Register</a></li>
    </ul>

    <div class="container">
        <div class="row">
            <form class="col s6 offset-s3 form-pad-top" method="POST">
                <div class="card-panel">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="username" name="username" type="text" class="validate">
                            <label for="username">Username</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" name="password" type="password" class="validate">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 offset-s8">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
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
    </script>
</body>
</html>