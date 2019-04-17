<?php
session_start();

if(!isset($_SESSION['cart'])){
	 $_SESSION['cart']=array();
}
	

include('db_connect.php');
db_connect();

if(isset($_POST['product_id'])){
$item = $_POST['product_id'];

echo $item;


$n = 0;
$match = FALSE;

foreach($_SESSION['cart'] as $i){
	if($i['id'] == $item){
		++$_SESSION['cart'][$n]['quantity'];
		$match = TRUE;
		break;
	}
	++$n;
}

if($match == FALSE){

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
<title>Sweet Claude's Ice Cream - Cart</title>
<script src='jquery.js'></script>
</head>

<body>
<?php 
include('nav.php');
?>


<?php
if(isset($_SESSION['first_name'])){
	echo "<a class='button button-primary' href='order_history.php'>Order History</a>";
}

if(empty($_SESSION['cart'])){
	echo '<h3>Cart is empty.</h3>';
}



else{
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
	
	$total = 0.00;
	//display items in cart
	foreach($_SESSION['cart'] as $i){
		echo '<tr>
				<td>' . $i['name'] . '</td>
				<td>' . $i['description'] . '</td>
				<td>' . $i['quantity'] . '</td>
				<td> $' . intval($i['price'] * $i['quantity']) . '</td>
			</tr>';
		//sum items in cart to send to paypal	
		$total = $total + $i['quantity'] * $i['price'];		
	}
	
	echo '</tbody>
		</table>
		<h4>Total - $' . $total . '.00</h4>';
	
	//must be logged in to check out with paypal
	if(isset($_SESSION['first_name'])){
	
	//paypal form sends total to sandbox.paypal
	echo '<form action="paypal/paypal_ec_redirect.php" method="POST">
			<input type="hidden" name="PAYMENTREQUEST_0_AMT" value="' . $total . '.00"></input>
			<input type="hidden" name="NOSHIPPING" value="1"></input>
			<input type="hidden" name="currencyCodeType" value="USD"></input>
			<input type="hidden" name="paymentType" value="Sale"></input>
			<!--Pass additional input parameters based on your shopping cart. For complete list of all the parameters click here -->
			<input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" alt="Check out with PayPal"></input>
			</form>';
	}
	else{
		echo "To check out you sign in or an account<br>";
		echo"<a class='button button-primary' href='login.php' style='width: 150px;'>Sign In</a> <a class='button button-primary' href='create_account.php' style='width: 150px;'>Create Account</a>";
	}
	echo '</div>
		</div>';
}



	include('footer.php');
?>
</body>
</html>



