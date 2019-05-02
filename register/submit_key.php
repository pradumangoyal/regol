<?php
	
	// Okay, so this is used to submit the secret key and get the person_id and enrollment_no in the session


	session_start();

	$secret_key = filter_input(INPUT_POST, 'secret_key');
	$_SESSION["enrollment_no"] = filter_input(INPUT_POST, 'enrollment_no');

	$host = "localhost";
	$dbusername = "regol";
	$dbpassword = "regol";
	$dbname = "regol";

	$link = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}
	// mysql_select_db($dbname);

	$sql2 = "SELECT person_id from person where secret_key='$secret_key' and enrollment_no='$_SESSION[enrollment_no]'";
	$person_id = mysqli_query($link, $sql2);
	while ($row = $person_id->fetch_assoc()) {
    	$_SESSION["person_id"] = $row['person_id'];
	}

	$sql3 = "SELECT parent_person_id from parent_child where child_person_id='$_SESSION[person_id]'";
	$parent_id = mysqli_query($link, $sql3);
	$row = $parent_id->fetch_assoc())
    $_SESSION["father_id"] = $row[0];
    $_SESSION["mother_id"] = $row[1];

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
            height: 100%;
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
            <button class='ui button basic' onclick="location.href='logout.php'">
                <i class='icon sign-out'></i>
                Sign out
            </button>
        </div>
    </div>
<div id="info" class="ui container middle">
<div class="ui segment basic">
	<h2>Please note both of them for further application filling</h2>
	<h4> Enrollment Number: <?php echo (string)$_SESSION["enrollment_no"]; ?></h4>
	<h4> Person ID: <?php echo (string)$_SESSION["person_id"]; ?></h4>

	<form method="POST" action="form.php">
		<button>Next</button>
	</form>
</div>
</div>
<div class="ui attached segment header-container">
    Regol &copy; 2019
    </div>
</body>
</html>