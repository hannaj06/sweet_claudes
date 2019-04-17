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
<script>
//serialize form, send json to auth.php to validate user info
$(document).ready(function(){
	$('form').submit(function(event){
		event.preventDefault(); 
		$.ajax({
			url: 'auth.php',
			type: 'post',
			data: $('form').serialize()
		}).done(function(data, textStatus, jqxhr){
			if( data==""){
				$('form').after('INVALID EMAIL OR PASSWORD');
			}
			else{
				window.location = "cart.php";
			}
		}).fail(function(jqXhr, textStatus, errorThrown){
			$('error');
		});
			
		
	});
});


</script>
</head>

<body>

<?php
include("nav.php");
?>

		<div class="row">
				<h3>Login</h3>
				<form method="post">
					<input type="email" name="user" placeholder="email" required><br>
					<input type="password" name="pass" placeholder="pass" required><br>
					New user? <a href="create_account.php">Create an account.</a><br>
					<button type="submit">Submit</button>
				</form>
		</div>
		<div class="row" id="form-messages">
			
		</div>


		
<?php
	include('footer.php');
?>
		

</body>
</html>