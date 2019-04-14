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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
    Regol
  </a>
  <p>
  <b class="navbar-brand"><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
  <a href="reset-password.php" class="btn btn-sm btn-warning">Reset</a>
<a href="logout.php" class="btn btn-danger btn-sm">Sign Out</a>
</p>
</nav>

<div class="container">
        <form action="cards.php" method="post">
            <div class="form-group">
                <label>Enrollment No.</label>
                <input type="text" name="enrollment" class="form-control">
            </div>    
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Get copy">
            </div>
        </form>
    </div>    
</body>
</html>