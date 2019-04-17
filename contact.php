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

if(empty($_POST)){
	
	// if user is logged in populate form fields with name, and email
	if(isset($_SESSION['first_name'])){
		$first_name = $_SESSION['first_name'];
		$last_name = $_SESSION['last_name'];
		$email = $_SESSION['email'];
	}
	// if guest null
	else{
		$first_name = "";
		$last_name = "";
		$email = "";
	}

//post form to data to self, mail if all required fields are present	
echo '
<h3>Customer Feedback</h3>
<form action="'.$_SERVER["PHP_SELF"].'" method="post">
  <div class="row">
    <div class="six columns">
	
	<label>First Name</label>
	<input class="u-full-width" type="text" name="first_name" value="'. $first_name .'" required>
	
	<label>Last Name</label>
	<input class="u-full-width" type="text" name="last_name" value="'.$last_name.'" required>
	
      <label for="exampleEmailInput">Your email</label>
      <input class="u-full-width" type="email" name="email" value="'.$email.'" required>
    
  <label for="exampleMessage">Message</label>
  <textarea class="u-full-width"  name="message" required></textarea>
  <label class="example-send-yourself-copy">
   
  </label>
  <input class="button-primary" type="submit" value="Submit">
	</div>
	
	<div class="six columns">
		<img src="images/SC2015Web-033.jpg" class="main" width="90%">
	</div>
	
	</div>
</form>';	
}
//form posted success message
else{
	$message = "First Name:  " . $_POST['first_name'] . "\nLast Name:   " . $_POST['last_name'] . "\n \nMessage: \n\n" . $_POST['message'];
	echo '<h3>Thanks for your feedback!</h3> <p>We\'ll get back to you shortly.</p>';
	mail('joseph.hanna10@gmail.com','Sweet Claude\'s Message', $message);
	
}

include("footer.php");
?>
</body>
</html>