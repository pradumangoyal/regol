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
$sql = "SELECT * FROM DATA2 where ENNO='". $_POST["Enno"]. "';";
$result = $conn->query($sql);
$row = $result->fetch_assoc()
?>

<!DOCTYPE html>
<html>
<head>
	<title>Verification Page</title>
	<link rel="stylesheet" type="text/css" href="verify.css">
	
</head>
<body>
<form method="POST" action="login.php">
	<button>LogOut</button>
</form>
<div id="verify">
	<form method="POST" action="submitted.php">
		<div>
			Name: <?php echo $row["NAME"];  ?> <br>
			Phone Number: <br>
			Address: <br>
			Father's Name: <br>
			Mother's Name: <br>
			<input type="checkbox" name="PD"> Verified
		</div>
		<div>
			12th Percentage: <br>
			10th Percentage: <br>
			JEE Rank: <br>
			<input type="checkbox" name="ED"> Verified
		</div>
		<input type="Submit" name="Submit">
	</form>

</div>
</body>
</html>