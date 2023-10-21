<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <?
        include 'Header.php';
    ?>
    <div class="container">
        <form action="regis.php" method="post">
            <?php
            if (isset($_POST["submit"])) {
                $firstname = $_POST["firstname"];
                $lastname = $_POST["lastname"];
                $date = $_POST["date"];
                $address = $_POST["address"];
                $email = $_POST["email"];
                $password = $_POST["password"];

                $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                $errors = array();

                if (empty($firstname) or empty($lastname) or empty($date) or empty($address) or empty($email) or empty($password)) {
                    array_push($errors, "All fields are required");
                }
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    array_push($errors, "Email is not valid");
                }
                if (strlen($password) < 8) {
                    array_push($errors, "Password must be at least 8 charactes long");
                }
                require_once "db.php";
                $sql = "SELECT * FROM user WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $rowCount = mysqli_num_rows($result);
                if ($rowCount > 0) {
                    array_push($errors, "Email already exists!");
                }
                if (count($errors) > 0) {
                    foreach ($errors as  $error) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                } else {

                    $sql = "INSERT INTO user (email, password, nama_depan, nama_belakang, tanggal_lahir, alamat) VALUES ( ?, ?, ?, ?, ?, ? )";
                    $stmt = mysqli_stmt_init($conn);
                    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                    if ($prepareStmt) {
                        mysqli_stmt_bind_param($stmt, "ssssss", $email, $passwordHash, $firstname, $lastname, $date, $address);
                        mysqli_stmt_execute($stmt);
                        echo "<div class='alert alert-success'>You are registered successfully.</div>";
                    } else {
                        die("Something went wrong");
                    }
                }
            }
            ?>
            <h2><b>Registeration</b></h2>
            <div class="regis">
                <div class="form-group">
                    <label><b>First Name</b></label>
                    <input type="text" class="form-control" name="firstname" placeholder="First Name">
                </div>
                <div class="form-group">
                    <label><b>Last Name</b></label>
                    <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <label><b>Date</b></label>
                    <input type="date" class="form-control" name="date" placeholder="Date">
                </div>
                <div class="form-group">
                    <label><b>Address</b></label>
                    <input type="text" class="form-control" name="address" placeholder="Address">
                </div>
                <div class="form-group">
                    <label><b>Email</b></label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label><b>Password</b></label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
            </div>
            <div class="form-btn">
                    <input type="submit" class="btn btn-primary" value="Register" name="submit">
                </div>
            <div>
                <p>Already have an account ? <a href="login.php">Login Here</a></p>
            </div>
        </form>
    </div>
</body>
<?
    include 'Footer.php';
?>
<style>
    body {
        margin-top: 60px;
        flex-direction: column;
    }

    .container {
        align-items: center;
        justify-content: center;
        display: flex;
    }

    .container form .regis {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    form .regis .form-group {
        width: calc(100% / 2 - 20px);
        margin: 20px 0 12px 0;
    }

    .regis .form-group input {
        height: 45px;
        width: 100%;
        outline: none;
        border-radius: 1px;
        border: 2px solid #ccc;
        padding-left: 15px;
        font-size: 16px;
    }

    * {
        font-family: 'Poppins', sans-serif;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    form {
        width: 100%;
        max-width: 700px;
        border: 2px solid #ccc;
        padding: 20px 40px 20px 40px;
        background: white;
        border-radius: 10px;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        margin-top: 10px;
    }

    .from-btn {
        width: 100%;
    }

    input[type=submit] {

        background: #555;
        padding: 10px 15px;
        color: #fff;
        border-radius: 5px;
        margin-left: 10px;
        border: none;
        width: 100%;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    input[type=submit]:hover {
        opacity: .7;
        background-color: orange;
    }

    @media (max-width: 548px) {
        .container {
            max-width: 100%;
        }

        .container form .regis {
            max-height: 300px;
            overflow-y: scroll;
        }

        form .regis .from-group {
            margin-bottom: 15px;
            width: 100%;
        }
    }
</style>

</html>
