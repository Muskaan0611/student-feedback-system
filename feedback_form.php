<?php
$servername="localhost";
    $username="root";
    $password="";
    $dname="feedback";

    $conn=mysqli_connect($servername,$username,$password,$dname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitizeData($data) {
    global $conn;
    return mysqli_real_escape_string($conn, $data);
}

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract data from form and sanitize
$batch = sanitizeData($_POST['batch']);
$module = sanitizeData($_POST['module']);
$course = sanitizeData($_POST['course']);
$duration = sanitizeData($_POST['duration']);
$batch_start = sanitizeData($_POST['batch_start']); 
$batch_end = sanitizeData($_POST['batch_end']); 
$faculty = sanitizeData($_POST['faculty']);
$currentDate = date("Y-m-d");

// SQL query to insert data into 'batches' table
$sqlBatches = "INSERT INTO batches (faculty, course, module, batch, batch_start, batch_end, duration, form_date) 
              VALUES ('$faculty', '$course', '$module', '$batch', '$batch_start', '$batch_end', '$duration', '$currentDate')";


    if (mysqli_query($conn, $sqlBatches)) {
        //echo "Record inserted successfully into 'batches' table";
    } else {
        echo "Error: " . $sqlBatches . "<br>" . mysqli_error($conn);
    }

    // SQL query to insert data into 'questions' table
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
    $suggestion =$_POST['suggestion'];
    

    $sqlQuestions = "INSERT INTO questions (name,option1,option2,option3,option4,option5,option6,option7,option8,option9,option10,observation, suggestion) VALUES ('$name','$option1', '$option2', '$option3', '$option4', '$option5', '$option6', '$option7', '$option8', '$option9', '$option10','$observation', '$suggestion')";

    if ($conn->query($sqlQuestions) === TRUE) {
        //echo "Record inserted successfully into 'questions' table";
    } else {
        echo "Error: " . $sqlQuestions . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Feedback Form</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>

     <div class="navbar">
    <a href="dashboard1.php">Home</a>
    
</div>
 <!-- Date Display -->
            <div class="date-box">
                <p>Date: <?php echo date("d-m-Y"); ?></p>
                
            </div>
            <!-- End Date Display -->
<div class="logo">
    <img src="NielitHeader.jpg" alt="NIELIT Logo">
</div>

<div class="content">
    <h2>NIELIT Delhi Centre </h2>
</div>
    <div class="container">
        <!-- Header -->
        <header class="header">
            
           
            
    <h1>Student Feedback Form</h1>
</header>
    <form action="submit.php" method="POST" id="feedback-form">
        <div class="form-group">
            <label for="name">Student Name</label>
            <div class="input-area">
                <input type="text" name="name" id="name" placeholder="Enter your Name" required maxlength="20">
            </div>
            
            
            <label for="batch">Batch code</label>
            <div class="input-area">
                <input type="text" name="batch" id="batch" placeholder="Enter Batch Code" required>
            </div>
       
         
    <label for="module">Module Name</label>
    <div class="input-area">
        <input type="text" name="module" id="module" placeholder="Enter Module Name" required maxlength="20">
    </div>

        
    <label for="course">Course Name</label>
    <div class="input-area">
        <select name="course" id="course" class="big-select">
     <option value="Select">Select Course</option>
        <option value="'O' LEVEL">'O' LEVEL</option>
        <option value="'A' LEVEL">'A' LEVEL</option>
        <option value="'A' LEVEL(IT)">'A' LEVEL(IT)</option>
        <option value="AI Development Associate">AI Development Associate</option>
        <option value="'CHMT O LEVEL">CHMT O LEVEL</option>
        <option value="Certified Computer Application Accounting And Publishing Assistant">Certified Computer Application Accounting And Publishing Assistant</option>
        <option value="Internet Of Things(IOT) Assistant(3)">Internet Of Things(IOT) Assistant(3)</option>
        <option value="Certified Data Entry and Office Assistant(upskilling)">Certified Data Entry and Office Assistant(upskilling)</option>
        <option value="Certified Web Developer">Certified Web Developer</option>
        <option value="Certified Multimedia Developer">Certified Multimedia Developer</option>
        <option value="CCC">CCC</option>
        <option value="Foundation course in Block Chain(4)">Foundation course in Block Chain(4)</option>
        <option value="Foundation Course in VLSI design(4)">Foundation Course in VLSI design(4)</option>
        <option value="Foundation Course in IOT(4)">Foundation Course in IOT(4)</option>
        <option value="Foundation Course in Embedded Application Developmenty(4)">Foundation Course in Embedded Application Developmenty(4)</option>
        <option value="Certified Course in Digital Marketing(4 weeks)">Certified Course in Digital Marketing(4 weeks)</option>
        <option value="Certified Course in Digital Marketing(6 weeks)">Certified Course in Digital Marketing(6 weeks)</option>
        <option value="Certified Course in Digital Marketing(8 weeks)">Certified Course in Digital Marketing(8 weeks)</option>
        <option value="Certified Course in Programming through Python">Certified Course in Programming through Python</option>
        <option value="Certified Course in Tally Prime">Certified Course in Tally Prime</option>
        <option value="Certified Course in Data Science and Machine Learning using Python">Certified Course in Data Science and Machine Learning using Python</option>
        <option value="Machine Learning For AI Application">Machine Learning For AI Application</option>
    </select>
    </div>

    <label for="duration">Course Duration (in hours)</label> <!-- Moved the label here -->
<div class="input-area">
    <input type="text" name="duration" id="duration" placeholder="Enter Course Duration" required>
</div>
<script>
    document.getElementById("duration").addEventListener("input", function() {
        this.value = this.value.replace(/[^0-9]/g, ''); // Remove any non-numeric characters
    });
</script>



            <label for="batch_start">Batch Start Date</label>
            <div class="input-area">
                <input type="date" name="batch_start" id="batch_start" required>
            </div>
        
            <label for="batch_end">Batch End Date</label>
            <div class="input-area">
                <input type="date" name="batch_end" id="batch_end" required>
            </div>
        
            <label for="faculty">Faculty Name</label>
            <div class="input-area">
                <select name="faculty" id="faculty" required>
                    <option value="">Select Faculty</option>
                    <option value="Kanchan Rani">Kanchan Rani(Additional Director)</option>
                        <option value="Swapnali Naik">Swapnali Naik(Joint Director)</option>
                        <option value="Piyush Srivastva">Piyush Srivastva(Joint Director)</option>
                        <option value="Amit Jain">Amit Jain(Deputy Director)</option>
                        <option value="Harihar Dash">Harihar Dash(Sci 'B')</option>
                        <option value="Sangeeta Yadav">Sangeeta Yadav(STA)</option>
                        <option value="Pankaj Sharma">Pankaj Sharma(STA)</option>
                        <option value="Sushmita Singh">Sushmita Singh(Associate Faculty(Multimedia))</option>
                        <option value="Sushmita Singh">Priya Sharma(Associate Faculty(Multimedia))</option>
                        <option value="Kajol">Kajol(Associate Faculty(Accounts))</option>
                        <option value="Barkha Rani">Barkha Rani(Associate Faculty(IT))</option>
                        <option value="Biky Chauhan">Biky Chauhan(Associate Faculty(IT))</option>
                        <option value="Subhash">Subhash(Lab Assistant)</option>
                        <option value="Ravinder">Ravinder(Lab Assistant)</option>
                        <option value="Arun Sharma">Arun Sharma(Lab Assistant(BSF))</option>
                        <option value="Ritesh Bhatt">Ritesh Bhatt(Trainer IT)</option>
                        <option value="Dilip">Dilip(Trainer IT(BSF))</option>
                        <option value="Anjali">Anjali(Training Clerk)</option>
                        <option value="Ritu">Ritu(Office Assistant)</option>
                    <!-- Add your faculty options here -->
                </select>
            </div>
        </div>
       
        <!-- table data -->
        <div class="form-group">
                        <p  id="ques" class="section-title">A. Standard of Training(Please tick the appropriate box)</p>
                        <table>
                        <tr>
                            <td>
                                <p  id="ques" class="section-title">1.Meeting the course objective</p>
                                </td>
                                 <td>
                        <label for="">
                             <input type="radio"checked
                            name="option1"
                            value="Excellent"
                            class="inputRadio"
                            >Excellent
                        </label>
                                </td>
                                <td>
                        <label for="">
                                    <input type="radio"
                            name="option1"
                            value="Very Good"
                            class="inputRadio"
                            >Very Good
                        </label>
                                </td>
                                <td>
                                <label>
                                   <input type="radio"
                            name="option1"
                            value="Good"
                            class="inputRadio"
                            >Good
                        </label>
                                </td>
                        
                                <td>
                        <label for="">
                            <input type="radio"
                            name="option1"
                            value="Satisfactory"
                            class="inputRadio"
                            >Satisfactory
                        </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p  id="ques" class="section-title">2.Structure of course</p>
                                </td>
                                <td>
                        <label for="">
                            <input type="radio"checked
                            name="option2"
                            value="Excellent"
                            class="inputRadio"
                            >Excellent
                        </label>

                                </td>
                                <td>
                        <label for="">
                            <input type="radio"
                            name="option2"
                            value="Very Good"
                            class="inputRadio"
                            >Very Good
                        </label>
                                </td>
                                <td>
                        <label for="">
                                    <input type="radio"
                            name="option2"
                            value="Good"
                            class="inputRadio"
                            >Good
                        </label>
                                </td>
                                <td>
                        <label for="">
                            <input type="radio"
                            name="option2"
                            value="Satisfactory"
                            class="inputRadio"
                            >Satisfactory
                        </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p id="ques" class="section-title">3.e-Contents/Course Material</p>
                                </td>
                                <td>
                         <label for="">
                            <input type="radio"checked
                            name="option3"
                            value="Excellent"
                            class="inputRadio"
                            >Excellent
                        </label>
                                </td>
                                <td>
                        <label for="">
                            <input type="radio"
                            name="option3"
                            value="Very Good"
                            class="inputRadio"
                            >Very Good
                        </label>
                                </td>
                                <td>
                        <label for="">
                            <input type="radio"
                            name="option3"
                            value="Good"
                            class="inputRadio"
                            >Good
                        </label>
                                </td>
                                <td>
                        <label for="">
                            <input type="radio"
                            name="option3"
                            value="Satisfactory"
                            class="inputRadio"
                            >Satisfactory
                        </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p  id="ques" class="section-title">4.Practical sessions/Assignments</p>
                                </td>
                                <td>
                        <label for="">
                            <input type="radio"checked
                            name="option4"
                            value="Excellent"
                            class="inputRadio"
                            >Excellent
                        </label>
                                </td>
                                <td>
                        <label for="">
                            <input type="radio"
                            name="option4"
                            value="Very Good"
                            class="inputRadio"
                            >Very Good
                        </label>  
                                 
                                </td>
                                <td>
                                
                        <label for="">
                            <input type="radio"
                            name="option4"
                            value="Good"
                            class="inputRadio"
                            >Good
                        </label>
                                </td>
                                <td>
                        <label for="">
                            <input type="radio"
                            name="option4"
                            value="Satisfactory"
                            class="inputRadio"
                            >Satisfactory
                        </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p  id="ques" class="section-title">5.Lab/Classroom facilities</p>
                                </td>
                                <td>
                        <label for="">
                            <input type="radio"checked
                            name="option5"
                            value="Excellent"
                            class="inputRadio"
                            > Excellent
                        </label>
                                    
                                </td>
                                <td>
                        <label for="">
                            <input type="radio"
                            name="option5"
                            value="Very Good"
                            class="inputRadio"
                            >Very Good
                        </label>
                                </td>
                                <td>
                        <label for="">
                                    <input type="radio"
                            name="option5"
                            value="Good"
                            class="inputRadio"
                            >Good
                        </label>
                                </td>
                                <td>
                        <label for="">
                            <input type="radio"
                            name="option5"
                            value="Satisfactory"
                            class="inputRadio"
                            >Satisfactory
                        </label>
                                </td>
                            </tr>
                        </table>
                    </div>  
                    <div class="form-group">
                        <p id="ques" class="section-title">B. Faculty Evaluation(Please tick the appropriate box)</p>
                        <table>
                            <tr>
                                <td>
                                    <p id="ques" class="section-title">1.Delivery of the subject(teaching)</p>
                                </td>
                                <td>
                                    <label for="">
                            <input type="radio"checked
                            name="option6"
                            value="Excellent"
                            class="inputRadio"
                            >Excellent
                        </label>
                                </td>
                                <td>
                                    <label for="">
                            <input type="radio"
                            name="option6"
                            value="Very Good"
                            class="inputRadio"
                            >Very Good
                        </label>
                                </td>
                                <td>
                                    <label for="">
                                    <input type="radio"
                            name="option6"
                            value="Good"
                            class="inputRadio"
                            >Good
                        </label>
                                </td>
                                <td>
                                      <label for="">
                            <input type="radio"
                            name="option6"
                            value="Satisfactory"
                            class="inputRadio"
                            >Satisfactory
                        </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p  id="ques" class="section-title">2.Faculty's knowledge about the subject</p>
                                </td>
                                <td>
                                    <label for="">
                            <input type="radio" checked 
                            name="option7"
                            value="Excellent"
                            class="inputRadio"
                            >Excellent
                        </label>
                                </td>
                                <td>
                                    <label for="">
                            <input type="radio"
                            name="option7"
                             value="very good"
                            class="inputRadio"
                            >Very Good
                        </label>
                                </td>
                                <td>
                                    <label for="">
                                    <input type="radio"
                            name="option7"
                            value="Good"
                            class="inputRadio"
                            >Good
                        </label>
                                </td>
                                <td>
                                      <label for="">
                            <input type="radio"
                            name="option7"
                            value="Satisfactory"
                            class="inputRadio"
                            >Satisfactory
                        </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p  id="ques" class="section-title">3.Technical support provided</p>
                                </td>
                                <td>
                                    <label for="">
                            <input type="radio"checked
                            name="option8"
                            value="Excellent"
                            class="inputRadio"
                            >Excellent
                        </label>
                                </td>
                                <td>
                                    <label for="">
                                    <input type="radio"
                            name="option8"
                            value="Very Good"
                            class="inputRadio"
                            >Very Good
                        </label>
                                </td>
                                <td>
                                    <label for="">
                                    <input type="radio"
                            name="option8"
                            value="Very Good"
                            class="inputRadio"
                            > Good
                        </label>
                                </td>
                                <td>
                             <label for="">
                            <input type="radio"
                            name="option8"
                            value="Satisfactory"
                            class="inputRadio"
                            >Satisfactory
                        </label>
                                </td>
                            </tr>
                        </table>    
                    </div>    
                    <!---Radio button section-->
                    <div class="form-group">
                        <p  id="ques" class="section-title">C.Syllabus completed in time     &nbsp;
                        <label for="">
                            <input type="radio" checked 
                            name="option9"
                            value="Yes"
                            class="inputRadio">Yes
                        </label>
                        <label for="">
                            <input type="radio"
                            name="option9"
                            value="No"
                            class="inputRadio">No
                           
                        </label></p>
                    </div> 
                    <div class="form-group">
                        <p  id="ques" class="section-title">D.Revision Class/Module Test      &nbsp;
                        <label for="">
                            <input type="radio"checked
                            
                            name="option10"
                            value="Yes"
                            class="inputRadio"
                            >Yes
                        </label>
                        <label for="">
                            <input type="radio"
                            name="option10"
                            value="No"
                            class="inputRadio">No
                        </label></p>

                    </div>

                    <div class="form-group">
    <p id="ques" class="section-title">Observation</p>
    <textarea name="observation" id="observation" cols="105" rows="8" class="textarea" onclick="setCursorPosition('observation')"></textarea>
</div>

<div class="form-group">
    <p id="ques" class="section-title">Mention your suggestion for improvement of the course</p>
    <textarea name="suggestion" id="suggestion" cols="105" rows="8" class="textarea" onclick="setCursorPosition('suggestion')"></textarea>
</div>
 <div class="form-group">
    <button type="submit" style="display: block; margin: 0 auto;">Submit</button>
</div>

         </form>
    
</body>
</html>
