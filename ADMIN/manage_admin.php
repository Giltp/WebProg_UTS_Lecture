<?php include 'admin_header.php';?>

<body>
     <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>

            <br />

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>

            <a href="add-admin.php" class="btn-primary">ADD ADMIN</a>

            <br />
            
            <table class="tbl-full">
                <tr>
                    <th>Email</th>
                    <th>Full Name</th>
                    <th>Actions</th>
                </tr>


                <?php
                    $sql = "SELECT * FROM admin";
                    $res = mysqli_query($conn, $sql);

                    if($res==TRUE)
                    {
                        $count = mysqli_num_rows($res);

                        if($count>0)
                        {
                            while ($rows=mysqli_fetch_assoc($res))
                            {
                                $email=$rows['email_admin'];
                                $full_name=$rows['full_name'];

                                ?>

                                    <tr>
                                        <td><?php echo $email?></td>
                                        <td><?php echo $full_name?></td>
                                        <td>
                                            <a href="<?php echo SITEURL;?>/ADMIN/update-admin.php?email_admin=<?php echo $email?>" class="btn-secondary">Update Admin</a>
                                            <a href="<?php echo SITEURL;?>/ADMIN/delete-admin.php?email_admin=<?php echo $email?>" class="btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>

                                <?php
                            }
                        }
                    }
                ?>

            </table>

        </div>
     </div>   

</body>


    
<?php include '../HTML/Footer.php'; ?>

<style>
    .tbl-full{
        width: 100%;
    }

    table tr th{
        border-bottom: 1px solid black;
        padding: 1%;
    }

    table tr td{
        padding: 1%;
        text-align: center;
    }

    .btn-primary{
        background-color: #079992;
        padding: 1%;
        margin-left: 20px;
        color: #fad390;
        text-decoration: none;
        font-weight: bold;
    }

    .btn-primary:hover{
        background-color: #0c2461;
    }

    .btn-secondary{
        background-color: #78e08f;
        padding: 1%;
        margin-left: 20px;
        color:blue;
        text-decoration: none;
        font-weight: bold;
    }

    .btn-secondary:hover{
        background-color: #b8e994;
    }

    .btn-danger{
        background-color: #eb2f06;
        padding: 1%;
        margin-left: 20px;
        color:white;
        text-decoration: none;
        font-weight: bold;
    }

    .btn-danger:hover{
        background-color: #e55039;
    }
</style>