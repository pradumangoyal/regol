<?php
	
	// Okay, so this is where the user is gonna submit the secret_key

	session_start();

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
                <a href='/regol/'>
                    Regol
                </a>
                </div>
            </h2>  
        </div>
        <div class='gutter-space'></div>
    </div>
	<div class="ui container middle">
	<div class="ui segment basic">
<h1> Secret key Verification </h1>
<div id="enter_key">
	<form action="/regol/register/submit_key.php" method="POST">
	<div class="ui labeled input">
                <div class="ui label">
				Enrollment Number: 
				        </div>
						<input type="text" name="enrollment_no">
            </div>
<br />
<br />
	<div class="ui labeled input">
                <div class="ui label">
                    Secret Key:
                </div>
				<input type="text" name="secret_key">
            </div>
			<br/>
			<br/>
		<input type="submit" class="ui button" name="Submit">
	</form>
</div>
</div>
</div>
<div class="ui attached segment header-container">
    Regol &copy; 2019
    </div>
</body>
</html>