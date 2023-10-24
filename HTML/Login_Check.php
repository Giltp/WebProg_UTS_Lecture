<?php
session_start();
if(!isset($_SESSION['user'])) {
    $_SESSION['no-login-message'] = "Please log in to access the Order";
    header('location: '.SITEURL.'/HTML/login.php');
    exit;
}
?>