<?php
    $enrollment_no = filter_input(INPUT_POST, 'enrollment_no');
    $person_id = filter_input(INPUT_POST, 'person_id');

    if(empty($secret_key) or empty($person_id)):
        echo "Necessary field is empty, please fill it";
        die();
    
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "aniket";
    // Create connection
    
    mysql_connect($host, $dbusername, $dbpassword);
    mysql_select_db($dbname);

    $sql = "SELECT course_id, batch_id, bhawan_name, room_number from student WHERE secret_key='$secret_key' and enrollment_no='$enrollment_no'";
    $result = mysql_query($sql) or die(mysql_error());
    while ($row = mysql_fetch_array($result))
    {

        $course_id = $row['course_id'];
        $batch_id = $row['batch_id'];
        $bhawan_name = $row['bhawan_name'];
        $room_number = $row['room_number']
    }

    echo "Course ID: ".$course_id;
    echo "Batch ID: ".$batch_id;
    echo "Bhawan Name: ".$bhawan_name;
    echo "Room Number: ".$room_number;

?>