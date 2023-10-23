<?php include 'connect.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
</head>
    <body>
            <form action="" method="post">
                <div class="container"> 
                    <h2><b>Login</b></h2>
                    

                    <?php
                        if(isset($_SESSION['login']))
                        {
                            echo $_SESSION['login'];
                            unset ($_SESSION['login']);
                        }

                        if(isset($_SESSION['no-login-message']))
                        {
                            echo $_SESSION['no-login-message'];
                            unset ($_SESSION['no-login-message']);
                        }
                    ?>

                    <br><br>

                        <div class="login">

                            <div class="form-group">
                                <label><b>Email: </b></label>
                                <input type="email" name="email_admin" placeholder="Enter your Email">
                            </div>

                            <div class="form-group">
                                <label><b>Full Name: </b></label>
                                <input type="text" name="full_name" placeholder="Enter Your Full Name">
                            </div>

                            <div class="form-group">
                                <label><b>Password</b></label>
                                <input type="password" name="password" placeholder="Password">
                            </div>

                            <div class="form-submit">
                                <input type="submit" name="submit" value="Login" class="btn btn-primary">
                            </div>
                            
                        </div>
                </div>

                <p>Not An Admin? <a href="../HTML/login.php">Login Here</a></p>

            </form>
    </body>

</html>

<?php 

if(isset($_POST['submit']))
{
    $email = $_POST['email_admin'];
    $full_name = $_POST['full_name'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM admin WHERE email_admin='$email' AND full_name='$full_name' AND password='$password'";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if($count==1)
    {
        $_SESSION['login'] = "Login Successful";
        $_SESSION['user'] = $email;

        header('location:'.SITEURL.'/ADMIN/manage_admin.php');
    }else{
        $_SESSION['login'] = "Login Failed";
        header('location:'.SITEURL.'/ADMIN/login_admin.php');
    }
}


?>

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
    margin-top: 100px;
    text-align: center;
}
input[type=email], input[type=text], input[type=password] {
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