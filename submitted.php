<?php
$servername = "localhost";
$username = "root";
$password = "shubham";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} $sql = "USE REGOL";
if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error creating database: " . $conn->error;
}
$x = $_POST["PD"];
echo $x;
?>


<!DOCTYPE html>
<html>
<head>
	<title>Verification Page</title>
	<link rel="stylesheet" type="text/css" href="verify.css">
	
</head>
<body>
<div id="verify">
	<form method="POST" action="ensearch.php">
		<input type="Submit" name="Search another Entry">
	</form>
	<form method="POST" action="login.php">
		<button>LogOut</button>
	</form>
</div>
</body>
</html>