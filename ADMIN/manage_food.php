<?php include 'admin_header.php';?>
<body>
     <div class="main-content">
        <div class="wrapper">
            <h1>Manage Food</h1>

            

            <a href="../ADMIN/add-food.php" class="btn-primary">ADD FOOD</a>

            <br /><br /><br />

            <?php
                if(isset($_SESSION['add']))
                {
                    echo$_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['delete']))
                {
                    echo$_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['upload']))
                {
                    echo$_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

                if(isset($_SESSION['unauthorize']))
                {
                    echo$_SESSION['unauthorize'];
                    unset($_SESSION['unauthorize']);
                }

                if(isset($_SESSION['update']))
                {
                    echo$_SESSION['update'];
                    unset($_SESSION['update']);
                }

            ?>
            
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>

                <?php
                
                    $sql = "SELECT * FROM menu";

                    $res = mysqli_query($conn, $sql);
                    
                    $count = mysqli_num_rows($res);

                    $sn=1;

                    if ($count > 0)
                    {

                        while ($row = mysqli_fetch_assoc($res))
                        {

                            $id = $row["id"];
                            $title = $row['title'];
                            $price = $row['price'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];
                            ?>
                            
                            <tr>
                                <td><?php echo $sn++; ?> </td>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $price; ?></td>
                                <td>
                                    <?php
                                    if($image_name=="")
                                    {
                                        echo "<div class='error'>Image not Added.</di>";
                                    } 
                                    else
                                    {
                                        ?>
                                            <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>">
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td><?php echo $featured; ?></td>
                                <td><?php echo $active; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>../ADMIN/delete-food.php?id=<?php echo $id; ?>class="btn-secondary">Update Admin</a>
                                    <a href="<?php echo SITEURL; ?>../ADMIN/delete-food.php?id=<?php echo $id; ?>$image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Admin</a>
                                </td>
                            </tr>

                            <?php


                        }

                    }
                    else
                    {
                        echo "<tr><td colspan='7' class='error'> Food not Added Yet</td></tr>";
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