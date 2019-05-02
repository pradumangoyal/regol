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
    echo "Error creating database: " . $conn->error;
}
$sql = "SELECT * FROM STUDENT where enrollment_no=". $_POST["Enno"]. ";";
$result = $conn->query($sql);
if ($result->num_rows > 0){ 
	while($row = $result->fetch_assoc()) {
		$sinfo = $row;
	}
} else {
	header("location: /regol/ensearch.php");
    exit;
}
$en=$_POST["Enno"];
$id=$sinfo["person_id"];

$sql = "SELECT * FROM PERSONAL_INFO where person_id=". $id.";";
$result1 = $conn->query($sql);
if ($result1->num_rows > 0) { 
	while($row1 = $result1->fetch_assoc()) {
		$pinfo = $row1;
	}
}	else {
	header("location: /regol/ensearch.php");
    exit;
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
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/semantic.min.css">
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }
        body {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }
        .middle {
            flex-grow: 1;
        }
        .header-container {
            display: flex;
            width: 100%;
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
                <a href='/regol/admin.php'>
                    Regol
                </a>
                </div>
            </h2>  
        </div>
        <div class='gutter-space'></div>
        <div>
            <button class='ui button basic' onclick="location.href='reset-password.php'">
                <i class='icon recycle'></i>
                Reset password
            </button>
            <button class='ui button basic' onclick="location.href='logout.php'">
                <i class='icon sign-out'></i>
                Sign out
            </button>
        </div>
    </div>
<div id="verify" class="ui container middle">
	<!-- <form action="upload.php" method="post" enctype="multipart/form-data">
	    Select image to upload:
	    <input type="file" name="fileToUpload" id="fileToUpload">
	    <input type="submit" value="Upload Image" name="submit">
	</form> -->
	<div class="ui segment basic">
	<form method="POST" action="submitted.php">
		<span class="ui label">Enrollment No: </span><input type='text' name="enrollment" value="<?php echo $_POST["Enno"] ?>" />
		<br/>
		<br/>
		<div>
			<table class="ui celled table">
				<tbody>
				<tr></tr>
				<tr>
					<td>
						<table class="ui celled table">
						<tbody>
							<tr><td>Name: </td> <td><?php echo $pinfo["name"];  ?></td></tr>
							<tr><td>Date Of Birth: </td> <td> <?php echo $pinfo["date_of_birth"];  ?> </td> </tr>
							<tr><td>Phone Number:</td> <td> <?php echo $pinfo["phone_number"];  ?> </td> </tr>
							<tr><td>Permanent Address: </td> <td> <?php echo $pinfo["permanent_address"];  ?> </td> </tr>
							<tr><td>Category:</td> <td> <?php echo $pinfo["category"];  ?> </td> </tr>
							<tr><td>Blood Group:</td> <td> <?php echo $pinfo["blood_group"];  ?> </td> </tr>
						</tbody>
						</table>
					</td>
					<td>
						<input type="checkbox" name="pdetails"> Verified
					</td>
				</tr>
				<tr>
					<td>
						<table class="ui celled table">
						<tbody>
							<tr><td>Person Id: </td> <td><?php echo $sinfo["person_id"];  ?></td></tr>
							<tr><td>Enrollment Number: </td> <td> <?php echo $sinfo["enrollment_no"];  ?> </td> </tr>
							<tr><td>Course Id:</td> <td> <?php echo $sinfo["course_id"];  ?> </td> </tr>
							<tr><td>Batch Id: </td> <td> <?php echo $sinfo["batch_id"];  ?> </td> </tr>
							<tr><td>Bhawan Name:</td> <td> <?php echo $sinfo["bhawan_name"];  ?> </td> </tr>
							<tr><td>Room Number:</td> <td> <?php echo $sinfo["room_number"];  ?> </td> </tr>
						</tbody>						
						</table>
					</td>
					<td>
						<input type="checkbox" name="sdetails"> Verified
					</td>
				</tr>				
				</tbody>
			</table>
		</div>
		<input type="Submit" name="Submit">
	</form>
	</div>
</div>
<div class="ui attached segment header-container">
    Regol &copy; 2019
    </div>
</body>
</html>