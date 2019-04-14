<?php

$dept_name = filter_input(INPUT_POST, 'dept_name');
$dept_address = filter_input(INPUT_POST, 'dept_address');
$dept_phone = filter_input(INPUT_POST, 'dept_phone');

if(empty($dept_name) or empty($dept_address) or empty($dept_phone)){
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
    $sql = "UPDATE department
    SET dept_address = '$dept_address', dept_phone_number = '$dept_phone'
    WHERE dept_name = '$dept_name'";
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