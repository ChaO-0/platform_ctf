<?php
    require_once 'connection.php';
    session_start();
    $id = $_SESSION['id'];
    $sql = "SELECT username FROM users WHERE id_user='$id'";
    $result = $conn->query($sql);
    $username = $result->fetch_assoc()['username'];
    if(empty($_SESSION['id'])){
        header("location:/platform_ctf/login");
        die();
    }
    if(isset($_SESSION['id']) && $_SESSION['role'] !== "1")
        die(header("location:/platform_ctf/challenges"));
?>
<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
    </form>

    <ul class="navbar-nav navbar-right">
    
    <!-- THIS IS GREETING USER NAV -->
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <!-- <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1"> -->
        <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $username ?></div></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a href="<?php echo $logout ?>logout" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
        </li>

    </ul>
</nav>

    <!-- THIS IS SIDEBAR SECTION -->
    <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="<?php echo $home; ?>">Dashboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
        <a href="<?php echo $home; ?>">Dsh.</a>
        </div>
        <ul class="sidebar-menu">
            <li class="dropdown active">
            <li>
                <a class="nav-link" href="<?php echo $user; ?>"><i class="fas fa-users"></i> <span>Users</span></a>
            </li>
            <li>
                <a class="nav-link" href="<?php echo $chall; ?>"><i class="fas fa-fire"></i> <span>Challenge</span></a>
            </li>
            <li>
                <a class="nav-link" href="<?php echo $notif; ?>"><i class="far fa-bell"></i> <span>Notification</span></a>
            </li>
            <li>
                <a class="nav-link" href="<?php echo $solve; ?>"><i class="fas fa-circle"></i> <span>Solves</span></a>
            </li>
        </ul>
    </div>