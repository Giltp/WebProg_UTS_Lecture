<?php 
    include '../ADMIN/connect.php';
    include '../HTML/Menu.php'; 
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>

        <br><br>

        <?php
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }        
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                
            <tr>
                <td>Nama:</td>
                <td>
                    <input type="text" name="nama" placeholder="Nama Makanan">
                </td>
            </tr>

            <tr>
                <td>Harga: </td>
                <td>
                    <input type="number" name="harga">
                </td>
            </tr>

            <tr>
                <td>Deskripsi: </td>
                <td>
                    <textarea name="description" id="" cols="30" rows="5" placeholder="Deskripsi makanan"></textarea>
                </td>
            </tr>


            <tr>
                <td>Select Image: </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>Category: </td>
                <td>
                    <select name="category">

                    <?php
                        $sql = "SELECT * FROM cart WHERE active='Yes'";

                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);

                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $title = $row['title'];

                                ?>

                                    <option value="<?php echo $id;?>"><?php echo $title;?></option>

                                <?php
                            }
                        }else{
                            ?>
                                <option value="0">No Category</option>
                            <?php
                        }
                    ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Featured: </td>
                <td>
                    <input type="radio" name='featured' value="Yes"> Yes
                    <input type="radio" name='featured' value="No"> No
                </td>
            </tr>

            <tr>
                <td>Active: </td>
                <td>
                    <input type="radio" name='active' value="Yes"> Yes
                    <input type="radio" name='active' value="No"> No
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                </td>
            </tr>

            </table>
        </form>
    </div>
</div>

<?php
            if(isset($_POST['submit']))
            {
                $nama = $_POST['nama'];
                $harga = $_POST['harga'];
                $deskripsi = $_POST['description'];
                $category = $_POST['category'];

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

                    if($image_name!="")
                    {
                        $image_info = explode (".", $image_name);
                        $ext = end ($image_info);
                        
                        $image_name = "Food-Name-".rand(0000, 9999).".".$ext;

                        $src = $_FILES['image']['tmp_name'];

                        $dst = "../images/Food/".$image_name;

                        $upload = move_uploaded_file($src, $dst);

                        if($upload==false)
                        {
                            $_SESSION['upload'] = "Failed to Uplaod Image";
                            header('location:'.SITEURL.'/ADMIN/add-food.php');
                            die();
                        }
                    }

                }else{
                    $image_name = "";
                }

                $sql2 = "INSERT INTO menu
                        SET nama = '$nama',
                        harga = $harga,
                        deskripsi = '$deskripsi',
                        gambar = '$image_name',
                        id_kategori = '$category',
                        featured = '$featured',
                        active = '$active'
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2==true)
                {
                    $_SESSION['add'] = "Food Added Successfully";
                    echo '<script>window.location.href="'.SITEURL.'/ADMIN/manage_food.php";</script>';
                }
                else
                {
                    $_SESSION['add'] = "Failed to Add Food";
                    echo '<script>window.location.href="'.SITEURL.'/ADMIN/manage_food.php";</script>';
                }
            }
        
        ?>

<?php
        include '../HTML/Footer.php';
    ?>

<style>
    .wrapper{
        margin-left: 20px;
    }

    .tbl-30{
        width: 30%;
    }

    .btn-secondary{
        margin: 20px auto;
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