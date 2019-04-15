<?php

$person_id = filter_input(INPUT_POST, 'person_id');
$person_name = filter_input(INPUT_POST, 'person_name');
$dob = filter_input(INPUT_POST, 'dob');
$address = filter_input(INPUT_POST, 'address');
$telephone = filter_input(INPUT_POST, 'telephone');
$category = filter_input(INPUT_POST, 'category');
$blood = filter_input(INPUT_POST, 'blood');

if(empty($person_id) or empty($person_name) or empty($dob) or empty($address) or empty($telephone) or empty($category) or empty($blood)){
    echo "Necessary fields are empty, please fill them";
    die();
}

$host = "localhost";
$dbusername = "root";
$dbpassword = "Pissa@home";
$dbname = "aniket";
// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
    $sql = "UPDATE personal_info
    SET name = '$person_name', date_of_birth = '$dob', phone_number = '$telephone', permanent_address = '$address', category = '$category', blood_group = '$blood'
    WHERE person_id = '$person_id';";
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