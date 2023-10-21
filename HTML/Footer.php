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
        <footer>
            <div class="footer_main">
                <div class="footer_tag">
                    <h2>Location</h2>
                    <p>Indonesia</p>
                    <p>USA</p>
                    <p>India</p>
                    <p>Japan</p>
                    <p>France</p>
                </div>
                <div class="footer_tag">
                    <h2>Quick Link</h2>
                    <p>Home</p>
                    <p>About</p>
                    <p>Menu</p>
                    <p>Order</p>
                </div>
                <div class="footer_tag">
                    <h2>Contact</h2>
                    <p>+62 12 3456 789</p>
                    <p>+62 11 2233445</p>
                    <p>anton@gmail.com</p>
                    <p>gilbert@gmail.com</p>
                </div>
                <div class="footer_tag">
                    <h2>Our Service</h2>
                    <p>Fast Delivery</p>
                    <p>Easy Payments</p>
                    <p>24 x 7 Service</p>
                </div>
                <div class="footer_tag">
                    <h2>Follows</h2>
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-linkedin-in"></i>
                </div>
            </div>
        </footer>
</body>
<style>
    footer{
    width: 100%;
    padding: 30px 0 0 20px;
    background: orange;
}

footer .footer_main{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
}

footer .footer_main .footer_tag{
    text-align: center;
}

footer .footer_main .footer_tag h2{
    color: #000;
    margin-bottom: 25px;
    font-size: 30px;
}

footer .footer_main .footer_tag p{
    margin: 10px 0;
}

footer .footer_main .footer_tag i{
    margin: 0 5px;
    cursor: pointer;
}

footer .footer_main .footer_tag i:hover{
    color: orange;
}

footer .end{
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 15px;
}

footer .end span{
    color: orange;
    margin-left: 10px;
}
</style>
</html>