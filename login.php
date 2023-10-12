<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regesteration</title>
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body>
    <h1>Login</h1>
    <form action="proses.php" method="post">
        <div class="container">    
            <label><b>Email</b></label>
            <input type="text" placeholder="Email" name="email" id="email" required>
            <br>
            <label><b>Password</b></label>
            <input type="password" placeholder="Password" name="pass" id="pass" required>
            <br>
            <button type="submit" class="registerbtn">Submit</button>
        </div>
        <div class="container signin">
            <p>Don't have an account yet? <a href="regis.php">Register</a>.</p>
        </div>
    </form>
</body>
<style>
    body {
	
	display: flex;
	justify-content: center;
	align-items: center;
	height: 90vh;
	flex-direction: column;
}

*{
	font-family: sans-serif;
	box-sizing: border-box;
}

form {
	width: 350px;
	border: 2px solid #ccc;
	padding: 20px;
	background: wheat;
	border-radius: 15px;
}
input[type=text], input[type=password] {
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
button {
	
	background: #555;
	padding: 10px 15px;
	color: #fff;
	border-radius: 5px;
	margin-left: 10px;
	border: none;
}
button:hover{
	opacity: .7;
}
</style>
</html>