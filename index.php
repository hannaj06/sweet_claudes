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
					<h3>Welcome to Sweet Claude's!</h3>
					<p>For 23 years Sweet Claude's of Cheshire has been serving the area's best homemade ice cream. We are family owned and operated. All of our ice cream, frozen yogurt, ices, tofutti and sorbet along with the hot fudge (an old family recipe) are made on the premises. We take pride in our product and our exceptional customer service. Come in soon and enjoy!</p>
				</div>
				
				<div class="seven columns" style="text-align: center;">
					<img src="images/SC2015Web-005.jpg" width="90%" style="border: 5px solid #acdbce;">
				</div>
				
		</div>
		<br>
		<br>
		<div class="row">
			<div class="five columns">
				<h3>Regular Hours</h3>
				<table>
					<tr>
						<td>Sunday - Thursday</td>
						<td>12 AM - 9 PM</td>
					</tr>
					<tr>
						<td>Friday - Saturday</td>
						<td>12 AM - 9PM</td>
					</tr> 
				</table>
				

			</div>
			<div class="seven columns" style="text-align: center;">
				<img src="images/SC2015Web-019.jpg" width="90%" class="main">
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="five columns">
			<h3>Directions</h3>
				<p>We are located at 828 South Main Street (Route 10) in Cheshire, CT. Look for us at the juncture of Route 10 and Route 42, right next to the McDonald's. Directions</p>
			</div>
			<div class="seven columns" style="text-align: center;">
				<a href="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;q=sweet+claude\'s+cheshire+ct&amp;fb=1&amp;gl=us&amp;hq=sweet+claude's&amp;hnear=Cheshire&amp;view=map&amp;cid=1505595388970871394&amp;ved=0CE4QpQY&amp;ei=d6wXTIrTEJfmoATWuZH7BA&amp;ll=41.483409,-72.905703&amp;spn=0.00725,0.013711&amp;z=16&amp;iwloc=A" target="_blank">
				<img src="images/map.png" width="90%" class="main">
				</a>
			</div>
		</div>
		<br>
		<br>		
		
<?php
	include('footer.php');
?>
		

</body>
</html>