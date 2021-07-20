<?php
// creates the edit record form
function renderForm($counter, $firstName, $lastname, $email, $phoneNumber, $error) {
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Record</title>
</head>
<body>
<?php
// if there are any errors, display them
if ($error != '') {
	echo '<div style="padding:4px; border:1px solcounter red; color:red;">'.$error.'</div>';
}
?>
<form action="" method="post">
	<input type="hidden" name="counter" value="<?php echo $counter; ?>">
	<strong>counter:</strong> <?php echo $counter; ?><br>
	<strong>First Name: *</strong> <input type="text" name="firstName" value="<?php echo $firstName; ?>"/><br>
	<strong>Last Name: *</strong> <input type="text" name="lastname" value="<?php echo $lastname; ?>"/><br>
	<strong>Email: *</strong> <input type="text" name="email" value="<?php echo $email; ?>"/><br>
	<strong>Phone Number: *</strong> <input type="text" name="phoneNumber" value="<?php echo $phoneNumber; ?>"/><br>
	<div>* required</div>
	<input type="submit" name="submit" value="Submit">
</form>

<div>
	<br>
	<a href="read.php">Cancel</a>
</div>

</body>
</html>
<?php
}
?>