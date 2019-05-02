<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["adminloggedin"]) || $_SESSION["adminloggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="icon" href="/regol/favicon.png" type="image/png">
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
    <div class="ui container middle">
        <div class="ui segment basic">
            <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to Regol.</h1>
        </div>
        <div class="ui segment basic">
            <div class="ui relaxed divided list">
                <div class="item">
                    <i class="large check square outline middle aligned icon"></i>
                    <div class="content">
                    <a class="header" href="ensearch.php">Verify details</a>
                    </div>
                </div>
                <div class="item">
                    <i class="large cloud download middle aligned icon"></i>
                    <div class="content">
                    <a class="header" href="download.php">Download registration cards</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="ui attached segment header-container">
    Regol &copy; 2019
    </div>
</body>
</html>
