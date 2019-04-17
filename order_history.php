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
<title>Order History</title>
<script src='jquery.js'></script>
<script>

</script>
</head>
<body>
<?php
include('nav.php');
include('db_connect.php');

db_connect();

echo "<div class='row'>
		<div class='ten columns'>";

//query db for orders where customer_id = logged in user		
$sql = "
SELECT order_id, order_date
FROM Orders
WHERE customer_id =" . $_SESSION['customer_id'];

$result_orders = mysqli_query($db, $sql);


while($row = mysqli_fetch_array($result_orders)){
	//display order number and order date
	echo "<h5><b> Order #" . $row['order_id'] . "</b> - " . $row['order_date'] . "</h5>";

	//for each order query items in order	
	$sql2 = "
	SELECT name, product_type_description, product_description, quantity, price_per_unit 
	FROM Order_item Join Products ON Order_item.product_id = Products.product_id
	JOIN Product_Type ON Products.product_type_id = Product_Type.product_type_id
	WHERE order_id = " . $row['order_id'] . ";"
	;
	
	echo "
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Type</th>
				<th>Description</th>
				<th>quantity</th>
				<th>price/gallon</th>
			</tr>
		</thead>";
	
	$total = 0;
	
	$result_items = mysqli_query($db, $sql2);
	while($row2 = mysqli_fetch_array($result_items)){
		//display item table
		echo "<tr>
				<td>" . $row2['name'] . "</td>
				<td>" . $row2['product_type_description'] . "</td>
				<td>" . $row2['product_description']."</td>
				<td>" . $row2['quantity'] . "</td>
				<td> $" . $row2['price_per_unit'] . "</td>
			</tr>";
			
			$total += $row2['quantity'] * $row2['price_per_unit'];
	}
	
	echo "
			</table>
			<h5><b>Total - $" . $total .".00</b></h5><hr><br><br>";
	
	
}



echo "</div>
	</div>";

//free db results if any
if(isset($row)){
mysqli_free_result($result_orders);
mysqli_free_result($result_items);
}

mysqli_close($db); 
include('footer.php');
?>

</body>
</html>