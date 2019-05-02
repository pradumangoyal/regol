<?php
	
	// Okay, so this is the main form

	session_start();

	// echo $_SESSION["course_id"];

	$host = "localhost";
	$dbusername = "regol";
	$dbpassword = "regol";
	$dbname = "regol";

	$dept_name = "";

	$link = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}
	// mysql_select_db($dbname);

	// $sql1 = "SELECT course_id from student WHERE enrollment_no='$_SESSION[enrollment_no]'";
	// $course_id = mysqli_query($link, $sql1);
	// while ($row = $course_id->fetch_assoc()) {
 //    	$_SESSION["course_id"] = $row['course_id'];
	// }

	$sql2 = "SELECT batch_id from batch where course_id='$_SESSION[course_id]'";
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

	// $sql5 = "SELECT  bank_name from student where enrollment_no='$_SESSION[enrollment_no]'";
	// $bank = mysqli_query($link, $sql5);
	// while ($row = $bank->fetch_assoc()) {
 //    	$bank_name = $row['bank_name'];
	// }

	// $sql6 = "SELECT  account_number from student where enrollment_no='$_SESSION[enrollment_no]'";
	// $account = mysqli_query($link, $sql6);
	// while ($row = $account->fetch_assoc()) {
 //    	$account_number = $row['account_number'];
	}

	$sql7 = "SELECT  physical_disability from student where enrollment_no='$_SESSION[enrollment_no]'";
	$physical_disab = mysqli_query($link, $sql7);
	while ($row = $physical_disab->fetch_assoc()) {
    	$physical_disability = $row['physical_disability'];
	}

	$sql8 = "SELECT  dept_name from course where course_id='$_SESSION[course_id]'";
	$dept = mysqli_query($link, $sql8);
	while ($row = $dept->fetch_assoc()) {
    	$dept_name = $row['dept_name'];
	}

	$sql9 = "SELECT  degree_name from course where course_id='$_SESSION[course_id]'";
	$degree = mysqli_query($link, $sql9);
	while ($row = $degree->fetch_assoc()) {
    	$degree_name = $row['degree_name'];
	}

	$sql10 = "SELECT  course_name from course where course_id='$_SESSION[course_id]'";
	$course = mysqli_query($link, $sql10);
	while ($row = $course->fetch_assoc()) {
    	$course_name = $row['course_name'];
	}

	$sql11 = "SELECT  years from course where course_id='$_SESSION[course_id]'";
	$year = mysqli_query($link, $sql11);
	while ($row = $year->fetch_assoc()) {
    	$years = $row['years'];
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Verification Page</title>
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
	<h1> Fill out the various information regarding the student </h1>
	<div id="search">
		<form action="submit_form.php" method="POST">

		<h2> Personal Information </h2>
		<br>
		<div class="ui labeled input">
                <div class="ui label">
				Person ID: 
				</div>
				<input type="text" name="person_id" value= <?php echo $_SESSION["person_id"] ?> readonly>
		</div>
		<br/>
		<br/>

		<div class="ui labeled input">
                <div class="ui label">
				Name: 
		</div>
		<input type="text" name="name">
		</div>
		<br/>
		<br/>

		<div class="ui labeled input">
                <div class="ui label">
				Date Of Birth:  
		</div>
		<input type="text" name="dob">
		</div>
		<br/>
		<br/>

		<div class="ui labeled input">
                <div class="ui label">
				Gender:  
		</div>
		<input type="text" name="gender">
		</div>
		<br/>
		<br/>

		<div class="ui labeled input">
		<div class="ui label">
		Phone Number: 
		</div>
		<input type="text" name="phone">
		</div>
		<br/><br/>
		<div class="ui labeled input">
		<div class="ui label">
		Email address: 
		</div>
		<input type="text" name="email">
		</div>
		<br/><br/>
		<div class="ui labeled input">
		<div class="ui label">
		Permanent Address: 
		</div>
		<input type="text" name="address">
		</div>
		<br/><br/>
		<div class="ui labeled input">
		<div class="ui label">
		Category: 
		</div>
		<input type="text" name="category">
		</div>
		<br/><br/>
		
		<div class="ui labeled input">
		<div class="ui label">
		Blood Group: 
		</div>
		<input type="text" name="blood">
		</div>
		<br/><br/>

		<h2> Father's Information </h2>
		<br>
		<div class="ui labeled input">
		<div class="ui label">
		Parent ID: 
		</div>
		<input type="text" name="father_id" value= <?php echo $_SESSION["father_id"] ?> readonly>
		</div>
		<br/><br/>

		<div class="ui labeled input">
		<div class="ui label">
		Name: 
		</div>
		<input type="text" name="father_name">
		</div>
		<br/><br/>

		<div class="ui labeled input">
		<div class="ui label">
		Date Of Birth: 
		</div>
		<input type="text" name="father_dob">
		</div>
		<br/><br/>

		<div class="ui labeled input">
		<div class="ui label">
		Gender: 
		</div>
		<input type="text" name="father_gender" value="Male" readonly>
		</div>
		<br/><br/>

		<div class="ui labeled input">
		<div class="ui label">
		Phone Number: 
		</div>
		<input type="text" name="father_phone">
		</div>
		<br/><br/>

		<div class="ui labeled input">
		<div class="ui label">
		Email address: 
		</div>
		<input type="text" name="father_email">
		</div>
		<br/><br/>

		<div class="ui labeled input">
		<div class="ui label">
		Blood Group: 
		</div>
		<input type="text" name="father_blood">
		</div>
		<br/><br/>


		
		<h2> Mother's Information </h2>
		<br>
		<div class="ui labeled input">
		<div class="ui label">
		Parent ID: 
		</div>
		<input type="text" name="mother_id" value= <?php echo $_SESSION["mother_id"] ?> readonly>
		</div>
		<br/><br/>

		<div class="ui labeled input">
		<div class="ui label">
		Name: 
		</div>
		<input type="text" name="mother_name">
		</div>
		<br/><br/>

		<div class="ui labeled input">
		<div class="ui label">
		Date Of Birth: 
		</div>
		<input type="text" name="mother_dob">
		</div>
		<br/><br/>

		<div class="ui labeled input">
		<div class="ui label">
		Gender: 
		</div>
		<input type="text" name="mother_gender" value="Female" readonly>
		</div>
		<br/><br/>

		<div class="ui labeled input">
		<div class="ui label">
		Phone Number: 
		</div>
		<input type="text" name="mother_phone">
		</div>
		<br/><br/>

		<div class="ui labeled input">
		<div class="ui label">
		Email address: 
		</div>
		<input type="text" name="mother_email">
		</div>
		<br/><br/>

		<div class="ui labeled input">
		<div class="ui label">
		Blood Group: 
		</div>
		<input type="text" name="mother_blood">
		</div>
		<br/><br/>


		
		<h2> Course Information </h2>
		<br>
		<div class="ui labeled input">
		<div class="ui label">
		Course ID: 
		</div>
		<input type="text" name="course_id" value= <?php echo $_SESSION["course_id"] ?> readonly>
		</div>
		<br/><br/>

		<div class="ui labeled input">
		<div class="ui label">
		Batch ID: 
		</div>
		<input type="text" name="batch_id" value= <?php echo $batch_id ?> readonly>
		</div>
		<br/><br/>

		<div class="ui labeled input">
		<div class="ui label">
		Department Name: 
		</div>
		<input type="text" name="dept_name" value= <?php echo $dept_name ?> readonly>
		</div>
		<br/><br/>

		<div class="ui labeled input">
		<div class="ui label">
		Degree Name: 
		</div>
		<input type="text" name="degree_name" value= <?php echo $degree_name ?> readonly>
		</div>
		<br/><br/>

		<div class="ui labeled input">
		<div class="ui label">
		Course Name: 
		</div>
		<input type="text" name="course_name" value= <?php echo $course_name ?> readonly>
		</div>
		<br/><br/>

		<div class="ui labeled input">
		<div class="ui label">
		Years: 
		</div>
		<input type="text" name="years" value= <?php echo $years ?> readonly>
		</div>
		<br/><br/>


		
		<h3> Miscellaneous Information </h2>
		<br>
		<div class="ui labeled input">
		<div class="ui label">
		Batch ID: 
		</div>
		<input type="text" name="batch_id" value= <?php echo $batch_id ?> readonly>
		</div>
		<br/><br/>

		<div class="ui labeled input">
		<div class="ui label">
		Bhawan Name: 
		</div>
		<input type="text" name="bhawan_name" value= <?php echo $bhawan_name ?> readonly>
		</div>
		<br/><br/>

		<div class="ui labeled input">
		<div class="ui label">
		Room Number: 
		</div>
		<input type="text" name="room_number" value= <?php echo $room_number ?> readonly>
		</div>
		<br/><br/>

		<div class="ui labeled input">
		<div class="ui label">
		Bank Name: 
		</div>
		<input type="text" name="bank_name">
		</div>
		<br/><br/>

		<div class="ui labeled input">
		<div class="ui label">
		Account Number: 
		</div>
		<input type="text" name="account_number">
		</div>
		<br/><br/>

		<div class="ui labeled input">
		<div class="ui label">
		Physical Disability: 
		</div>
		<input type="text" name="physical_disability" value= <?php echo $physical_disability ?> readonly>
		</div>
		<br/><br/>

		<input type="submit" name="Submit" class="ui button positive">

	</form>
	
	</div>
	</div>
</div>
<div class="ui attached segment header-container">
    Regol &copy; 2019
    </div>
</body>
</html>