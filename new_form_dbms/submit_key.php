<?php
	
	// Okay, so this is used to submit the secret key and get the person_id and enrollment_no in the session


	session_start();

	$secret_key = filter_input(INPUT_POST, 'secret_key');

	$host = "localhost";
	$dbusername = "regol";
	$dbpassword = "regol";
	$dbname = "regol";

	$link = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}
	// mysql_select_db($dbname);

	$sql1 = "SELECT enrollment_no from secret_keys WHERE secret_key='$secret_key'";
	$enrollment = mysqli_query($link, $sql1);
	while ($row = $enrollment->fetch_assoc()) {
    	$_SESSION["enrollment_no"] = $row['enrollment_no'];
	}

	$sql2 = "SELECT person_id from person where secret_key='$secret_key'";
	$person_id = mysqli_query($link, $sql2);
	while ($row = $person_id->fetch_assoc()) {
    	$_SESSION["person_id"] = $row['person_id'];
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Verification Page</title>
	<!-- <link rel="stylesheet" type="text/css" href="verify.css"> -->
	
</head>
<body>
<div id="info">
	<h2>Please note both of them for further application filling</h2>
	<h4> Enrollment Number: <?php echo (string)$_SESSION["enrollment_no"]; ?></h4>
	<h4> Person ID: <?php echo (string)$_SESSION["person_id"]; ?></h4>

	<form method="POST" action="form.php">
		<button>Next</button>
	</form>
</div>
</body>
</html>