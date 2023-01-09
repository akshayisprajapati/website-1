<?php
error_reporting(E_ERROR | E_PARSE);

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'testing';

 
$conn = mysqli_connect($servername,$username,$password,$database);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
} else {
	echo 'connected';
}
$sql = "SELECT id, firstname, lastname FROM MyGuests WHERE id = 2";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
  	echo "<pre>";
    print_r($row);
  }
} else {
  echo "0 results";
}


mysqli_close($conn);
?>