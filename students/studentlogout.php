<?php 
	session_start();
	if(!isset($_SESSION['email'])){
		header('Location:dashboard.php');
	}
	unset($_SESSION['email']);
	header("Location:studentlog.php");
	

	?>