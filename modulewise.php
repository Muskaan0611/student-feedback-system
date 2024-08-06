<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty-wise Report</title>
    <link rel="stylesheet" href="faculty.css">
     <style>
    body {
        margin: 0 50px;
        font-family: Arial, sans-serif;
    }

    .navbar {
        background-color: #333;
        overflow: hidden;
        width: calc(100% - 100px); /* Adjust width to account for the margins */
        margin: 0 50px; /* Apply margin to align with the body */
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

    
    .search-box {
        background-color: #f2f2f2;
        padding: 20px;
        border-radius: 8px;
        width: 100%; /* Ensure the search box takes full width of its container */
        max-width: 600px; /* Limit the maximum width of the search box */
        box-sizing: border-box; /* Include padding and border in the width */
        margin: 0 auto; /* Center the search box horizontally */
    }

    .search-box h2 {
        margin-top: 0;
    }

    .faculty-select {
        margin-bottom: 20px;
    }

    .faculty-select label {
        font-weight: bold;
    }

    .big-select {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .date-range {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .date-range label {
        font-weight: bold;
    }

    .date-range input[type="date"] {
        width: 45%;
        padding: 8px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .search-btn input[type="submit"] {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .search-btn input[type="submit"]:hover {
        background-color: #45a049;
    }
   
    /* Additional CSS styles for table */
    .feedback-table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 10px;
    }

    .feedback-table th,
    .feedback-table td {
        border: 5px solid darkgray;
        padding: 12px;
        text-align: left;
    }

    .feedback-table th {
        background-color: #f2f2f2;
    }

    .feedback-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .feedback-table tr:hover {
        background-color: #f2f2f2;
    }

    .feedback-table th,
    .feedback-table td {
        font-family: Arial, sans-serif;
        font-size: 14px;
    }
       h1 {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 30px;
            color: blue; /* You can change the color to your preference */
        }

    </style>
    
</head>
<body>
    
<div class="navbar">
    <a href="dashboard1.php">Home</a>
    <a href="reportpage.php">Report</a>
</div>
<div class="logo">
    <img src="NielitHeader.jpg" alt="NIELIT Logo">
</div>

<div class="content">
    <h2>NIELIT Delhi Centre</h2>
</div>

<h1>Module-Wise Report</h1>
<div class="container">
    <div class="search-box">
        
        <form id="search-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">

            <div class="faculty-select">
               <label for="module">Module Name:</label>
    <input name="module" id="module" class="big-select">
                    
            </label>
            </div>
            <div class="date-range">
                <label for="from-date">From:</label>
                <input type="date" id="from-date" name="from-date">
                <label for="to-date">To:</label>
                <input type="date" id="to-date" name="to-date">
            </div>
            <script>
    // Get the current date
    var currentDate = new Date();

    // Format the current date as YYYY-MM-DD (required by the input type="date" field)
    var formattedDate = currentDate.toISOString().split('T')[0];

    // Set the value of the "To" date field to the current date
    document.getElementById("to-date").value = formattedDate;
</script>

<div class="search-btn" style="display: flex; justify-content: center;">
    <input type="submit" value="Search">
</div>
 </form>
</div>
</div>
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

// Retrieve search criteria
$module = isset($_GET['module']) ? $_GET['module'] : "";

// SQL query to fetch data based on search criteria
$sql = "SELECT b.*, q.*
        FROM batches b
        JOIN questions q ON b.id = q.id
        WHERE 1=1";

// Add module filter if provided
if (!empty($module)) {
    $sql .= " AND b.module = '$module'";
}

$sql .= " ORDER BY b.course, b.module, b.faculty";

// Execute the query
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $currentCourse = ""; // Variable to track current course
    $currentModule = ""; // Variable to track current module
    $currentFaculty = ""; // Variable to track current faculty

    // Output the results
    while ($row = $result->fetch_assoc()) {
        // Check if current course and module are different from previous ones
        if ($row['course'] != $currentCourse || $row['module'] != $currentModule || $row['faculty'] != $currentFaculty) {
            // If different, close previous feedback table and faculty-details-box
            if ($currentCourse !== "" && $currentModule !== "" && $currentFaculty !== "") {
                echo "</table>"; // Close feedback table
                echo "</div>"; // Close faculty-details-box
            }

            // Start new course-details-box
            echo "<div class='course-details-box' style='border: 50px solid #ccc; padding: 20px; text-align: center;'>";


            // Course Name
            echo "<div style='margin-bottom: 10px;'>";
            echo "<h3 style='margin: 0; text-decoration: underline;'>Course Name:</h3>";

            echo "<h3 style='margin: 0; color: blue; font-weight: bold;'>" . $row['course'] . "</h3>";

            echo "</div>";

            // Course Duration, Module Name, Batch Code
            echo "<div style='display: flex; justify-content: center; margin-bottom: 10px;'>";
            echo "<div style='margin-right: 20px;'>";
            echo "<h3 style='margin: 0;'>Course Duration:</h3>";
            echo "<h4 style='margin: 0; color: blue; font-weight: bold;'>" . $row['duration'] . "</h4>";
            echo "</div>";
            echo "<div style='margin-right: 20px;'>";
            echo "<h3 style='margin: 0;'>Module Name:</h3>";
            echo "<h4 style='margin: 0; color: blue; font-weight: bold;'>" . $row['module'] . "</h4>";
            echo "</div>";
            echo "<div>";
            echo "<h3 style='margin: 0;'>Batch Code:</h3>";
            echo "<h4 style='margin: 0; color: blue; font-weight: bold;'>" . $row['batch'] . "</h4>";
            echo "</div>";
            echo "</div>";

            // Batch Start Date and Batch End Date
            echo "<div style='display: flex; justify-content: center; margin-bottom: 10px;'>";
            echo "<div style='margin-right: 20px;'>";
            echo "<h3 style='margin: 0;'>Batch Start Date:</h3>";
            echo "<h4 style='margin: 0; color: blue; font-weight: bold;'>" . $row['batch_start'] . "</h4>";
            echo "</div>";
            echo "<div>";
            echo "<h3 style='margin: 0;'>Batch End Date:</h3>";
            echo "<h4 style='margin: 0; color: blue; font-weight: bold;'>" . $row['batch_end'] . "</h4>";
            echo "</div>";
            echo "</div>";

            // Faculty Name
            echo "<div>";
            echo "<h3 style='margin: 0;'>Faculty Name:</h3>";
            echo "<h4 style='margin: 0; color: blue; font-weight: bold;'>" . $row['faculty'] . "</h4>";
            echo "</div>";

            echo "</div>"; // Close the course-details-box div


            // Start feedback table for the current module and faculty
            echo "<table class='feedback-table'>
                    <tr>
                        <th>Student Name</th>
                        <th>Meeting the course objective</th>
                        <th>Structure of the course</th>
                        <th>e-contents/course Material</th>
                        <th>Practical Sessions/Assignments</th>
                        <th>Lab/Classroom facilities</th>
                        <th>Delivery of Subject(teaching)</th>
                        <th>Faculty's Knowledge about the subject</th>
                        <th>Technical support provided</th>
                        <th>Syllabus completed in time</th>
                        <th>Revision class/Module Tests</th>
                        <th>Suggestion</th>
                        <th>Observation</th>
                    </tr>";
        }

        // Output feedback data row
        echo "<tr>
                <td>" . $row["name"] . "</td>
                <td>" . $row["option1"] . "</td>
                <td>" . $row["option2"] . "</td>
                <td>" . $row["option3"] . "</td>
                <td>" . $row["option4"] . "</td>
                <td>" . $row["option5"] . "</td>
                <td>" . $row["option6"] . "</td>
                <td>" . $row["option7"] . "</td>
                <td>" . $row["option8"] . "</td>
                <td>" . $row["option9"] . "</td>
                <td>" . $row["option10"] . "</td>
                <td>" . $row["suggestion"] . "</td>
                <td>" . $row["observation"] . "</td>
              </tr>";

        $currentCourse = $row['course']; // Update current course
        $currentModule = $row['module']; // Update current module
        $currentFaculty = $row['faculty']; // Update current faculty
    }

    // Close the last feedback table and faculty-details-box
    echo "</table>"; // Close feedback table
    echo "</div>"; // Close faculty-details-box
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();
?>

</body>
</html>
