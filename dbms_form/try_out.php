<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
padding: 6px 12px;
border: 1px solid #ccc;
border-top: none;
}
</style>
</head>
<body>

<h2 align="center">Form</h2>

<div class="tab">
<button class="tablinks" onclick="openEvent(event, 'Enrollment')">Enrollment Information</button>
<button class="tablinks" onclick="openEvent(event, 'Student')">Student Information</button>
<button class="tablinks" onclick="openEvent(event, 'Personal')">Personal Information</button>
<button class="tablinks" onclick="openEvent(event, 'Department')">Departmental information</button>
<button class="tablinks" onclick="openEvent(event, 'Courses')">Courses information</button>
</div>


<!-- Enrollment Information tab -->
<div id="Enrollment" class="tabcontent">
    <h3 align="center">Enrollment Information</h3>
    
    <form name="htmlform" method="post" action="enrollment_info.php">
    <table width="450px" align="center">
    <tr>
        <td valign="top">
        <label for="secret_key">Secret Key *</label>
        </td>
        <td valign="top">
        <input  type="text" name="secret_key" maxlength="50" size="30">
        </td>
    </tr>

    <tr>
        <td colspan="2" style="text-align:center">
        <input type="submit" value="Submit">
        </td>
    </tr>
    </table>
    </form>

</div>

<!-- Student information tab -->
<div id="Student" class="tabcontent">
    <h3 align="center">Student Information</h3>

    <form name="htmlform" method="post" action="student_info.php">
    <table width="450px" align="center">

    <tr>
        <td valign="top">
        <label for="person_id">Person ID *</label>
        </td>
        <td valign="top">
        <input  type="text" name="person_id" maxlength="50" size="30">
        </td>
    </tr>

    <tr>
        <td valign="top">
        <label for="enrollment_no">Enrollment Number *</label>
        </td>
        <td valign="top">
        <input  type="text" name="enrollment_no" maxlength="50" size="30">
        </td>
    </tr>

    <tr>
        <td colspan="2" style="text-align:center">
        <input type="submit" value="Submit">
        </td>
    </tr>
    </table>
    </form>

</div>


<!-- Personal Information tab -->
<div id="Personal" class="tabcontent">
    <h3 align="center">Personal Information</h3>
  
    <form name="htmlform" method="post" action="personal_info.php">
    <table width="450px" align="center">
    <tr>
        <td valign="top">
        <label for="person_id">ID *</label>
        </td>
        <td valign="top">
        <input  type="text" name="person_id" maxlength="50" size="30">
        </td>
    </tr>
    <tr>
        <td valign="top">
        <label for="person_name">Name *</label>
        </td>
        <td valign="top">
        <input  type="text" name="person_name" maxlength="50" size="30">
        </td>
    </tr>
        
    <tr>
        <td valign="top">
        <label for="father_name">Father's name *</label>
        </td>
        <td valign="top">
        <input  type="text" name="father_name" maxlength="50" size="30">
        </td>
    </tr>

    <tr>
        <td valign="top">
        <label for="dob">Date Of Birth *</label>
        </td>
        <td valign="top">
        <input  type="text" name="dob" maxlength="50" size="30">
        </td>
    </tr>
    <tr>
        <td valign="top">
        <label for="address">Residential Address *</label>
        </td>
        <td valign="top">
        <input  type="text" name="address" maxlength="80" size="30">
        </td>
        
    </tr>
    <tr>
        <td valign="top">
        <label for="telephone">Telephone Number *</label>
        </td>
        <td valign="top">
        <input  type="text" name="telephone" maxlength="30" size="30">
        </td>
    </tr>
    <tr>
        <td valign="top">
        <label for="category">Category *</label>
        </td>
        <td valign="top">
        <input  type="text" name="category" maxlength="30" size="30">
        </td>
        
    </tr>
    <tr>
        <td valign="top">
        <label for="blood">Blood Group *</label>
        </td>
        <td valign="top">
        <input  type="text" name="blood" maxlength="30" size="30">
        </td>
        
    </tr>
    <tr>
        <td colspan="2" style="text-align:center">
        <input type="submit" value="Submit">
        </td>
    </tr>
    </table>
    </form>

</div>


<!-- Department Information tab -->
<div id="Department" class="tabcontent">
<h3 align="center">Department Information</h3>

<form name="htmlform" method="post" action="department_info.php">
    <table width="450px" align="center">
    </tr>
    <tr>
        <td valign="top">
        <label for="dept_name">Department Name *</label>
        </td>
        <td valign="top">
        <input  type="text" name="dept_name" maxlength="50" size="30">
        </td>
    </tr>
        
    <tr>
        <td valign="top">
        <label for="dept_address">Department Address *</label>
        </td>
        <td valign="top">
        <input  type="text" name="dept_address" maxlength="50" size="30">
        </td>
    </tr>
    <tr>
        <td valign="top">
        <label for="dept_phone">Department Phone Number *</label>
        </td>
        <td valign="top">
        <input  type="text" name="dept_phone" maxlength="80" size="30">
        </td>
        
    </tr>
    <tr>
        <td colspan="2" style="text-align:center">
        <input type="submit" value="Submit">
        </td>
    </tr>
    </table>
    </form>

</div>


<!-- Course Information tab -->
<div id="Courses" class="tabcontent">
  <h3 align="center">Course Information</h3>
  
    <form name="htmlform" method="post" action="course_info.php">
    <table width="450px" align="center">
    </tr>
    <tr>
        <td valign="top">
        <label for="Course ID">Course ID *</label>
        </td>
        <td valign="top">
        <input  type="text" name="course_id" maxlength="50" size="30">
        </td>
    </tr>
        
    <tr>
        <td valign="top">
        <label for="dept_name">Department Name *</label>
        </td>
        <td valign="top">
        <input  type="text" name="dept_name" maxlength="50" size="30">
        </td>
    </tr>
    <tr>
        <td valign="top">
        <label for="degree_name">Degree Name *</label>
        </td>
        <td valign="top">
        <input  type="text" name="degree_name" maxlength="80" size="30">
        </td>
        
    </tr>
    <tr>
        <td valign="top">
        <label for="course_name">Course Name *</label>
        </td>
        <td valign="top">
        <input  type="text" name="course_name" maxlength="30" size="30">
        </td>
    </tr>
    <tr>
        <td valign="top">
        <label for="years">Years *</label>
        </td>
        <td valign="top">
        <input  type="text" name="years" maxlength="30" size="30">
        </td>
        
    </tr>
    <tr>
        <td valign="top">
        <label for="batch_id">Batch ID *</label>
        </td>
        <td valign="top">
        <input  type="text" name="batch_id" maxlength="30" size="30">
        </td>
        
    </tr>
    <tr>
        <td colspan="2" style="text-align:center">
        <input type="submit" value="Submit">
        </td>
    </tr>
    </table>
    </form>

</div>


<script>
function openEvent(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

function display(evt, value) {

}

</script>
   
</body>
</html> 