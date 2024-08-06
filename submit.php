<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = ""; // Enter your database password here
$dbname = "feedback";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract data from the form
    $faculty = $_POST['faculty'];
    $course = $_POST['course'];
    $module = $_POST['module'];
    $batch = $_POST['batch'];
    $batch_start = $_POST['batch_start'];
    $batch_end = $_POST['batch_end'];
    $duration = $_POST['duration'];
    $form_date = date("Y-m-d"); // Current date

    // Prepare the SQL statement for inserting into 'batches' table
    $sql_batch = $conn->prepare("INSERT INTO batches (faculty, course, module, batch, batch_start, batch_end, duration, form_date) 
                                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters for the prepared statement
    $sql_batch->bind_param("ssssssss", $faculty, $course, $module, $batch, $batch_start, $batch_end, $duration, $form_date);

    // Execute the prepared statement
    if ($sql_batch->execute()) {
       // echo "Batch data inserted successfully<br>";
    } else {
        echo "Error: " . $sql_batch . "<br>" . $conn->error;
    }

    // Close the prepared statement
    $sql_batch->close();

    // Extract data for questions table
    $name = $_POST['name'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $option5 = $_POST['option5'];
    $option6 = $_POST['option6'];
    $option7 = $_POST['option7'];
    $option8 = $_POST['option8'];
    $option9 = $_POST['option9'];
    $option10 = $_POST['option10'];
    $observation = $_POST['observation'];
    $suggestion = $_POST['suggestion'];

    // Prepare the SQL statement for inserting into 'questions' table
    $sql_questions = $conn->prepare("INSERT INTO questions (name, option1, option2, option3, option4, option5, option6, option7, option8, option9, option10, observation, suggestion) 
                                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters for the prepared statement
    $sql_questions->bind_param("sssssssssssss", $name, $option1, $option2, $option3, $option4, $option5, $option6, $option7, $option8, $option9, $option10, $observation, $suggestion);

    // Execute the prepared statement
    if ($sql_questions->execute()) {
        //echo "Question data inserted successfully";
    } else {
        echo "Error: " . $sql_questions . "<br>" . $conn->error;
    }

    // Close the prepared statement
    $sql_questions->close();

    // Close connection
    $conn->close();
} else {
    // If the form is not submitted, redirect back to the form page
    header("Location: feedback_form.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: white;
            margin: 0 50px;
        }
        .container {
            margin-top: 50px;
        }
        h1 {
            color: purple;
            font-size: 50px;
        }
        p {
            font-size: 18px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .logo-container {
    position: absolute;
    top: 0;
    left: 0;
    margin-right: 20px;
}
        .date-box {
            position: absolute;
            top: 0;
            right: 0;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.7);
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .logo {
    text-align: center;
   }

.logo img {
    width: 87%;
    margin: 0 50px;
}
.navbar{
    background-color: #333;
    overflow: hidden;
    width: calc(100% - 100px); /* Adjust width to account for the margins */
    margin: 0 50px;
}
navbar1 {
    background-color: #333;
    overflow: hidden;
}
.navbar a {
    float: left;
    display: block;
    color: white;
    text-align: center;
    padding: 14px 20px;
    text-decoration: none;
    font-size: 17px;
}

.navbar a:hover {
    background-color: red;
    color: black;
}

.content {
    padding: auto;
    text-align: center;
    background-color: skyblue;
    margin: 0 50px;
}

        .footer {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            margin-left: auto;
            margin-right: auto;
            margin: 0 100px;
        }
    </style>
</head>
<body>
     <div class="navbar">
    <a href="dashboard1.php">Home</a>
    
</div>
<div class="logo">
    <img src="NielitHeader.jpg" alt="NIELIT Logo">
</div>

<div class="content">
    <h2>NIELIT Delhi Centre </h2>
</div>
    <div class="container">
        <h1>Thank You!</h1>
        <p style="font-size: 34px;">Dear Students, <br> Thank you for providing your valuable feedback.</p>

<div class="footer">
    <p>राष्ट्रीय इलेक्ट्रॉनिकी एवं सूचना प्रौद्योगिकी संस्थान <br>
    National Institute of Electronics & Information Technology(NIELIT) <br>
    NIELIT Delhi Center, 2nd Floor, Parsvnath Metro Mall, Near Inderlok Metro Station, New Delhi, Delhi 110052, <br>
    Phone:- 91-11-2530 8300 Call Centre No.:- 011-25308303, Email:- contact[at]nielit[dot]gov[dot]in</p>
</div>
        
</body>
</html>
