<?php
	require_once("scripts/config.php");

	// 2. Perform database query
	$query  = "SELECT * FROM contacts";
	$result = mysqli_query($connection, $query);
?>
<?php include "inc/header.php"; ?>

	<div class = "image-box"></div>

	<div class = "visitors">
	<h2>Visitors</h2>

	<p>All users that visited the site and filled out the contact form</p>

	<table>
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
				<td><a href="scripts/update.php?counter=<?php echo $data['counter']; ?>">Edit</a></td>
    			<td><a onclick="return confirm('Are you sure you want to delete counter: <?php echo $data["counter"]; ?>?')" href="scripts/delete.php?counter=<?php echo $data['counter']; ?>">Delete</a></td>
			</tr>
		<?php } ?>
		</table>

		<div class = "image-box"></div>
		</div>

<?php include "inc/footer.php"; ?>

<?php
	// 4. Release returned data
	mysqli_free_result($result);

	// 5. Close database connection
	mysqli_close($connection);
?>