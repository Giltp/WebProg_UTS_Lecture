<?php

include 'connect.php';

session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}else{
    $user_id = '';
}

?>

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
    <?php
        include 'Header.php';
    ?>
        <div class="main">
            <div class="men_text">
                <h1>5<span>Star</span><br>Restaurant</h1>
            </div>
        </div>
    </section>


<section class="category">
    <h1 class="title">Food Category</h1>

    <div class="box-container">

        <a href="category.php?category=lauk">
            <img src="../images/Lauk/Fried_Rice.jpeg" alt="">
            <h3>Lauk</h3>
        </a>

        <a href="category.php?category=minuman">
            <img src="../images/Minuman/Milk.jpeg" alt="">
            <h3>Minuman</h3>
        </a>

        <a href="category.php?category=dessert">
            <img src="../images/Dessert/Ice_Cream.jpeg" alt="">
            <h3>Desserts</h3>
        </a>
    </div>
</section>

<section class="products">

    <h1 class="title">Our Foods</h1>

    <div class="box-container">

        <?php
        $select_products = $conn->prepare("SELECT * FROM menu");
        $select_products->execute();

        if($select_products->rowCount() > 0)
        {
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC))
            {
        ?>

        <form action="" method="POST" class="box">
            <input type="hidden" name="PID" value="<?= $fetch_products['id_menu']; ?>"/>
            <input type="hidden" name="name" value="<?= $fetch_products['nama']; ?>"/>
            <input type="hidden" name="harga" value="<?= $fetch_products['harga']; ?>"/>
            <input type="hidden" name="desc" value="<?= $fetch_products['deskripsi']; ?>"/>
            <input type="hidden" name="gambar" value="<?= $fetch_products['gambar']; ?>"/>

            <a href="quick_view.php?PID=<?= $fetch_products['id_menu']; ?>" class="fas fa-eye"></a>

            <button type="submit" name="add_to_cart" class="fas fa-shopping-cart"></button>

            <img src="../images/<?= $fetch_products['gambar']; ?>" alt="">
        </form>


        <?php
            }
        }else{

        }
        
        ?>


    </div>
</section>


    <?php
        include 'Footer.php';
    ?>
</body>
</html>