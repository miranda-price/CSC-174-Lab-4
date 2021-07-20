<?php
	// 1. Create a database connection
	//    use external file *instead of* including db credentials here
	include("config.php");

	$counter = $_GET['counter'];
	$result = mysqli_query($connection, "DELETE FROM contacts WHERE counter=$counter");

	header("Location: ../visitors.php");
?>