<?php
if($_POST){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$servername = "localhost";
	$us = "root";
	$ps = "";
	$db = "user_details";
	$con = mysqli_connect("$servername","$us","$ps","$db");
	$q = "SELECT * FROM user WHERE username = '$username' and password = '$password' ";
	$result = mysqli_query($con,$q);
	if($username === 'Admin' && $password === 'Admin@123'){
		header('Location:Admin Home.html');
	}
	
	elseif(mysqli_num_rows($result)==1){
		session_start();
		setcookie('username', $username, time() + 86400);
		$_SESSION['au']='true';
		
		header('location:index.php');
	}
	else{
		$error = true;
	}
}
?>
<html>
	<head>
		<title>Login Page</title>
		<link rel = "stylesheet" href = "Admin Login.css">
		
	</head>
	
	<body>
		<div class = "container">
			<div class = "form">
				<h3 class = "title">Login Page</h3>
				<form method = "POST" action = "auth.php" name = "frmUser">
					<div class ="form-group">
						<p class = "fp">Username</p><input type = "text"
						name = "username" required />
					</div>
					<div class ="form-group">
						<p class = "fp">Password</p>
						<input type="password" name = "password" required />
					</div>	
					<input type = "submit" value = "Sign Up" class = "submit" />
					<?php
						if (isset($error) && $error) {
							echo "<p style='color:rgb(220,50,3)'>Invalid Username or password</p>";
						}
					?>
				</form>
				
				<div class = "row">
					<p>Forgot your Password?
					<a href = "password Reset.html">Reset your Password</a></p>
					<p>New User?
					<a href = "User Registration Page.html">Register here</a></p>
					
				<div>
			</div>
			
		</div>

	</body>
</html>
				