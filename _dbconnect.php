<?php
	$server = "localhost";
	$username = "root";
	$Password = "";
	$database = "jobs"; 

	$conn = mysqli_connect($server, $username, $Password, $database);

	if(!$conn){
    die("Error".mysqli_connect_error());
	}
?>