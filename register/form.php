<?php
	
	// Okay, so this is the main form

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
		echo "Error creating database: " . $conn->error;
	}
	
	$sql = "SELECT * FROM student where enrollment_no=". $_SESSION["enrollment_no"]. ";";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){ 
		while($row = $result->fetch_assoc()) {
			$sinfo = $row;
		}
	}
	
	$batch_id = $sinfo['batch_id'];
	$bhawan_name = $sinfo['bhawan_name'];
	$room_number = $sinfo['room_number'];
	$course_id = $sinfo['course_id'];

	$sql = "SELECT * FROM course where course_id=".$course_id. ";";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){ 
		while($row = $result->fetch_assoc()) {
			$cinfo = $row;
		}
	}

	$dept_name = $cinfo['dept_name'];
	$degree_name = $cinfo['degree_name'];
	$course_name = $cinfo['course_name'];
	$years = $cinfo['years'];


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
		<input type="text" name="course_id" value= <?php echo $course_id ?> readonly>
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
		<?php 
		echo "<input type='text' name='batch_id' value=".$batch_id.">";
		?>
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