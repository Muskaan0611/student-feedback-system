<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch batches from the database
function getBatches() {
    global $conn;
    $sql = "SELECT id, faculty, course, module, batch, batch_start, batch_end, duration, form_date FROM batches";
    $result = $conn->query($sql);
    $batches = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $batches[] = $row;
        }
    }
    return $batches;
}

// Function to fetch questions from the database
function getQuestions() {
    global $conn;
    $sql = "SELECT * FROM questions";
    $result = $conn->query($sql);
    $questions = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $questions[] = $row;
        }
    }
    return $questions;
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dash.css">

</head>
<body>
<div class="loader">

<div class="navbar">
    <a href="dashboard1.php">Home</a>
</div>
<div class="logo">
    <img src="NielitHeader.jpg" alt="NIELIT Logo">
</div>

<div class="content">
    <h2>NIELIT Delhi Centre</h2>
</div>
<div class="feedback">
<p>FEEDBACK FORM</p>
</div>


<div class="navbar">
  <!-- Feedback Dropdown -->
  <div class="dropdown">
    <button class="dropbtn">Feedback
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="feedback_form.php">For Students</a>
      <!-- <a href="form.php">For Participants</a> -->
      
    </div>



  </div>
 
  
  
  <!-- Report Dropdown -->
  <a href="login.php">Login</a>
</div>
<div class="image">
  <div class="image-content">
    <img src="fee.jpeg" alt="Your Image">
  </div>
</div>
 <div class="footerr">
        <p>राष्ट्रीय इलेक्ट्रॉनिकी एवं सूचना प्रौद्योगिकी संस्थान <br>
        National Institute of Electronics & Information Technology(NIELIT) <br>
        NIELIT Delhi Center, 2nd Floor, Parsvnath Metro Mall, Near Inderlok Metro Station, New Delhi, Delhi 110052, <br>
        Phone:- 91-11-2530 8300 Call Centre No.:- 011-25308303, Email:- contact[at]nielit[dot]gov[dot]in</p>
    </div>

 

</body>
</html>
