<?php
//common navigation used by all pages

//user is logged in, hello user
if ( isset( $_SESSION['first_name'] )) {
	 $name = '<b>' . $_SESSION['first_name'] . '! </b> <a href="logout.php">Log Out</a>';
}
//guest
else {
	
	$name = "<b>Guest</b> <a href='login.php'>Sign On</a>";
}

//number of items in cart
if(isset($_SESSION['cart'])){	
	$items =(array_sum(array_column($_SESSION['cart'], 'quantity')));
}
else{
	$items = 0;
}
$header = '

<div class="wrapper">
		<div class="row" style="text-align: right;">Welcome ' . $name .'</div>
		<div class="row" style="text-align: right;"><a href="cart.php"><div id="cart" style="width: 30px; float: right;">' . $items .'</div></a></div>
		<div class="row">
			<div id="logo">
				Sweet<br>
				<span style="color: #d05252;"> Claude\'s</span><br>
				Ice Cream
			</div>
			<center>
			<a href="contact.php"><div class="circle nav">Contact Us</div></a>
			<a href="cakes.php"><div class=" circle nav">Cakes</div></a>
			<a href="ice_cream.php"><div class=" circle nav">Ice Cream</div></a>
			<a href="index.php"><div class=" circle nav">Home</div></a>
			<a href="shop.php"><div class=" circle nav"> Shop</div></a>
			</center>
		</div>
			


		<hr>
';

echo $header;

?>