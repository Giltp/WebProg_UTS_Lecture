<?php include 'admin_header.php';?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br />

        <?php
            $email=$_GET['email_admin'];

            $sql = "SELECT * FROM admin WHERE email_admin='$email'";

            $res = mysqli_query($conn, $sql);
        
            if($res==TRUE)
            {
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);

                    $email = $row['email_admin'];
                    $full_name = $row['full_name'];
                }else{
                    header('location:'.SITEURL. '/ADMIN/manage_admin.php');
                }
            }
        ?>

        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>
                        Email:
                    </td>
                    <td>
                        <input type="email" name="email_admin" value="<?php echo $email;?>">
                    </td>
                </tr>

                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name;?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="email_admin" value="<?php echo $email;?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php

if(isset($_POST['submit']))
{
    $email = $_POST['email_admin'];
    $full_name = $_POST['full_name'];

    $sql = "UPDATE admin SET
            email_admin = '$email',
            full_name = '$full_name'
            WHERE email_admin='$email';
    
    ";

    $res = mysqli_query($conn, $sql);

    if($res==TRUE)
    {
        $_SESSION['update'] = "Admin Updated Successfully";
        header('location:'.SITEURL. '/ADMIN/manage_admin.php');
    }else{
        $_SESSION['update'] = "Failed to Delete Admin";
        header('location:'.SITEURL. '/ADMIN/manage_admin.php');
    }
}


?>







<?php include '../HTML/Footer.php';?>

<style>
     .wrapper{
        margin-left: 20px;
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