<?php
session_start();

  
include 'db_connect.php';

db_connect();

//sent from login
$user = $_POST['user'];
$pass = $_POST['pass'];

//check if form meets credentials 
$sql = "SELECT email, password, first_name, last_name, customer_id 
		FROM Customer
		WHERE email = '" . $user . "' and password = '" . $pass . "';";

$result = mysqli_query($db, $sql);

$row = mysqli_fetch_array($result);

//if returned set to session array
if (isset($row)){
	$_SESSION['first_name'] = $row['first_name'];
	$_SESSION['customer_id'] = $row['customer_id'];
	$_SESSION['last_name'] = $row['last_name'];
	$_SESSION['email'] = $row['email'];
	echo $row['first_name'];
}



mysqli_free_result($result);
mysqli_close($db);

?>