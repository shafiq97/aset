<?php
	$server = "localhost";
	$user = "root";
	$pass = "";
	
	$conn = new mysqli($server, $user, $pass, "spakkp");
	if($conn->connect_error)
	{
		die("Connection Error");
	}
?>