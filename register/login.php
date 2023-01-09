<?php
session_start();
$success_message=$error_message=$email=$password='';
if (!empty($_POST)) {
	require_once('dbconnection.php');
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
	$sql = "SELECT * FROM users WHERE email = '$email'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		if (md5($password)==$row["password"]) {
			$_SESSION['login']=true;
			$_SESSION['id']=$row['id'];
			header("location: index.php");
		} else {
			$error_message = 'wrong password';
		}
	} else {
		$error_message = 'user not register';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>
		<?php echo $error_message; ?>
		<?php echo $success_message; ?>
	<form action="" method="post" >
		<label for="email">Username</label>
		<input type="email" name="email" id="email" required value="<?php echo $email  ?>" ><br>
		<label for="password">Password</label>
		<input type="password" name="password" id="password"><br>
		<button type="submit">Login</button>
		<p><a href="reset_password.php">forgot your password</a></p>		
		<p><a href="registration_form.php">Signup</a></p>
	</form>
</body>
</html>