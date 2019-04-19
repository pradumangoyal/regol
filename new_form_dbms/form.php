<?php
	
	// Okay, so this is the main form

	session_start();

	$host = "localhost";
	$dbusername = "regol";
	$dbpassword = "regol";
	$dbname = "regol";

	$link = mysql_connect($host, $dbusername, $dbpassword);
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}
	mysql_select_db($dbname);

	$sql1 = "SELECT course_id from student WHERE enrollment_no='$_SESSION["enrollment_no"]'";
	$_SESSION["course_id"] = mysql_query($sql1) or die(mysql_error());

	$sql2 = "SELECT batch_id from student where enrollment_no='$$_SESSION["enrollment_no"]'";
	$batch_id = mysql_query($sql2) or die(mysql_error());

	$sql3 = "SELECT bhawan_name from student WHERE enrollment_no='$_SESSION["enrollment_no"]'";
	$bhawan_name = mysql_query($sql1) or die(mysql_error());

	$sql4 = "SELECT room_number from student where enrollment_no='$$_SESSION["enrollment_no"]'";
	$room_number = mysql_query($sql2) or die(mysql_error());


?>

<!DOCTYPE html>
<html>
<head>
	<title>Verification Page</title>
	<!-- <link rel="stylesheet" type="text/css" href="verify.css"> -->
	
</head>
<body>

<h1 align='center'> Fill out the various information regarding the student </h1>
<div id="search">
	<form action="submit_form.php" method="POST">

		<h2> Personal Information </h2>
		<br>
		Person ID: <input type="text" name="person_id" value= <?php echo $_SESSION["person_id"] ?> readonly>
		Name: <input type="text" name="name">
		Date Of Birth: <input type="text" name="dob">
		Phone Number: <input type="text" name="phone">
		Permanent Address: <input type="text" name="address">
		Category: <input type="text" name="category">
		Blood Group: <input type="text" name="blood">

		<br> <br> <br>

		<h2> Course Information </h2>
		<br>
		Course ID: <input type="text" name="person_id" value= <?php echo $_SESSION["course_id"] ?> readonly>
		Department Name: <input type="text" name="dept_name">
		Degree Name: <input type="text" name="degree_name">
		Course Name: <input type="text" name="course_name">
		Years: <input type="text" name="years">

		<br> <br> <br>

		<h3> Miscellaneous Information </h2>
		<br>
		Batch ID: <input type="text" name="batch_id" value= <?php echo $batch_id ?> readonly>
		Bhawan Name: <input type="text" name="bhawan_name" value= <?php echo $bhawan_name ?> readonly>
		Room Number: <input type="text" name="room_number" value= <?php echo $room_number ?> readonly>

		<br>

		<input type="submit" name="Submit">

	</form>

</div>
</body>
</html>