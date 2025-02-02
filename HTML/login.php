<?php
include ('../ADMIN/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
        include 'Header.php';
    ?>
    <form action="login.php" method="post">
        <?php
            if(isset($_POST["submit"])){
                $email = $_POST["email"];
                $password = $_POST["password"];
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                require_once "db.php";
                $sql = "SELECT * FROM user WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if ($user) {
                    if (password_verify($password, $user["password"])) {
                        session_start();
                        $_SESSION["user"] = "yes";
                        header("Location:".SITEURL.'/HTML/Home.php');
                        die();
                    }else{
                        echo "<div class='alert alert-danger'>Password does not match</div>";
                    }
                }else{
                    echo "<div class='alert alert-danger'>Email does not match</div>";
                }
            }
        ?>
        <div class="container"> 
        <h2><b>Login</b></h2>
            <div class="login">
                <div class="form-group">
                    <label><b>Email</b></label>
                    <input type="email" placeholder="Email" name="email" id="email" >
                </div>
                <div class="form-group">
                    <label><b>Password</b></label>
                    <input type="password" placeholder="Password" name="password" id="password" >
                </div>
                <div class="form-submit">
                    <input type="submit" name="submit" value="Log In" class="btn btn-primary">
                </div>
            </div>
        </div>
        <div class="container signin">
            <p>Don't have an account yet? <a href="regis.php">Register</a>.</p>
            <p>An Admin? <a href="../ADMIN/login_admin.php">Login Here</a></p>
        </div>
    </form><br><br><br><br>
    <?php
        include 'Footer.php';
    ?>
</body>

<style>
    body {
	
	display: flex;
	justify-content: center;
	align-items: center;
	
	flex-direction: column;
}

*{
	font-family: sans-serif;
	box-sizing: border-box;
}

form {
	width: 400px;
	border: 2px solid #ccc;
	padding: 20px;
	background: white;
	border-radius: 10px;
    margin-top: -300px;
}
input[type=email], input[type=password] {
	display: block;
	border: 2px solid #ccc;
	width: 95%;
	padding: 10px;
	margin: 10px auto;
	border-radius: 1px;
    margin-bottom: 40px;
    height: 50px;
}
label {
	font-size: 18px;
	padding: 10px;
}
h2 {
        text-align: center;
        margin-bottom: 20px;
        margin-top: 10px;
        font-size: 30px;
    }
input[type=submit] {
	background: #555;
    padding: 10px 15px;
    color: #fff; 
    border-radius: 5px;
    font-size: 16px;
    border: none;
    width: 100%;
    margin-top: 20px;
    margin-bottom: 20px;
}
input[type=submit]:hover{
	opacity: .7;
    background-color: orange;
}

@media (max-width: 375px) {
        .container {
            max-width: 100%;
        }

        .container form .login {
            max-height: 300px;
            overflow-y: scroll;
        }

        form .login .form-group {
            margin-bottom: 15px;
            width: 100%;
        }
        
    }
</style>
</html>
