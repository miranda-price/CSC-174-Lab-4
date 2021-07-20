<?php
	require_once("config.php");

	// 2. Perform database query
	$query  = "SELECT * FROM contacts";
	$result = mysqli_query($connection, $query);
?>
<!doctype html>
<html>
<head>
	<title>Database Read</title>
</head>
<body>

	<h1>Database Read</h1>

	<table border>
		<tr>
			<th>Counter</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Phone Number</th>
			<th colspan="2"><em>functions</em></th>
		</tr>
		<?php
			// 3. Use returned data (if any)
			$rowCount = 0;
			while($data = mysqli_fetch_assoc($result)) {
		?>
			<tr>
				<td><?php echo$data["counter"]?></td>
				<td><?php echo$data["firstName"]?></td>
				<td><?php echo$data["lastname"]?></td>
				<td><?php echo$data["email"]?></td>
				<td><?php echo$data["phoneNumber"]?></td>
				<td><a href="update.php?counter=<?php echo $data['counter']; ?>">Edit</a></td>
    			<td><a onclick="return confirm('Are you sure you want to delete counter: <?php echo $data["counter"]; ?>?')" href="delete.php?counter=<?php echo $data['counter']; ?>">Delete</a></td>
			</tr>
		<?php } ?>
		</table>
</body>
</html>

<?php
	// 4. Release returned data
	mysqli_free_result($result);

	// 5. Close database connection
	mysqli_close($connection);
?>