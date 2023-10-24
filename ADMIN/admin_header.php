<?php include 'connect.php';
    include 'login_check.php';
?>

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
        <nav>
            <div class="logo">
                <h1>IF330Restaurant</h1>
            </div>
            <ul>
                <li><a href="../HTML/Home.php">Home</a></li>
                <li><a href="manage_admin.php">Admin</a></li>
                <li><a href="manage_category.php">Category</a></li>
                <li><a href="manage_food.php">Food</a></li>
                <li><a href="manage_order.php">Order</a></li>
                <li><a href="logout_admin.php">Logout</a></li>
            </ul>
        </nav>
    </section>
</body>
<style>
    section{
    width: 100%;
    height: 70vh;
}

section nav{
    display: flex;
    justify-content: space-around;
    align-items: center;
    position: fixed;
    right: 0;
    left: 0;
    background: white;
    box-shadow: 0 0 10px rgba(0,0,0,0.5);
    z-index: 1000;
    width: 100%;
    padding: 30px;
}

section nav .logo{
    width: 100px;
    cursor: pointer;
    margin: 7px 0;
}

section nav ul{
    list-style: none;
}

section nav ul li{
    display: inline-block;
    margin: 0 15px;
}

section nav ul li a{
    text-decoration: none;
    color: #000;
    font-weight: 500;
    font-size: 17px;
    transition: 0.1s;
}

section nav ul li a::after{
    content: '';
    width: 0;
    height: 2px;
    background: orange;
    display: block;
    transition: 0.2s linear;
}

section nav ul li a:hover::after{
    width: 100%;
}

section nav ul li a:hover{
    color: orange;
}

</style>
</html>