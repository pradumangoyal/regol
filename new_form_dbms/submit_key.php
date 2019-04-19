<?php
	
	// Okay, so this is used to submit the secret key and get the person_id and enrollment_no in the session


	session_start();

	$secret_key = filter_input(INPUT_POST, 'secret_key');

	$host = "localhost";
	$dbusername = "regol";
	$dbpassword = "regol";
	$dbname = "regol";

	$link = mysql_connect($host, $dbusername, $dbpassword);
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}
	mysql_select_db($dbname);

	$sql1 = "SELECT enrollment_no from secret_keys WHERE secret_key='$secret_key'";
	$_SESSION["enrollment_no"] = mysql_query($sql1) or die(mysql_error());

	$sql2 = "SELECT person_id from person where enrollment_no='$enrollment_no'";
	$_SESSION["person_id"] = mysql_query($sql2) or die(mysql_error());

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
	<h4> Enrollment Number: <?php echo $_SESSION["enrollment_no"]; ?></h4>
	<h4> Person ID: <?php echo $_SESSION["person_id"]; ?></h4>

	<form method="POST" action="form.php">
		<button>Next</button>
	</form>
</div>
</body>
</html>