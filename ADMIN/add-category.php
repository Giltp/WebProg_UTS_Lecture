<?php include 'admin_header.php';?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br />

        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>

        <form action="" method="post" enctype="multipart/form-data">

        <table class="tbl-30">
            <tr>
                <td>Title:</td>
                <td><input type="text" name="title" placeholder="category title"></td>
            </tr>

            <tr>
                <td>Select Image:</td>
                <td><input type="file" name="image"></td>
            </tr>

            <tr>
                <td>Featured:</td>
                <td><input type="radio" name="featured" value="Yes">Yes</td>
                <td><input type="radio" name="featured" value="No">No</td>
            </tr>

            <tr>
                <td>Active:</td>
                <td><input type="radio" name="active" value="Yes">Yes</td>
                <td><input type="radio" name="active" value="No">No</td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                </td>
            </tr>
        </table>

        </form>

        <?php 
            if(isset($_POST['submit']))
            {
                $title = $_POST['title'];

                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }else{
                    $featured = "No";
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }else{
                    $active = "No";
                }

                if(isset($_FILES['image']['name']))
                {
                   $image_name = $_FILES['image']['name'];
                   $ext = end(explode('.', $image_name));
                   $image_name = "Food_Category_".rand(000, 999).".".$ext;
                   $source_path = $_FILES['image']['tmp_name'];
                   $destination_path = "../images/Category/".$image_name;

                   $upload = move_uploaded_file($source_path, $destination_path);

                   if($upload==FALSE)
                   {
                    $_SESSION['upload'] = "Failed to Upload Image";
                    header('Location:'.SITEURL.'/ADMIN/add-category.php');
                    die();
                   }
                }else{
                    $image_name = "";
                }

                $sql = "INSERT INTO cart SET
                        title='$title',
                        image_name='$image_name',
                        featured='$featured',
                        active='$active' 
                ";

                $res = mysqli_query($conn, $sql);

                if($res==TRUE)
                {
                    $_SESSION['add'] = "Category Added Successfully";
                    header("Location:". SITEURL.'/ADMIN/manage_category.php');
                }else{
                    $_SESSION['add'] = "Failed to Add Category";
                    header("Location:". SITEURL.'/ADMIN/add-category.php');
                }
            }

        
        ?>

    </div>
</div>



<?php include '../HTML/Footer.php';?>

<style>
    .wrapper{
        margin-left: 20px;
    }

    .tbl-30{
        width: 30%;
    }

    .btn-secondary{
        background-color: #78e08f;
        padding: 1%;
        color:blue;
        text-decoration: none;
        font-weight: bold;
    }

    .btn-secondary:hover{
        background-color: #b8e994;
    }
</style>