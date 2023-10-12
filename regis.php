<?php
// Inisialisasi variabel pesan kesalahan
$errors = [];

// Inisialisasi variabel input
$email = "";
$password = "";
$firstname = "";
$lastname = "";
$date = "";
$address = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $date = $_POST["date"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validasi semua bidang
    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($address) || empty($date)) {
        $errors[] = "All fields required";
    }

    // Validasi email
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email is not valid";
    }

    // Validasi password
    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long";
    }

    // Jika tidak ada kesalahan, lanjutkan dengan proses selanjutnya
    if (empty($errors)) {
        // Lakukan sesuatu dengan data yang sudah divalidasi
        // Misalnya, Anda bisa menyimpan data ke database atau melakukan tindakan lain.
        // Di sini, kita hanya mencetak pesan sukses.
        echo "Form submitted successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regesteration</title>
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>


<body>
<?php if (!empty($errors)): ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    <h1>Register</h1>
        <div class="container">

            <form action="proses_regis.php"  method="post">    
            <div class="from-group">
                <label><b>First Name</b></label>
                <input type="text" placeholder="First Name" name="firstname" id="FirstName" value="<?php echo $firstname; ?>"  />
            </div>
            <div class="from-group">
                <label><b>Last Name</b></label>
                <input type="text" placeholder="Last Name" name="lastname" id="LastName" value="<?php echo $lastname; ?>"  />
            </div>
            <div class="from-group">
                <label><b>Date</b></label>
                <input type="date" placeholder="Date" name="date" id="Date" value="<?php echo $date; ?>"  />
            </div>
            <div class="from-group">
                <label><b>Address</b></label>
                <input type="text" placeholder="Address" name="address" id="address" value="<?php echo $address; ?>"  />
            </div>
            <div class="from-group">
                <label><b>Email</b></label>
                <input type="email" placeholder="Email" name="email" id="email" value="<?php echo $email; ?>" />
            </div>
            <div class="from-group">
                <label><b>Password</b></label>
                <input type="password" placeholder="Password" name="password" id="password" value="<?php echo $password; ?>" />
            </div>
            <button type="submit" name="submit" class="registerbtn"> Submit
        </div>
        <div class="container signin">
            <p>Already have an account? <a href="#">Log in</a>.</p>
        </div>
    </form>
</body>
<style>
    body {
	height: 120vh;
	flex-direction: column;
}

.container{
    align-items: center;
    justify-content: center;
    display: flex;
}

*{
	font-family: sans-serif;
	box-sizing: border-box;
}

form {
	width: 400px;
	border: 2px solid #ccc;
	padding: 20px;
	background: wheat;
	border-radius: 15px;
}
input[type=text], input[type=password], input[type=email], input[type=date] {
	display: block;
	border: 2px solid #ccc;
	width: 95%;
	padding: 10px;
	margin: 10px auto;
	border-radius: 5px;
}
label {
	color: #888;
	font-size: 18px;
	padding: 10px;
}
h1{
    text-align: center;
	margin-bottom: 40px;
    font-family: 'Papyrus';
}
button[type=submit] {
	
	background: #555;
	padding: 10px 15px;
	color: #fff;
	border-radius: 5px;
	margin-left: 10px;
	border: none;
}
input[type=submit]:hover{
	opacity: .7;
}

.error{
    padding: 20px;
    background-color: #f44336;
    color: #ffffff;
    margin-bottom: 15px;
}

.alert{
    display: flex;
    justify-content: center;
    padding: 20px;
}

</style>
</html>
 
