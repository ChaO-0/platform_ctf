<?php
    $home='./';
    $user='users.php';
    $chall='challenge.php';
    $notif='notification.php';
?>

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
        <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Hi, Admin!</div></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a href="features-profile.html" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
            </a>
            <a href="features-activities.html" class="dropdown-item has-icon">
            <i class="fas fa-bolt"></i> Activities
            </a>
            <a href="features-settings.html" class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> Settings
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item has-icon text-danger">
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
        </ul>
    </div>