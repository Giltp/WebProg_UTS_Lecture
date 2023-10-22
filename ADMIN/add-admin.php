<?php include 'admin_header.php';?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Add Admin</h1>

            <br />

            <form action="" method="POST">

                <table class="tbl-30">
                    <tr>
                        <td>Email:</td>
                        <td>
                            <input type="email" name="email_admin" placeholder="Enter Email">
                        </td>
                    </tr>

                    <tr>
                        <td>Full Name:</td>
                        <td>
                            <input type="text" name="full_name" placeholder="Enter Name">
                        </td>
                    </tr>

                    <tr>
                        <td>Password: </td>
                        <td>
                            <input type="password" name="password" placeholder="Enter Password">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                        </td>
                    </tr>
                </table>

            </form>
        </div>
    </div>


<?php include '../HTML/Footer.php';?>

<?php

    if(isset($_POST['submit']))
    {
        $email = $_POST['email_admin'];
        $full_name = $_POST['full_name'];
        $pass = md5($_POST['password']);

        $sql = "INSERT INTO admin SET
                email_admin='$email',
                full_name='$full_name',
                password='$pass'
        ";

        $res = mysqli_query($conn, $sql);

        if($res==TRUE)
        {
            $_SESSION['add'] = "Admin Added";
            header("location:".SITEURL. 'ADMIN/manage_admin.php');
        }else{
            $_SESSION['add'] = "Failed to Add Admin";
            header("location:".SITEURL. 'ADMIN/add-admin.php');
        }
    }

?>

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