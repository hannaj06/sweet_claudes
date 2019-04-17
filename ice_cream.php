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
include('nav.php');
include('db_connect.php');

db_connect();

echo 
'<div class="row">
	<div class="twleve columns"  style="text-align: center;">
		<img class="main "src="images/SC2015Web-006_1.jpg" width="80%">
	</div>
</div>';

//populate ice cream flavors from database
$sql = "
SELECT name, product_description FROM Products 
JOIN Product_Type on Products.product_type_id = Product_Type.product_type_id
WHERE product_type_description='ice cream';";

$result = mysqli_query($db, $sql);

echo "
	<div class='row'>
	<div class='four columns'>
	<h3>Signature Flavors</h3>
	<hr>
	<ul>
";


while ($row = mysqli_fetch_array($result)){
	echo "<li>" .  $row['name']. "</li>";
}

echo "</ul></div>";



mysqli_free_result($result);


//populate frozen yogurt flavors from database
$sql = "
SELECT name, product_description FROM Products 
JOIN Product_Type on Products.product_type_id = Product_Type.product_type_id
WHERE product_type_description='Frozen Yogurt';";

$result = mysqli_query($db, $sql);

echo "

	<div class='four columns'>
	<h3>Frozen Yogurt</h3>
	<hr>
	<ul>
";


while ($row = mysqli_fetch_array($result)){
	echo "<li>" .  $row['name']. "</li>";
}

echo "
</ul></div>
<div class='four columns'>
	<h3>Tofutti</h3>
	<hr>
	<ul>
		<li>Coffee Chip Crunch</li>
		<li>Toasted Almond</li>
		<li>Chocolate</li>
		<li>Vanilla with Rasp. Swirl</li>
		<li>Pistachio</li>
		<li>Mango</li>
		<li>Red Raspberry</li>
	</ul>
</div></div>";



mysqli_free_result($result);

mysqli_close($db);
include('footer.php');
?>




</body>
</html>