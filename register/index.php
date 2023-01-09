<?php
session_start();
require_once('dbconnection.php');
if(!empty($_SESSION['login'])){
	$sql = "SELECT * FROM users WHERE id = '".$_SESSION['id']."'";
	$result = mysqli_query($conn, $sql);
	$user = mysqli_fetch_assoc($result);
	echo 'welcome '.$user['name'];
	//echo 'email '.$user['email'];
?>
<a href="logout.php">Logout</a>
<?php }else{
	header("location: login.php");
} 
?>