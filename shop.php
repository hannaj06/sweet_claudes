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
//grab number of items in cart, increment by 1 if add to cart button is clicked
$(document).ready(function(){
	$('.button.button-primary.addtocart').click(function(){
		var product_id = ($(this).attr('id'));
		var quantity = parseInt($('#cart').text());
		$.ajax({
			url: 'cart.php',
			type: 'post',
			data: {'product_id': product_id} 
		}).done(function(data, textStatus, jqxhr){
			$('#cart').html(quantity+1);
		}).fail	(function(jqxhr, textStatus, errorThrown){
			$('error');
		});
	});
});

</script>
</head>
<body>
<?php
include('nav.php');

//if user is logged in display order history and cart buttons
if(isset($_SESSION['first_name'])){
	echo "<a class='button button-primary' href='order_history.php' style='width: 150px;'>Order History</a> <a class='button button-primary' href='cart.php' style='width: 150px;'>Your Cart</a> ";
}
//if guest display Login button, create account, and cart
else{
	echo "<a class='button button-primary' href='login.php' style='width: 150px;'>Log In</a> <a class='button button-primary' href='create_account.php' style='width: 150px;'>Create Account</a> <a class='button button-primary' href='cart.php' style='width: 150px;'>Your Cart</a> ";
}


include('db_connect.php');

db_connect();

//query db for ice cream products
$sql = "
SELECT product_id, name, price_per_unit, product_description, image_location, product_type_description FROM Products 
JOIN Product_Type on Products.product_type_id = Product_Type.product_type_id
WHERE product_type_description='ice cream';";

$result = mysqli_query($db, $sql);

echo "
	<div class='row'>
	<div class='five columns'>
	<table>
		<thead>
		<tr>
			<th>Flavor</th>
			<th>Price / Gallon</th>
			<th>Add to Cart</th>
		</tr>
		</thead>";

//display db query for all ice cream 
while ($row = mysqli_fetch_array($result)){
	echo "<tbody>
			<tr> 
				<td>" . $row['name'] . "</td>" .
				"<td> $ " . $row['price_per_unit'] . "</td>" . 
				"<td> <a class='button button-primary addtocart' id='". $row['product_id'] . "'>ADD TO CART</a></td>
			</tr>
		</tbody>";
}

echo "</table>
	</div>";



mysqli_free_result($result);
mysqli_close($db);

?>
 
<div class="row">
	<div class="seven columns"  style="text-align: center;">
		<img class="main "src="images/SC2015Web-035.jpg" width="70%">
	</div>
</div>
</div>
<?php
include('footer.php');
?>

</body>
</html>