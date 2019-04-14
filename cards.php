<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["adminloggedin"]) || $_SESSION["adminloggedin"] !== true){
    header("location: login.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["enrollment"]){
    $enrollment = trim($_POST["enrollment"]);

    $sql = "SELECT person_id, enrollment_no FROM student WHERE enrollment_no = ?";

    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, 's', $param_enrollment);
    $param_enrollment = $enrollment;
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id, $enrollment_no_extracted);
    if($mysqli_stmt_fetch($stmt)){
    } else {
    header("location: download.php");
    }
    mysqli_stmt_close($stmt);
}
else {
    header("location: download.php");
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
 
</body>
</html>