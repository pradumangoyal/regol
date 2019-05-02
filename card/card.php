<?php 
session_start();

if(!isset($_SESSION["adminloggedin"]) || $_SESSION["adminloggedin"] !== true){
    header("location: login.php");
    exit;
}

$card_type = array(
    "hostel" => "Hostel Copy",
    "ccb" => "CCB Copy",
    "mess" => "Mess Copy",
    "accounts" => "Accounts Copy",
    "student" => "Students Copy",
    "dosw" => "DOSW Copy",
    "bank" => "Bank Copy",
);

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

$sql = "SELECT * FROM student where enrollment_no=". $_POST["enrollment"]. ";";
$result = $conn->query($sql);
if ($result->num_rows > 0){ 
    while($row = $result->fetch_assoc()) {
		$sinfo = $row;
	}
}

$person_id=$sinfo["person_id"];
$course_id=$sinfo["course_id"];

$sql = "SELECT * FROM personal_info where person_id=". $person_id.";";
$result1 = $conn->query($sql);
if ($result1->num_rows > 0) { 
	while($row1 = $result1->fetch_assoc()) {
		$pinfo = $row1;
	}
}

$sql = "SELECT * FROM course where course_id=". $course_id.";";
$result1 = $conn->query($sql);
if ($result1->num_rows > 0) { 
	while($row1 = $result1->fetch_assoc()) {
		$cinfo = $row1;
	}
}

$sql = "SELECT * FROM parent_child where child_person_id=". $person_id . ";";
$result = $conn->query($sql);
$row=mysqli_fetch_all($result);
$father_id=$row[0][0];
$mother_id=$row[1][0];

$sql = "SELECT * FROM personal_info where person_id=". $father_id.";";
$result1 = $conn->query($sql);
if ($result1->num_rows > 0) { 
	while($row1 = $result1->fetch_assoc()) {
		$finfo = $row1;
	}
}

