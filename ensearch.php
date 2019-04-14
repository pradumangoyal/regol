<?php

$servername = "localhost";
$username = "root";
$password = "shubham";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "USE REGOL";
if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error creating database: " . $conn->error;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Verification Page</title>
	<link rel="stylesheet" type="text/css" href="verify.css">
	
</head>
<body>
<div id="search">
	<form action="verify.php" method="POST">
		<input type="text" name="Enno" placeholder="Enrollment Number">
		<input type="submit" name="Submit">
	</form>
	<form method="POST" action="login.php">
		<button>LogOut</button>
	</form>
</div>
</body>
</html>