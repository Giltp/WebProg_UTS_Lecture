<?php include 'admin_header.php';?>

<body>
     <div class="main-content">
        <div class="wrapper">
            <h1>Manage Category</h1>

            <br />

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['remove']))
                {
                    echo $_SESSION['remove'];
                    unset($_SESSION['remove']);
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
            ?>

            <a href="<?php echo SITEURL?>/ADMIN/add-category.php" class="btn-primary">ADD CATEGORY</a>

            <br />
            
            <table class="tbl-full">
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>

                <?php
                    $sql = "SELECT * FROM cart";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    $no = 1;
                    if($count>0)
                    {
                        while ($row=mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];

                            ?>

                                <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $title;?></td>

                                    <td>
                                        <?php
                                            if($image_name!="")
                                            {
                                                ?>

                                                <img src="<?php echo SITEURL;?>/images/Category/<?php echo $image_name?>" width="100px">

                                                <?php
                                            }else{
                                                echo "No Image";
                                            }

                                        ?>
                                    </td>

                                    <td><?php echo $featured?></td>
                                    <td><?php echo $active?></td>
                                    <td>
                                        <a href="<?php echo SITEURL;?>/ADMIN/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name?>" class="btn-danger">Delete Category</a>
                                    </td>
                                </tr>

                            <?php
                        }
                    }else{
                        ?>
                        <tr>
                            <td colspan="6">
                                <div class="error">No Category Added</div>
                            </td>
                        </tr>
                        <?php
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