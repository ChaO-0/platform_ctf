<nav>
        <div class="nav-wrapper teal">
            <a href="index.html" class="brand-logo center">KCTF</a>
            <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <?php
                    require_once "session_check.php";
                    if($check != 1){
                ?>
                <li><a href="register.php">Register</a></li>
                <li><a href="/platform_ctf/login">Login</a></li>
                <?php } 
                    else{
                ?>
                <?php
                    $role = isset($_SESSION['role']) ? $_SESSION['role'] : 0;
                    if($role){
                ?>
                <li><a href="#">Admin</a></li>
                    <?php } ?>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="../logout">Logout</a></li>
                <?php
                    } 
                ?>
            </ul>
            <ul class="left hide-on-med-and-down">
                <li><a href="#">Notifications</a></li>
                <li><a href="#">Users</a></li>
                <li><a href="#">Scoreboard</a></li>
                <li><a href="../challenges">Challenges</a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile">
        <li><a href="#">Notifications</a></li>
        <li><a href="#">Users</a></li>
        <li><a href="#">Scoreboard</a></li>
        <li><a href="#">Challenges</a></li>
        <?php 
            if($check != 1){
        ?>
        <li class="divider" tabindex="-1"></li>
        <li><a href="#">Login</a></li>
        <li><a href="#">Register</a></li>
        <?php }?>
    </ul>