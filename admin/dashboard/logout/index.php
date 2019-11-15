<?php
session_start();
session_destroy();
header("location:/platform_ctf/login/index.php");