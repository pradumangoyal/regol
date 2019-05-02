<?php
	
	// Okay, so this is where the user is gonna submit the secret_key

	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Verification Page</title>
	<!-- <link rel="stylesheet" type="text/css" href="verify.css"> -->
	
</head>
<body>

<h1> Secret key Verification </h1>
<div id="enter_key">
	<form action="submit_key.php" method="POST">
		Secret Key: <input type="text" name="secret_key">
		Enrollment Number: <input type="text" name="enrollment_no">
		<input type="submit" name="Submit">
	</form>
</div>
</body>
</html>