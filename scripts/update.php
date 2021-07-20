<?php
include('renderform.php');

include('config.php');

// submit check
if (isset($_POST['submit'])) {
	// counter valcounter check
	if (is_numeric($_POST['counter'])) {
		$counter = $_POST['counter'];
		$firstName = mysqli_real_escape_string($connection, htmlspecialchars($_POST['firstName']));
		$lastname = mysqli_real_escape_string($connection, htmlspecialchars($_POST['lastname']));
		$email = mysqli_real_escape_string($connection, htmlspecialchars($_POST['email']));
		$phoneNumber = mysqli_real_escape_string($connection, htmlspecialchars($_POST['phoneNumber']));

		// check that firstName/lastname fields are both filled in
		if ($firstName == '' || $lastname == '') {
			$error = 'ERROR: Please fill in all required fields!';

			renderForm($counter, $firstName, $lastname, $email, $phoneNumber, $error);

		} else {
			// save the data to database
			$result = mysqli_query($connection, "UPDATE contacts SET firstName='$firstName', lastname='$lastname', email='$email', phoneNumber='$phoneNumber'  WHERE counter='$counter'");

			if ($result) {
				echo "Success! - the query seemed to work! (At least it didn't error-out.)";
				echo "<br><br>MySQL affected rows: " . mysqli_affected_rows($connection);
			} else {
				die("Database query failed.");
			}

			header("Location: ../visitors.php");
		}
	} else {
		// counter valcounter error
		echo 'Error!';
	}
} else {
	// not submitted, display renderformm
	// counter value check
	if (isset($_GET['counter']) && is_numeric($_GET['counter']) && $_GET['counter'] > 0) {
		// query db
		$counter = $_GET['counter'];
		$result = mysqli_query($connection, "SELECT * FROM contacts WHERE counter=$counter");
		$data = mysqli_fetch_array( $result );

		// counter value matches row in database
		if($data) {
			// get data from db
			$firstName = $data['firstName'];
			$lastname = $data['lastname'];
			$email = $data['email'];
			$phoneNumber = $data['phoneNumber'];

			renderForm($counter, $firstName, $lastname, $email, $phoneNumber, '');
		} else {
			// no match, display result
			echo "No results!";
		}
	} else {
		// if the 'counter' in the URL isn't valcounter, or if there is no 'counter' value, display an error
		echo 'Error!';
	}
}
?>