<?php

$course_id = filter_input(INPUT_POST, 'course_id');
$dept_name = filter_input(INPUT_POST, 'dept_name');
$degree_name = filter_input(INPUT_POST, 'degree_name');
$course_name = filter_input(INPUT_POST, 'course_name');
$years = filter_input(INPUT_POST, 'years');
$batch_id = filter_input(INPUT_POST, 'batch_id');

if(empty($course_id) or empty($dept_name) or empty($degree_name) or empty($course_name) or empty($years) or empty($batch_id)){
    echo "Necessary fields are empty, please fill them";
    die();
}

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "aniket";
// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
    $sql = "UPDATE course
    SET name = '$person_name', date_of_birth = '$dob', phone_number = '$telephone', permanent_address = '$address', category = '$category', blood_group = '$blood'
    WHERE person_id = '$person_id'";
    if ($conn->query($sql)){
    echo "New record is inserted sucessfully";
    }
    else{
        echo "Error: ". $sql ."
        ". $conn->error;
    }
    $conn->close();
}

?>