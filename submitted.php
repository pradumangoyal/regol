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
	$sql="UPDATE verified SET personal_info_verified='1' WHERE enrollment_no=".$_POST["enrollment"].";";
	$conn->query($sql);
} else {
	$sql="UPDATE verified SET personal_info_verified='0' WHERE enrollment_no=".$_POST["enrollment"].";";
	$conn->query($sql);
}
if($sdetails == "on")
{
	$sql="UPDATE verified SET student_info_verified='1' WHERE enrollment_no=".$_POST["enrollment"].";";
	$conn->query($sql);
} else {
	$sql="UPDATE verified SET student_info_verified='0' WHERE enrollment_no=".$_POST["enrollment"].";";
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
    <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/semantic.min.css">
	
</head>
<body>
<div class="ui container">
<div class="ui segment basic">
<h1>
	Your Response Has Been Recorded!
</h1>
<div id="verify">
	<table class="ui celled table">
	<tbody>
	<tr>
	<td>Personal info verified</td>
	<td><?php if($pdetails == "on") {
		echo "Verified";
	} else {
		echo "Unverified";
	} ?></td>
	</tr>
	<tr>
	<td>Student info verified</td>
	<td><?php if($sdetails == "on") {
		echo "Verified";
	} else {
		echo "Unverified";
	} ?></td>
	</tr>
	</tbody>
	</table>
	<button onclick="location.href = '/regol/ensearch.php'">
	Verify more
	</button>
</div>
</div>
</div>
</body>
</html>