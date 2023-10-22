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


    <section class="member">

        <div class="card">
            <img src="" alt="">
            <div class="container">
                <h4><b>Anthonio Puerturo Bulo</b></h4>
                <p>Front End & Back End</p>
            </div>
        </div>
    
        <div class="card">
            <img src="" alt="">
            <div class="container">
                <h4><b>Gilbert Parluhutan Pakpahan</b></h4>
                <p>Front End</p>
            </div>
        </div>

        <div class="card">
            <img src="" alt="">
            <div class="container">
                <h4><b>Daniel Isaach Hutaon Siregar</b></h4>
                <p>Front End</p>
            </div>
        </div>

        <div class="card">
            <img src="" alt="">
            <div class="container">
                <h4><b>Muhammad Ilham Salsabillah</b></h4>
                <p>Moral Support</p>
            </div>
        </div>

    </section>

    <?php
        include 'Footer.php';
    ?>
</body>
</html>

<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}
</style>