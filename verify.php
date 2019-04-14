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
} $sql = "USE REGOL";
if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error creating database: " . $conn->error;
}
$sql = "SELECT * FROM STUDENT where enrollment_no=". $_POST["Enno"]. ";";
$result = $conn->query($sql);
if ($result->num_rows > 0){ 
	while($row = $result->fetch_assoc()) {
		$sinfo = $row;
	}
}

$en=$sinfo["person_id"];

$sql = "SELECT * FROM PERSONAL_INFO where person_id=". $en.";";
$result1 = $conn->query($sql);
if ($result1->num_rows > 0) { 
	while($row1 = $result1->fetch_assoc()) {
		$pinfo = $row1;
	}
}


$target_dir = "uploads/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["upload"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "Image Uploaded";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
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
	<style type="text/css">
		td {
		border: 1px solid black;
	}
	</style>
</head>
<body>
<div id="verify">
	<form action="upload.php" method="post" enctype="multipart/form-data">
	    Select image to upload:
	    <input type="file" name="fileToUpload" id="fileToUpload">
	    <input type="submit" value="Upload Image" name="submit">
	</form>

	<form method="POST" action="submitted.php">
		<div>
			<table>
				<tr>
					<td>
						<table>
							<tr><td>Name: </td> <td><?php echo $pinfo["name"];  ?></td></tr>
							<tr><td>Date Of Birth: </td> <td> <?php echo $pinfo["date_of_birth"];  ?> </td> </tr>
							<tr><td>Phone Number:</td> <td> <?php echo $pinfo["phone_number"];  ?> </td> </tr>
							<tr><td>Permanent Address: </td> <td> <?php echo $pinfo["permanent_address"];  ?> </td> </tr>
							<tr><td>Category:</td> <td> <?php echo $pinfo["category"];  ?> </td> </tr>
							<tr><td>Blood Group:</td> <td> <?php echo $pinfo["blood_group"];  ?> </td> </tr>
						</table>
					</td>
					<td>
						<input type="checkbox" name="pdetails"> Verified
					</td>
				</tr>
				<tr>
					<td>
						<table>
							<tr><td>Person Id: </td> <td><?php echo $sinfo["person_id"];  ?></td></tr>
							<tr><td>Enrollment Number: </td> <td> <?php echo $sinfo["enrollment_no"];  ?> </td> </tr>
							<tr><td>Course Id:</td> <td> <?php echo $sinfo["course_id"];  ?> </td> </tr>
							<tr><td>Batch Id: </td> <td> <?php echo $sinfo["batch_id"];  ?> </td> </tr>
							<tr><td>Bhawan Name:</td> <td> <?php echo $sinfo["bhawan_name"];  ?> </td> </tr>
							<tr><td>Room Number:</td> <td> <?php echo $sinfo["room_number"];  ?> </td> </tr>
						</table>
					</td>
					<td>
						<input type="checkbox" name="sdetails"> Verified
					</td>
				</tr>
			</table>
		</div>
		<input type="Submit" name="Submit">
	</form>


</div>
</body>
</html>