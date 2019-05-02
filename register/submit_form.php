<?php
	
	// Okay so this program is just to submit whatever is stored in the case of form.php into the database

	session_start();

	// $name = filter_input(INPUT_POST, 'name');
	$dob = filter_input(INPUT_POST, 'dob');
	$gender = filter_input(INPUT_POST, 'gender');
	$phone = filter_input(INPUT_POST, 'phone');
	$email = filter_input(INPUT_POST, 'email');
	$address = filter_input(INPUT_POST, 'address');
	$category = filter_input(INPUT_POST, 'category');
	$blood = filter_input(INPUT_POST, 'blood');

	// $father_name = filter_input(INPUT_POST, 'father_name');
	$father_dob = filter_input(INPUT_POST, 'father_dob');
	$father_phone = filter_input(INPUT_POST, 'father_phone');
	$father_email = filter_input(INPUT_POST, 'father_email');
	$father_blood = filter_input(INPUT_POST, 'father_blood');

	// $mother_name = filter_input(INPUT_POST, 'mother_name');
	$mother_dob = filter_input(INPUT_POST, 'mother_dob');
	$mother_phone = filter_input(INPUT_POST, 'mother_phone');
	$mother_email = filter_input(INPUT_POST, 'mother_email');
	$mother_blood = filter_input(INPUT_POST, 'mother_blood');

	// $dept_name = filter_input(INPUT_POST, 'dept_name');
	// $degree_name = filter_input(INPUT_POST, 'degree_name');
	// $course_name = filter_input(INPUT_POST, 'course_name');
	// $years = filter_input(INPUT_POST, 'years');

	$bank_name = filter_input(INPUT_POST, 'bank_name');
	$account_number = filter_input(INPUT_POST, 'account_number');

	$servername = "localhost";
	$username = "regol";
	$password = "regol";
	$dbname = "regol";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} $sql = "USE regol";
	if ($conn->query($sql) === TRUE) {
		echo "";
	} else {
		echo "Error creating database: " . $conn->error;
	}
	
	$sql = "SELECT * FROM student where enrollment_no=". $_SESSION["enrollment_no"]. ";";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){ 
		while($row = $result->fetch_assoc()) {
			$sinfo = $row;
		}
	}

	$person_id = $sinfo['person_id'];

	$sql = "SELECT * FROM parent_child where child_person_id=". $person_id . ";";
	$result = $conn->query($sql);
	$row=mysqli_fetch_all($result);
	$fid=$row[0][0];
	$mid=$row[1][0];

	$sql1 = "UPDATE personal_info
	SET date_of_birth = '$dob', gender = '$gender', phone_number = '$phone', email_address = '$email', permanent_address = '$address', category = '$category', blood_group = '$blood'
		WHERE person_id = '$person_id';";

	$sql2 = "UPDATE personal_info
	SET date_of_birth = '$father_dob', gender = 'male', phone_number = '$father_phone', email_address = '$father_email', blood_group = '$father_blood'
		WHERE person_id = '$fid';";

	$sql3 = "UPDATE personal_info
	SET date_of_birth = '$mother_dob', gender = 'female', phone_number = '$mother_phone', email_address = '$mother_email', blood_group = '$mother_blood'
		WHERE person_id = '$mid';";	

	$sql4 = "UPDATE student
	SET bank_name='$bank_name', account_number='$account_number'
		WHERE person_id = '$_SESSION[enrollment_no]';";	
	
	$result = $conn->query($sql1);
	$result = $conn->query($sql2);
	$result = $conn->query($sql3);
	$result = $conn->query($sql4);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Regol</title>
    <link rel="icon" href="/regol/favicon.png" type="image/png">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/semantic.min.css">
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .middle {
            flex-grow: 1;
        }
        .header-container {
            display: flex;
            width: 100%;
			min-height: fit-content;
        }
        .gutter-space {
            flex-grow: 1;
        }
    </style>
</head>
<body>
<div class="ui attached segment header-container">
        <div>
            <h2 class="ui header">
                <i class="edit icon"></i>
                <div class="content">
                <a href='/regol/'>
                    Regol
                </a>
                </div>
            </h2>  
        </div>
        <div class='gutter-space'></div>
        <div>
            <button class='ui button basic' onclick="location.href='/regol/register/logout_key.php'">
                <i class='icon sign-out'></i>
                Sign out
            </button>
        </div>
    </div>
	<div class="ui container middle">
	<div class = "ui segment basic">
	<h1 align='center'> Your information has been recorded. Have a nice day! </h1>
	</div>
</div>
<div class="ui attached segment header-container">
    Regol &copy; 2019
    </div>
</body>
</html>