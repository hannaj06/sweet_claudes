<?php

function dB_connect(){
	global $db;
	$host = "<host>";
	$user = "<user>";
	$pass = "<pass>";
	$dbname = "<db_name>";
	
	$db = new mysqli($host, $user, $pass, $dbname);
	
	if(mysqli_connect_errno()){
		printf("connect faild: %s\n ", mysqli_connect_error());
		exit();
	}

}


?>