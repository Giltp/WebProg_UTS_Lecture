<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IF330Restaurant</title>
    <link rel="stylesheet" href="../CSS/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    <section id="Category">
        <div class="our_category">
            <h2>Our Categories</h2>
            <div class="category_boxes">
                <div class="category_box">
                    <img src="../images/Lauk/Beef Rendang.jpeg" alt="Lauk Category">
                    <h3>Lauk</h3>
                </div>
                <div class="category_box">
                    <img src="../images/Minuman/Milk.jpeg" alt="Minuman Category">
                    <h3>Minuman</h3>
                </div>
                <div class="category_box">
                    <img src="../images/Dessert/Ice_Cream.jpeg" alt="Dessert Category">
                    <h3>Dessert</h3>
                </div>
            </div>
        </div>
    </section>

    <section id="MenuButton">
        <div class="menu_button">
            <a href="Menu.php" class="btn btn-primary">View Menu</a>
        </div>
    </section>

    <?php
        include 'Footer.php';
    ?>
</body>
</html>

<style>
    .menu_button {
    display: flex;
    justify-content: center;
    margin-top: 40px;
  }
  
  .menu_button .btn {
    padding: 12px 28px;
    font-size: 18px;
    text-align: center;
    text-decoration: none;
    background-color: orange;
    color: white;
    border-radius: 5px;
    transition: background-color 0.3s ease;
  }
  
  .menu_button .btn:hover {
    background-color: darkorange;
  }
</style>