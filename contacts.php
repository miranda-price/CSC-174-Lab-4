<?php include "inc/header.php"; ?>
	
	<div class = "contact">
	<h2>Contact Us</h2>

	<p>Fill out this form to receive emails and text messages about visiting Chicago</p>

	<div class="flex-box">

	<form method="post" action="scripts/insert.php">

		<label for="firstName">First Name:</label>
		<input type="text" name="firstName"> <br> <br>

		<label for="lastname">Last Name:</label>
		<input type="text" name="lastname" id="lastname"> <br> <br>

		<label for="email">Email:</label>
		<input type="text" name="email" id="email"> <br> <br>

		<label for="phoneNumber">Phone Number:</label>
		<input type="text" name="phoneNumber" id="phoneNumber"> <br> <br>

		<div class = "submit"><input type="submit" value="Submit Response"></div>

	</form> 

	<img src="images/navy_pier.jpg" alt="Navy Pier">
	</div>
	</div>

<?php include "inc/footer.php"; ?>