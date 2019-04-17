<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset='utf-8'/>
<link rel="stylesheet" href="style.css" type="text/css"/>
<link rel="stylesheet" href="skeleton.css" type="text/css"/>
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,400italic' rel='stylesheet' type='text/css'>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
<title></title>
<script src='jquery.js'></script>
</head>

<body>

<?php
include("nav.php");
include("db_conntect.php");

//didn't have time to complete the create account functionality
//I would have used ajax to seralize the form send it to another php page
//check the db for an existing email address, and to ensure the password matches
//if the criteria matches I would use db_connect and a SQL insert statement 
if(empty($_POST)){
		echo 
		'<div class="row">
				<h3>Create an Account</h3>
				<form method="post" action="' . $_SERVER["PHP_SELF"] . '">
					<label>first name</label>
					<input type="text" name="first_name" required><br>
					<label>last name</label>
					<input type="text" name="first_name" required><br>
					<label>email address</label>
					<input type="email" name="user" required><br>
					<label>password</label>
					<input type="password" name="pass" required><br>
					<label>confirm password</label>
					<input type="password" name="pass" required><br>
					<button type="submit">Submit</button>
				</form>
		</div>';
}
else{
	db_connect();
	$sql = 'INSERT INTO CUSTOMER (first_name, last_name, email, password, )'
	echo '<h3>Successfully Created Account.</h3>';
	echo '<p>Return to <a href="cart.php">cart</a></p>';
	
}

include("footer.php");
?>
</body>
</html>