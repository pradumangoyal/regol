<?php

session_start();

$servername = "localhost";
$username = "regol";
$password = "regol";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} $sql = "USE regol";
if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error creating database: ".$conn->error;
}
$sdetails=" ";
$pdetails=" ";
if(isset($_POST["pdetails"]))
	$pdetails = $_POST["pdetails"];
if(isset($_POST["sdetails"]))
	$sdetails = $_POST["sdetails"];
if($pdetails == "on")
{
	$sql="UPDATE VERIFIED SET PERSONAL_INFO='1' WHERE ENROLLMENT_NO=".$_POST["enrollment"].";";
	$conn->query($sql);
}
if($sdetails == "on")
{
	$sql="UPDATE VERIFIED SET STUDENT_INFO='1' WHERE ENROLLMENT_NO=".$_POST["enrollment"].";";
	$conn->query($sql);
}
if(!isset($_SESSION["adminloggedin"]) || $_SESSION["adminloggedin"] !== true){
    header("location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Verification Page</title>
	<link rel="stylesheet" type="text/css" href="verify.css">
	
</head>
<body>
<h1>
	Your Response Has Been Recorded!
</h1>
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