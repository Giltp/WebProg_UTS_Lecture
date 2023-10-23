<?php
    include 'connect.php';

    session_destroy();

    header('location:'.SITEURL.'/ADMIN/login_admin.php');
?>