$sql = "SELECT * FROM personal_info where person_id=". $mother_id.";";
$result1 = $conn->query($sql);
if ($result1->num_rows > 0) { 
	while($row1 = $result1->fetch_assoc()) {
		$minfo = $row1;
	}
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $card_type[$_POST["category"]] ?></title>
    <link rel="icon" href="/regol/favicon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/card.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/card.css" media="print" />
</head>

<body>
    <div class='a4-page <?php echo $_POST["category"] ?>'>
        <div class='title'>
            <div class='title_heading_container'>
                <span class="title_heading">Registration Card</span>
            </div>
            <div class="insti_branding">
                <img src='../iitr_logo.png' class='insti_logo' />
                <div class='insti_branding_text'>
                    <div class='insti_name'>Indian Institute of Technology Roorkee</div>
                    <div class="sem_info">AUTUMN/SPRING SEMESTER REGISTRATION FOR 20....... - 20......</div>
                    <div class="which_card"><?php echo $card_type[$_POST["category"]] ?></div>
                </div>
            </div>
            <div>Enrollment No. <span class='fill-box-container'>
                    <span class='fill-box'><?php echo str_split($_POST["enrollment"] , 1)[2] ?></span>
                    <span class='fill-box'><?php echo str_split($_POST["enrollment"] , 1)[3] ?></span>
                    <span class='fill-box'><?php echo str_split($_POST["enrollment"] , 1)[4] ?></span>
                    <span class='fill-box'><?php echo str_split($_POST["enrollment"] , 1)[5] ?></span>
                    <span class='fill-box'><?php echo str_split($_POST["enrollment"] , 1)[6] ?></span>
                    <span class='fill-box'><?php echo str_split($_POST["enrollment"] , 1)[7] ?></span>
                </span>
            </div>
        </div>
        <div class='form_block'>
            <div class='fields_block'>
                <ol>
                    <li class='field_container'>
                        <div class='field-11'>
                            <span class='field_heading'>Full Name (in Capital Letters): </span>
                            <span class='field_detail'><?php echo $pinfo["name"] ?></span>
                        </div>
                    </li>
                    <li class='field_container'>
                        <div class='field-full'>
                            <div class='field-11'>
                                <span class='field_heading'>Class: </span>
                                <span class='field_detail'><?php echo $cinfo["course_name"] ?></span>
                            </div>
                            <div class="field-11 field-small">
                                <span class='field_heading'>Deptt.: </span>
                                <span class='field_detail'><?php echo $cinfo["dept_name"] ?></span>
                            </div>
                        </div>
                        <div class='field-full'>
                            <div class='field-11'>
                                <span class='field_heading'>(Specialization in case of M. Tech./M.Sc): </span>
                                <span class='field_detail'><?php echo $cinfo["degree_name"] ?></span>
                            </div>
                            <div class="field-11 field-small">
                                <span class='field_heading'>Branch: </span>
                                <span class='field_detail'><?php echo $cinfo["course_name"] ?></span>
                            </div>
                        </div>
                    </li>
                    <li class='field_container'>
                        <div class='field-full'>
                            <div class='field-11'>
                                <span class='field_heading'>Bhawan: </span>
                                <span class='field_detail'><?php echo $sinfo["bhawan_name"] ?></span>
                            </div>
                            <div class="field-11 field-small">
                                <span class='field_heading'>Room No.: </span>
                                <span class='field_detail'><?php echo $sinfo["room_number"] ?></span>
                            </div>
                        </div>
                    </li>
                    <li class='field_container'>
                        <div class='field-full'>
                            <div class='field-11'>
                                <span class='field_heading'>Category(GEN/SC/ST/OBC): </span>
                                <span class='field_detail'><?php echo $pinfo["category"] ?></span>
                            </div>
                            <div class="field-11 field-small">
                                <span class='field_heading'>DoB(DD/MM/YY): </span>
                                <span class='field_detail'><?php echo $pinfo["date_of_birth"] ?></span>
                            </div>
                        </div>
                    </li>
                    <li class='field_container'>
                        <div class='field-11'>
                            <span class='field_heading'>Physically Disabled: </span>
                            <span class='field_detail field_detail_checkbox'>
                                <input type='checkbox'>Yes</input>
                                <input type='checkbox' checked>No</input>
                            </span>
                        </div>
                        <div class='field-11'>
                            <span class='field_heading'>Type of Disability: </span>
                            <span class='field_detail'></span>
                        </div>
                    </li>
                    <li class='field_container'>
                        <div class='field-11'>
                            <span class='field_heading'>Name of Bank: </span>
                            <span class='field_detail'>PNB</span>
                        </div>
                    </li>
                    <li class='field_container'>
                        <div class='field-11'>
                            <span class='field_heading'>Bank Account No.: </span>
                            <span class='field_detail field_detail_checkbox fill-box-container'>
                                <span class='fill-box'>0</span>
                                <span class='fill-box'>4</span>
                                <span class='fill-box'>3</span>
                                <span class='fill-box'>0</span>
                                <span class='fill-box'>0</span>
                                <span class='fill-box'>0</span>
                                <span class='fill-box'>5</span>
                                <span class='fill-box'>0</span>
                                <span class='fill-box'>0</span>
                                <span class='fill-box'>0</span>
                                <span class='fill-box'>2</span>
                                <span class='fill-box'>6</span>
                                <span class='fill-box'>7</span>
                                <span class='fill-box'>6</span>
                                <span class='fill-box'>0</span>
                                <span class='fill-box'>8</span>
                            </span>
                        </div>
                    </li>
                    <li class='field_container'>
                        <div class='field-11'>
                            <span class='field_heading'>Student's
                                Mobile No.: </span>
                            <span class='field_detail'><?php echo $pinfo["phone_number"] ?></span>
                        </div>
                    </li>
                    <li class='field_container'>
                        <div class='field-11'>
                            <span class='field_heading'>Student's E-Mail: </span>
                            <span class='field_detail'>
                            	email-personal@cc.in
                            </span>
                        </div>
                    </li>
                    <li class='field_container'>
                        <div class='field-full'>
                            <div class='field-11'>
                                <span class='field_heading'>Nationality: </span>
                                <span class='field_detail field_detail_checkbox'>
                                    <input type='checkbox' checked>Indian</input>
                                    <input type='checkbox'>Foreign</input>
                                    <span class='field_heading'>Country: </span>
                                    <span class='field_detail'></span>
                                </span> </div>
                            <div class="field-11 field-small">
                                <span class='field_heading'>Blood Group: </span>
                                <span class='field_detail'><?php echo $pinfo["blood_group"] ?></span>
                            </div>
                        </div>
                    </li>
                    <li class='field_container'>
                        <div class='field-full'>
                            <div class='field-11'>
                                <span class='field_heading'>Marital Status: </span>
                                <span class='field_detail field_detail_checkbox'>
                                    <input type='checkbox'>Married</input>
                                    <input type='checkbox' checked>UnMarried</input>
                                </span> </div>
                            <div class="field-11 field-small">
                                <span class='field_detail field_detail_checkbox'>
                                    <input type='checkbox'>Male</input>
                                    <input type='checkbox'>Female</input>
                                </span>
                            </div>
                        </div>
                    </li>
                    <li class='field_container'>
                        <div class='field-full'>
                            <div class='field-11'>
                                <span class='field_heading'>Father's Name: </span>
                                <span class='field_detail'><?php echo $finfo["name"] ?></span>
                            </div>
                            <div class="field-11 field-small">
                                <span class='field_heading'>Designation: </span>
                                <span class='field_detail'></span>
                            </div>
                        </div>
                        <div class='field-full'>
                            <div class='field-11'>
                                <span class='field_heading'>Office Address: </span>
                                <span class='field_detail'><?php echo $finfo["permanent_address"] ?></span>
                            </div>
                            <div class="field-11 field-small">
                                <span class='field_heading'>Ocupation: </span>
                                <span class='field_detail'></span>
                            </div>
                        </div>
                        <div class='field-full'>
                            <span class='field_heading'>Phone Nos: </span>
                            <span class='field_detail'><?php echo $finfo["phone_number"] ?></span>
                        </div>
                    </li>
                    <li class='field_container'>
                        <div class='field-full'>
                            <div class='field-11'>
                                <span class='field_heading'>Mother's Name: </span>
                                <span class='field_detail'><?php echo $minfo["name"] ?></span>
                            </div>
                            <div class="field-11 field-small">
                                <span class='field_heading'>E-Mail: </span>
                                <span class='field_detail'>mother@ccmail.in</span>
                            </div>
                        </div>
                        <div class='field-full'>
                            <span class='field_heading'>Phone Nos: </span>
                            <span class='field_detail'><?php echo $minfo["phone_number"] ?></span>
                        </div>
                    </li>
                    <li class='field_container'>
                        <div class='field-11'>
                            <span class='field_heading'>Permanent Home Address: </span>
                        </div>
                        <div class='field-11'>
                            <span class='field_detail'><?php echo $minfo["permanent_address"] ?></span>
                        </div>
                    </li>
                    <li class='field_container'>
                        <div class='field-11'>
                            <span class='field_heading'>Guardian(if any): </span>
                            <span class='field_detail'></span>
                        </div>
                        <div class='field-full'>
                            <div class='field-11'>
                                <span class='field_heading'>Address: </span>
                                <span class='field_detail'></span>
                            </div>
                            <div class="field-11 field-small">
                                <span class='field_heading'>Phone No: </span>
                                <span class='field_detail'></span>
                            </div>
                        </div>
                    </li>
                </ol>

            </div>
            <div class="photo_block">
                <img src='../default.png' class="display_pic" />
            </div>
        </div>
        <div class='declaration_block'>
            <span>Declaration: </span>
            <span>
                <div>I undertake to abide all the rules, regulations and standing orders for students in vogue from</div>
                <div>time to time. I shall immediately provide the changes (if any) in address/mobile no. of myseld and
                    my parents.</div>
            </span>
        </div>
        <div class="sign_block">

            <div class='sign-container'>
                Signature of the Student
            </div>
            <div class='sign-container'>
                For CCB
            </div>

            <div class='sign-container'>
                Joint Registrar (Acd.)
            </div>
        </div>
    </div>
</body>

</html>