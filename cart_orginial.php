<?php
if ( session_status() == 1) {
     session_start();
  } 

include('db_connect.php');
db_connect();

if(isset($POST['product_id'])){
$item = 1;

echo json_encode(array('item'=> $item));


$sql = "SELECT name, price_per_unit, product_description
		FROM Products
		WHERE product_id =" . $item . ";";

	
		
$result = mysqli_query($db, $sql);

$row = mysqli_fetch_array($result);



$name = $row['name'];
$price = $row['price_per_unit'];
$description = $row['product_description'];
$quantity = 1;


array_push($_SESSION['cart'], array('id' => $item, 'name' => $name, 'description' => $description, 'quantity' => $quantity, 'price' => $price));


mysqli_free_result($result);
mysqli_close($db);
}

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
<title>Sweet Claude's Ice Cream - Cart'</title>
<script src='jquery.js'></script>
</head>

<body>
<?php 
include('nav.php');
?>


<?php

if(isset($_SESSION['cart'])){
	echo "<div class='row'>
			<div class='twelve columns'>
			<table>
			<thead>
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Quantity</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>";
			
	foreach($_SESSION['cart'] as $i){
		echo '<tr>
				<td>' . $i['name'] . '</td>
				<td>' . $i['description'] . '</td>
				<td>' . $i['quantity'] . '</td>
				<td>' . $i['price'] . '</td>
			</tr>';
				
	}
	
	echo '</tbody>
		</table>
		</div>
		</div>';
}
else{
	echo '<h3>Cart is empty.</h3>';
	echo session_status();
}

	include('footer.php');
?>
</body>
</html>


