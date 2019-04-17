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
?>

<div class="row">
		<div class="five columns">
			<h3>Ice Cream Cakes</h3>
			<p>	Have a special occasion to celebrate?<br><br>
				Need a great dessert?<br><br>
				We always have a great selection of ice cream cakes on hand anyone of our <a href="ice_cream.php">Ice Cream Flavors.</a>  If you want a custom cake, just call 3 - 5 days in advance, and someone will help you choose your flavor(s) and size.
		</div>
		
		<div class="seven columns" style="text-align: center;">
			<img src="images/icecreamcake.jpg" width="90%" style="border: 5px solid #acdbce;">
		</div>
</div>
<br>
<br>
<div class="row">
	<div class="five columns">
		<h3>Cake Sizes</h3>
		<table>
		<thead>
			<tr>
				<th>Size</th>
				<th>Shape</th>
				<th>Serves</th>
			</tr>
		</thead>
			<tr>
				<td>Small</td>
				<td>Round</td>
				<td>8 - 10</td>
			</tr>
			<tr>
				<td>Large</td>
				<td>Round</td>
				<td>20 - 24</td>
			</tr>
			<tr>
				<td>Ex. Large</td>
				<td>Round</td>
				<td>30 - 35</td>
			</tr>
			<tr>
				<td>Small</td>
				<td>Rectangle</td>
				<td>12 - 16</td>
			</tr>
			<tr>
				<td>1/2 Sheet</td>
				<td>Rectangle</td>
				<td> 25 - 30</td>
			</tr>
			<tr>
				<td>Full Sheet</td>
				<td>Rectangle</td>
				<td>40 - 50</td>
			</tr>
			
		</table>
	</div>
	<div class="seven columns" style="text-align: center;">
		<img src="images/custom_flavor.jpg" width="90%" style="border: 5px solid #acdbce;">
	</div>
</div>
<br>
<br>

<?php
include('footer.php');
?>


</body>
</html>