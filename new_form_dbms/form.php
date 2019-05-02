<?php
	
	// Okay, so this is the main form

	session_start();

	$host = "localhost";
	$dbusername = "regol";
	$dbpassword = "regol";
	$dbname = "regol";

	$link = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}
	// mysql_select_db($dbname);

	$sql1 = "SELECT course_id from student WHERE enrollment_no='$_SESSION[enrollment_no]'";
	$course_id = mysqli_query($link, $sql1);
	while ($row = $course_id->fetch_assoc()) {
    	$_SESSION["course_id"] = $row['course_id'];
	}

	$sql2 = "SELECT batch_id from student where enrollment_no='$_SESSION[enrollment_no]'";
	$batch = mysqli_query($link, $sql2);
	while ($row = $batch->fetch_assoc()) {
    	$batch_id = $row['batch_id'];
	}

	$sql3 = "SELECT bhawan_name from student WHERE enrollment_no='$_SESSION[enrollment_no]'";
	$bhawan = mysqli_query($link, $sql3);
	while ($row = $bhawan->fetch_assoc()) {
    	$bhawan_name = $row['bhawan_name'];
	}

	$sql4 = "SELECT room_number from student where enrollment_no='$_SESSION[enrollment_no]'";
	$room = mysqli_query($link, $sql4);
	while ($row = $room->fetch_assoc()) {
    	$room_number = $row['room_number'];
	}

	$sql5 = "SELECT  bank_name from student where enrollment_no='$_SESSION[enrollment_no]'";
	$bank = mysqli_query($link, $sql5);
	while ($row = $bank->fetch_assoc()) {
    	$bank_name = $row['bank_name'];
	}

	$sql6 = "SELECT  account_number from student where enrollment_no='$_SESSION[enrollment_no]'";
	$account = mysqli_query($link, $sql6);
	while ($row = $account->fetch_assoc()) {
    	$account_number = $row['account_number'];
	}

	$sql7 = "SELECT  physical_disability from student where enrollment_no='$_SESSION[enrollment_no]'";
	$physical_disab = mysqli_query($link, $sql7);
	while ($row = $physical_disab->fetch_assoc()) {
    	$physical_disability = $row['physical_disability'];
	}

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
		Gender: <input type="text" name="gender">
		Phone Number: <input type="text" name="phone">
		Email address: <input type="text" name="email">
		Permanent Address: <input type="text" name="address">
		Category: <input type="text" name="category">
		Blood Group: <input type="text" name="blood">

		<br> <br> <br>

		<h2> Course Information </h2>
		<br>
		Course ID: <input type="text" name="course_id" value= <?php echo $_SESSION["course_id"] ?> readonly>
		Batch ID: <input type="text" name="batch_id" value= <?php echo $batch_id ?> readonly>
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
		Bank Name: <input type="text" name="bank_name" value= <?php echo $bank_name ?> readonly>
		Account Number: <input type="text" name="account_number" value= <?php echo $account_number ?> readonly>
		Physical Disability: <input type="text" name="physical_disability" value= <?php echo $physical_disability ?> readonly>

		<br>

		<input type="submit" name="Submit">

	</form>

</div>
</body>
</html>