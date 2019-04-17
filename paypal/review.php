<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset='utf-8'/>
<link rel="stylesheet" href="../style.css" type="text/css"/>
<link rel="stylesheet" href="../skeleton.css" type="text/css"/>
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,400italic' rel='stylesheet' type='text/css'>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
<title>Review Order</title>
<script src='jquery.js'></script>
</head>
<body>
<?php 
	/*
	* Call to GetExpressCheckoutDetails
	*/

	require_once ("paypal_functions.php"); 

	/*
    * in paypalfunctions.php in a session variable 
	*/
	$_SESSION['payer_id'] =	$_GET['PayerID'];

	// Check to see if the Request object contains a variable named 'token'	
	$token = "";

	if (isset($_REQUEST['token']))
	{
		$token = $_REQUEST['token'];
		$_SESSION['TOKEN'] = $token;
	}

	// If the Request object contains the variable 'token' then it means that the user is coming from PayPal site.	
	if ( $token != "" )
	{
		/*
		* Calls the GetExpressCheckoutDetails API call
		*/
		$resArrayGetExpressCheckout = GetShippingDetails( $token );
		$ackGetExpressCheckout = strtoupper($resArrayGetExpressCheckout["ACK"]);	 
		if( $ackGetExpressCheckout == "SUCCESS" || $ackGetExpressCheckout == "SUCESSWITHWARNING") 
		{
			/*
			* The information that is returned by the GetExpressCheckoutDetails call should be integrated by the partner into his Order Review 
			* page		
			*/
			$email 				= $resArrayGetExpressCheckout["EMAIL"]; // ' Email address of payer.
			$payerId 			= $resArrayGetExpressCheckout["PAYERID"]; // ' Unique PayPal customer account identification number.
			$payerStatus		= $resArrayGetExpressCheckout["PAYERSTATUS"]; // ' Status of payer. Character length and limitations: 10 single-byte alphabetic characters.
			$firstName			= $resArrayGetExpressCheckout["FIRSTNAME"]; // ' Payer's first name.
			$lastName			= $resArrayGetExpressCheckout["LASTNAME"]; // ' Payer's last name.
			$shipToName			= $resArrayGetExpressCheckout["PAYMENTREQUEST_0_SHIPTONAME"]; // ' Person's name associated with this address.
			$shipToStreet		= $resArrayGetExpressCheckout["PAYMENTREQUEST_0_SHIPTOSTREET"]; // ' First street address.
			$shipToCity			= $resArrayGetExpressCheckout["PAYMENTREQUEST_0_SHIPTOCITY"]; // ' Name of city.
			$shipToState		= $resArrayGetExpressCheckout["PAYMENTREQUEST_0_SHIPTOSTATE"]; // ' State or province
			$shipToZip			= $resArrayGetExpressCheckout["PAYMENTREQUEST_0_SHIPTOZIP"]; // ' U.S. Zip code or other country-specific postal code.
			$addressStatus 		= $resArrayGetExpressCheckout["ADDRESSSTATUS"]; // ' Status of street address on file with PayPal 
			$totalAmt   		= $resArrayGetExpressCheckout["PAYMENTREQUEST_0_AMT"]; // ' Total Amount to be paid by buyer
			$currencyCode       = $resArrayGetExpressCheckout["CURRENCYCODE"]; // 'Currency being used 
			/*
			* Add check here to verify if the payment amount stored in session is the same as the one returned from GetExpressCheckoutDetails API call
			* Checks whether the session has been compromised
			*/
			if($_SESSION["Payment_Amount"] != $totalAmt || $_SESSION["currencyCodeType"] != $currencyCode)
			exit("Parameters in session do not match those in PayPal API calls");
		} 
		else  
		{
			//Display a user friendly Error on the page using any of the following error information returned by PayPal
			$ErrorCode = urldecode($resArrayGetExpressCheckout["L_ERRORCODE0"]);
			$ErrorShortMsg = urldecode($resArrayGetExpressCheckout["L_SHORTMESSAGE0"]);
			$ErrorLongMsg = urldecode($resArrayGetExpressCheckout["L_LONGMESSAGE0"]);
			$ErrorSeverityCode = urldecode($resArrayGetExpressCheckout["L_SEVERITYCODE0"]);

			echo "GetExpressCheckoutDetails API call failed. ";
			echo "Detailed Error Message: " . $ErrorLongMsg;
			echo "Short Error Message: " . $ErrorShortMsg;
			echo "Error Code: " . $ErrorCode;
			echo "Error Severity Code: " . $ErrorSeverityCode;
		}
	}
	if(!USERACTION_FLAG){
	include("nav.php");
?>	
	<div class="row">
		<div class="twelve columns">
		<table>
			<tbody>
				<tr><td><h3>Billing Address</h3></td></tr>
				<tr><td><b>Name: </b><?php echo $shipToName;		?></td></tr>
				<tr><td><b>Address: </b><?php echo $shipToStreet;	?></td></tr>
				<tr><td><b>City: </b><?php echo $shipToCity;		?></td></tr>
				<tr><td><b>St: </b><?php echo $shipToState;		?></td></tr>
				<tr><td><b>Zip: </b><?php echo $shipToZip;		?></td></tr>
				<tr><td><b>Total Amount: </b> $<?php echo $totalAmt   		?></td></tr>
			</tbody>
		</table>
		
		<div class='row'>
			<div class='twelve columns'>
			<h3>Items</h3>
			<table>
			<thead>
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Quantity</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
<?php	
	foreach($_SESSION['cart'] as $i){
		echo '<tr>
				<td>' . $i['name'] . '</td>
				<td>' . $i['description'] . '</td>
				<td>' . $i['quantity'] . '</td>
				<td> $' . intval($i['price'] * $i['quantity']) . '</td>
			</tr>';	
	}
	
	echo '</tbody>
		</table>';		
?>		
		
		<form action="return.php" name="order_confirm" method="POST">
			<tr><td><input type="Submit" name="confirm" alt="Check out with PayPal" class="btn btn-primary btn-large" value="Confirm Order"></td></tr>
		</form>

	</div>
	</div>
	<?php
	}
	?>
<?php include('footer.php'); 
?>

</body>
</html>