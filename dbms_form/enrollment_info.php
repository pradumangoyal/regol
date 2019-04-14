<?php
    $secret_key = filter_input(INPUT_POST, 'secret_key');

    if(empty($secret_key)):
        echo "Necessary field is empty, please fill it";
        die();
    
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "aniket";
    // Create connection
    
    mysql_connect($host, $dbusername, $dbpassword);
    mysql_select_db($dbname);

    $sql = "SELECT enrollment_no from secret_keys WHERE secret_key='$secret_key'";
    $result = mysql_query($sql) or die(mysql_error());

    echo "Enrollment Number: ".$result;

?>