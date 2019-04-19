<?php
	
	// Okay so this program is just to submit whatever is stored in the case of form.php into the database

	session_start();

	$name = filter_input(INPUT_POST, 'name');
	$dob = filter_input(INPUT_POST, 'dob');
	$phone = filter_input(INPUT_POST, 'phone');
	$address = filter_input(INPUT_POST, 'address');
	$category = filter_input(INPUT_POST, 'category');
	$blood = filter_input(INPUT_POST, 'blood');
	$dept_name = filter_input(INPUT_POST, 'dept_name');
	$degree_name = filter_input(INPUT_POST, 'degree_name');
	$course_name = filter_input(INPUT_POST, 'course_name');
	$years = filter_input(INPUT_POST, 'years');


	$host = "localhost";
	$dbusername = "regol";
	$dbpassword = "regol";
	$dbname = "regol";

	$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

	if (mysqli_connect_error()){
	    die('Connect Error ('. mysqli_connect_errno() .') '
	    . mysqli_connect_error());
	}
	else{
	    $sql1 = "UPDATE personal_info
	    SET name = '$name', date_of_birth = '$dob', phone_number = '$phone', permanent_address = '$address', category = '$category', blood_group = '$blood'
	    	WHERE person_id = '$_SESSION["person_id"]';";


	    $sql2 = "UPDATE course
	    SET dept_name = '$dept_name', degree_name = '$degree_name', course_name = '$course_name', years = '$years'
	    	WHERE course_id = '$_SESSION["course_id"]';";

	    $conn->query($sql1)
	    $conn->query($sql2)
	}


?>