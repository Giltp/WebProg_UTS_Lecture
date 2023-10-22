<?php

include 'connect.php';

$email = $_GET['email_admin'];

// Use prepared statement to prevent SQL injection
$sql = $conn->prepare("DELETE FROM `admin` WHERE email_admin=?");
$sql->bind_param("s", $email);
$sql->execute();

if ($sql->affected_rows > 0) {
    $_SESSION['delete'] = "Admin Deleted Successfully";
    header('location:'.SITEURL. '/ADMIN/manage_admin.php');
} else {
    $_SESSION['delete'] = "Failed to Delete Admin";
    header('location:'.SITEURL. '/ADMIN/manage_admin.php');
}

$sql->close();
$conn->close();

?>
