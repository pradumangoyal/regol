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
    <title>Download Copy</title>    
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
        <form action="card/card.php" method="post">
          <div class="form-group">
            <label class="ui label">Category</label>
            <select name="category">
              <option value="hostel">Hostel</option>
              <option value="mess">Mess</option>
              <option value="ccb">CCB</option>
              <option value="accounts">Accounts</option>
              <option value="student">Student</option>
              <option value="dosw">DOSW</option>
              <option value="bank">Bank</option>

            </select>
          </div>
          <br/>
          <div class="ui labeled input">
                <div class="ui label">
                <label>Enrollment No.</label>
                </div>
                <input type="text" name="enrollment" class="form-control">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <br/>
            <br/>
            <input type="submit" class="ui button" value="Get copy">
        </form>
        </div>
    </div>  
    <div class="ui attached segment header-container">
    Regol &copy; 2019
    </div>  
</body>
</html>