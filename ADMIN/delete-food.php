<?php
    define('SITEURL', '../ADMIN/delete-food');

    include '../HTML/Menu.php'; 

    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        //echo "process to delete"

        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
        
        if($image_name != '')
        {
            
            $path = "../images/food/".$image_name;

            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['upload'] = "<div class='error'>failed to remove image</div>";
                header('location:' . SITEURL . '../ADMIN/delete-food');
                die();
            }

            $sql = "DELETE FROM tbl_food WHERE id=$id";
        }
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['delete'] = "<div class='success'>food deleted</div>";
            header('location:' . SITEURL . '../ADMIN/delete-food');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>failed to delete food</div>";
            header('location:' . SITEURL . '../ADMIN/delete-food');
        }

    }
    else
    {
        $_SESSION['unauthorize'] = "<div class='error'>unauthorize access</div>";
        header('location:' . SITEURL . '../ADMIN/delete-food');
    }
?>
