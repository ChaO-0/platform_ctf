<nav>
        <div class="nav-wrapper teal">
            <a href="/platform_ctf" class="brand-logo center">KCTF</a>
            <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <?php
                    require_once "session_check.php";
                    if($check != 1){
                ?>
                <li><a href="/platform_ctf/register">Register</a></li>
                <li id="login"><a href="/platform_ctf/login">Login</a></li>
                <?php } 
                    else{
                ?>
                <?php
                    $role = isset($_SESSION['role']) ? $_SESSION['role'] : 0;
                    if($role === '1'){
                ?>
                <li><a href="/platform_ctf/admin/dashboard">Admin</a></li>
                    <?php } ?>
                <li id="profile"><a href="/platform_ctf/profile">Profile</a></li>
                <li id="settings"><a href="/platform_ctf/settings">Settings</a></li>
                <li><a href="/platform_ctf/logout">Logout</a></li>
                <?php
                    } 
                ?>
            </ul>
            <ul class="left hide-on-med-and-down">
                <li id="notification"><a href="/platform_ctf/notification">Notifications</a></li>
                <li id="users"><a href="/platform_ctf/users">Users</a></li>
                <li id="scoreboard"><a href="/platform_ctf/scoreboard">Scoreboard</a></li>
                <li id="challenges"><a href="/platform_ctf/challenges">Challenges</a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile">
        <li><a href="#">Notifications</a></li>
        <li><a href="/platform_ctf/users">Users</a></li>
        <li><a href="/platform_ctf/scoreboard">Scoreboard</a></li>
        <li><a href="/platform_ctf/challenges">Challenges</a></li>
        <?php 
            if($check != 1){
        ?>
        <li class="divider" tabindex="-1"></li>
        <li><a href="/platform_ctf/login">Login</a></li>
        <li><a href="/platform_ctf/register">Register</a></li>
        <?php }
            else{
        ?>
        <li class="divider" tabindex="-1"></li>
        <li><a href="/platform_ctf/logout">Logout</a></li>
        <?php } ?>
    </ul>