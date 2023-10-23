<?php

    include 'connect.php';

    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
    
        if($image_name != "")
        {
            $path = "../images/Category/".$image_name;
            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['remove'] = "Failed to remove Category Image";
                header('location:'.SITEURL.'/ADMIN/manage_category.php');
                die();
            }
        }

            $sql = "DELETE FROM cart WHERE id=$id";

            $res = mysqli_query($conn, $sql);

            if($res==TRUE)
            {
                $_SESSION['delete'] = "Deleted Successfully";
                header('location:'.SITEURL.'/ADMIN/manage_category.php');
            }else{
                $_SESSION['delete'] = "Failed to Delete Category";
                header('location:'.SITEURL.'/ADMIN/manage_category.php');
            }
    }
    else
    {
        header('location:'.SITEURL.'/ADMIN/manage_category.php');
    }




?>