<?php
	
	// Okay so this program is just to submit whatever is stored in the case of form.php into the database

	session_start();

	$name = filter_input(INPUT_POST, 'name');
	$dob = filter_input(INPUT_POST, 'dob');
	$gender = filter_input(INPUT_POST, 'gender');
	$phone = filter_input(INPUT_POST, 'phone');
	$email = filter_input(INPUT_POST, 'email');
	$address = filter_input(INPUT_POST, 'address');
	$category = filter_input(INPUT_POST, 'category');
	$blood = filter_input(INPUT_POST, 'blood');

	$father_name = filter_input(INPUT_POST, 'father_name');
	$father_dob = filter_input(INPUT_POST, 'father_dob');
	$father_phone = filter_input(INPUT_POST, 'father_phone');
	$father_email = filter_input(INPUT_POST, 'father_email');
	$father_blood = filter_input(INPUT_POST, 'father_blood');

	$mother_name = filter_input(INPUT_POST, 'mother_name');
	$mother_dob = filter_input(INPUT_POST, 'mother_dob');
	$mother_phone = filter_input(INPUT_POST, 'mother_phone');
	$mother_email = filter_input(INPUT_POST, 'mother_email');
	$mother_blood = filter_input(INPUT_POST, 'mother_blood');

	$dept_name = filter_input(INPUT_POST, 'dept_name');
	$degree_name = filter_input(INPUT_POST, 'degree_name');
	$course_name = filter_input(INPUT_POST, 'course_name');
	$years = filter_input(INPUT_POST, 'years');


	$host = "localhost";
	$dbusername = "regol";
	$dbpassword = "regol";
	$dbname = "regol";

	$link = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}
	else{
	    $sql1 = "UPDATE personal_info
	    SET name = '$name', date_of_birth = '$dob', gender = '$gender', phone_number = '$phone', email_address = '$email', permanent_address = '$address', category = '$category', blood_group = '$blood'
	    	WHERE person_id = '$_SESSION[person_id]';";

	    $sql2 = "UPDATE personal_info
	    SET name = '$name', date_of_birth = '$dob', gender = 'male', phone_number = '$phone', email_address = '$email', blood_group = '$blood'
	    	WHERE person_id = '$_SESSION[father_id]';";

	    $sql3 = "UPDATE personal_info
	    SET name = '$name', date_of_birth = '$dob', gender = 'female', phone_number = '$phone', email_address = '$email', blood_group = '$blood'
	    	WHERE person_id = '$_SESSION[mother_id]';";	


	    $sql4 = "UPDATE course
	    SET dept_name = '$dept_name', degree_name = '$degree_name', course_name = '$course_name', years = '$years'
	    	WHERE course_id = '$_SESSION[course_id]';";

	    mysqli_query($link, $sql1);
	    mysqli_query($link, $sql2);
	    mysqli_query($link, $sql3);
	    mysqli_query($link, $sql4);
	}


?>