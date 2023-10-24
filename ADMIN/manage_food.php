<?php include 'admin_header.php';?>
<body>
     <div class="main-content">
        <div class="wrapper">
            <h1>Manage Food</h1>

            <br />

            <a href="../ADMIN/add-food.php" class="btn-primary">ADD FOOD</a>

            <br />

            <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            
            ?>
            
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                </tr>                            
                
                <?php
                $sql = "SELECT * FROM menu";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                $sn=1;

                if($count>0)
                {
                    while ($row=mysqli_fetch_assoc($res))
                    {
                      $id = $row['id_menu'];
                      $nama = $row['nama'];
                      $harga = $row['harga'];
                      $image_name = $row['gambar'];
                      $featured = $row['featured'];
                      $active = $row['active'];
                      ?>

                        <tr>
                            <td><?php echo $sn++;?></td>
                            <td><?php echo $nama;?></td>
                            <td><?php echo $harga;?></td>
                            <td><?php 
                                    if($image_name!=="")
                                    {
                                        ?>

                                            <img src="<?php echo SITEURL;?>/images/Food/<?php echo $image_name?>" width="100px">

                                        <?php

                                    }else{
                                        echo "Image Not Added";
                                    }
                            ?></td>
                            <td><?php echo $featured;?></td>
                            <td><?php echo $active;?></td>
                        </tr>              
                
                      <?php
                    }
                }else{
                    echo "<tr><td colspan='7' class='error'>Food Not Added Yet</td></tr>";
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