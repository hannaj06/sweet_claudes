<?php
	session_start();
//destory session

if(isset($_SESSION)){
	unset($_SESSION);
	session_unset();
	session_destroy();
}

header('Location: index.php');
?>