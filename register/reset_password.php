<?php
session_start();
$success_message=$error_message=$name=$email=$password=$cpassword='';
if (!empty($_POST)) {
	require_once('dbconnection.php');
	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
	$cpassword = mysqli_real_escape_string($conn,$_POST['cpassword']);
	
	if ($password==$cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)>0){
			$error_message='email id already exists';
		}else{
			$password=md5($password);
			$filename='';
			if (!empty($_FILES)) {
				$filename=$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$filename);
			}
			$sql = "INSERT INTO users (name,email,image,user_type,password) VALUES ('$name','$email','$filename','user','$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				$success_message = 'register successfully';
				$error_message=$name=$email=$password=$cpassword='';
			}
		}
	}else {
		$error_message='password does not matched';
	}
} ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Form</title>
</head>
<body>
	<?php echo $error_message; ?>
	<?php echo $success_message; ?>
	<form action="" method="post" enctype="multipart/form-data">
		
		<label for="password">Password:</label>
		<input type="password" name="password" id="password" required><br>
		<label for="cpassword">Confirm Password:</label>
		<input type="password" name="cpassword" id="cpassword" required><br>
		<button type="submit" name="submit">submit</button><br>
		<p>already have an account?<a href="login.php" >Login</a></p>
	</form>
</body>
</html>