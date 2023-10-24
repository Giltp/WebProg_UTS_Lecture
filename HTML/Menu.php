<?php include '../ADMIN/connect.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="home.css">
    <title>Restaurant</title>
</head>
<body>
<section id="Home">
    <?php include 'Header.php'; ?>

    <div class="main">
        <div class="men_text">
            <h1>5<span>Star</span><br>Restaurant</h1>
            <h1>our<span>Menu</span></h1>
        </div>
    </div>
</section>

<br><br><br>

<div class="menu" id="Menu">
    <div class="menu_box">
        <?php
        $sql = "SELECT * FROM menu";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $nama = $row['nama'];
                $harga = $row['harga'];
                $image_name = $row['gambar'];
                $featured = $row['featured'];
                $active = $row['active'];
        ?>
        <div class="menu_card">
            <div class="menu_image">
                <img src="../images/Food/<?php echo $image_name; ?>">
            </div>
            <div class="small_card">
                <i class="fa-solid fa-heart"></i>
            </div>
            <div class="menu_info">
                <h2><?php echo $nama; ?></h2>
                <p>
                    <!-- Description of the food item -->
                </p>
                <h3>Rp. <?php echo $harga; ?></h3>
                <div class="menu_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <a href="login.php" class="menu_btn">Order Now</a>
            </div>
        </div>
        <?php
            }
        } else {
            echo "<p>No food items available.</p>";
        }
        ?>
    </div>
</div>


</body>
</html>


