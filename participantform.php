<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dname="participant feedback";

    $conn=mysqli_connect($servername,$username,$password,$dname);


    if($conn){
        //echo"connection ok";
    }
    else
    {
        echo"connection fail";

    }
    
    
    if(isset($_POST['submit']))

    {
        
        $one       = $_POST['Name'];
        $two       = $_POST['coursecode'];
        $three     = $_POST['departname'];
        $four      = $_POST['CourseName'];
        $five      = $_POST['Start_Date'];
        $six       = $_POST['End_Date'];
        $seven     = $_POST['option1'];
        $eight     = $_POST['option2'];
        $nine      = $_POST['option3'];
        $ten       = $_POST['option4'];
        $eleven    = $_POST['Comment'];
        $twelve    = $_POST['option5'];
        $thirteen  = $_POST['option6'];
        $fourteen  = $_POST['option7'];
        $fifteen   = $_POST['Comment_1'];
        $sixteen   = $_POST['option8'];
        $seventeen = $_POST['option9'];
        $eighteen  = $_POST['option10'];
        $nineteen  = $_POST['Comment_2'];
        $twenty    = $_POST['option11'];
        $twentyone = $_POST['Comment_3'];
        $twentytwo = $_POST['option12'];
        $twentythree = $_POST['Comment_4'];
        $twentyfour = $_POST['option13'];
        $twentyfive = $_POST['Comment_5'];
        $twentysix = $_POST['feedback'];
        $twentyseven = $_POST['observation'];





        if($one !==""&& $two !==""&& $three !==""&& $four !==""&& $five !==""&& $six !==""&& $seven !==""&& $eight !==""&& $nine !==""&& $ten !==""&& $eleven !==""&& $twelve !==""&& $thirteen !==""&&$fourteen !==""&& $fifteen !==""&& $sixteen !==""&& $seventeen !==""&& $eighteen !==""&& $nineteen !==""&& $twenty !==""&& $twentyone !==""&& $twentytwo !==""&& $twentythree !==""&& $twentyfour !==""&& $twentyfive !==""&& $twentysix !==""&& $twentyseven !=="")
        {

        $sql="INSERT INTO `participant_form`(`Name`,`coursecode`, `departname`, `CourseName`, `Start_Date`, `End_Date`, `option1`, `option2`, `option3`, `option4`, `Comment`, `option5`, `option6`, `option7`, `Comment_1`, `option8`, `option9`, `option10`, `Comment_2`, `option11`,`Comment_3`,`option12`,`Comment_4`,`option13`,`Comment_5`,`feedback`,`observation`) VALUES ('$one','$two','$three','$four','$five','$six','$seven','$eight','$nine','$ten','$eleven','$twelve','$thirteen','$fourteen','$fifteen','$sixteen','$seventeen','$eighteen','$nineteen','$twenty','$twentyone','$twentytwo','$twentythree','$twentyfour','$twentyfive','$twentysix','$twentyseven')";
        $result=mysqli_query($conn,$sql);

    
        

        if ($result) {
                // Redirect after successful insertion
                header("Location: part_thanku_page.php");
                exit(); // Make sure to exit after sending headers
               
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Please fill all required fields";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback form</title>
    <link rel="stylesheet" href="partform.css">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
    console.log("DOM content loaded");

    // Function to format date from YYYY-MM-DD to DD/MM/YY
    function formatDate(date) {
        console.log("Original date:", date);
        var parts = date.split("-");
        console.log("Parts:", parts);
        var formattedDate = parts[2] + "/" + parts[1] + "/" + parts[0].substring(2);
        console.log("Formatted date:", formattedDate);
        return formattedDate;
    }

    // Update the displayed date format for Batch Start Date
    var batchStartDateInput = document.getElementById('Batch_Start_Date');
    console.log("Batch start date input:", batchStartDateInput.value);
    batchStartDateInput.value = formatDate(batchStartDateInput.value);

    // Update the displayed date format for Batch End Date
    var batchEndDateInput = document.getElementById('Batch_End_Date');
    console.log("Batch end date input:", batchEndDateInput.value);
    batchEndDateInput.value = formatDate(batchEndDateInput.value);
});

</script>
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
        <!-- Header -->
        <header class="header">
            
            <!-- Date Display -->
            <div class="date-box">
                <p>Date: <?php echo date("d-m-Y"); ?></p>
                
            </div>
            <!-- End Date Display -->
            <h1 id="title">Participant Feedback Form</h1>
        </header>
        <form action="#" id="Feedback-form" method="POST">
            <h4>We ask that you take a moment to provide your feedback.This helps us understand how future training may need to be adjusted to best respond to participants' needs.Your responses will be used to improve future training methods.Your feedback is important to us.</h4>
        <br>

        <div class="form-group">

                    <label for="Name">Name of Participant</label>
                    <div class="input-area">
                    <input type="text" name="Name" id="Name" class="formControl" placeholder="Enter your Name" required>
        </div>
    </div>

                <div class="form-group">
                    <label for="coursecode">Course Code</label>
                    <div class="input-area">
                    <input type="text" name="coursecode" id="coursecode" class="formControl" placeholder="Enter your Course Code" required>
        </div>
    </div>
    <div class="form-group">
                 <label for="departname">Department Name</label>
                 <div class="input-area">
                 <input type="text" name="departname" id="departname" class="formControl" placeholder="Enter your Department Name" required>
             </div>
         </div>

        <div class="form-group">
        <label for="CourseName">Course Name</label>
        <div class="input-area">
        <select name="CourseName" id="CourseName" class="big-select">
        <option value="Select">Select</option>
        <option value="O LEVEL">'O' LEVEL</option>
        <option value="A LEVEL">'A' LEVEL</option>
        <option value="A LEVEL(IT)">'A' LEVEL(IT)</option>
        <option value="AI Development Associate">AI Development Associate</option>
        <option value="'CHMT O LEVEL">CHMT O LEVEL</option>
        <option value="Certified Computer Application Accounting And Publishing Assistant">Certified Computer Application Accounting And Publishing Assistant</option>
        <option value="Internet Of Things(IOT) Assistant(3)">Internet Of Things(IOT) Assistant(3)</option>
        <option value="Certified Data Entry and Office Assistant(upskilling)">Certified Data Entry and Office Assistant(upskilling)</option>
        <option value="Certified Web Developer">Certified Web Developer</option>
        <option value="Certified Multimedia Developer">Certified Multimedia Developer</option>
        <option value="'CCC">CCC</option>
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
</div>
<div class="form-group">
    <label for="Start_Date">Start Date</label>
    
    <input type="date" name="Start_Date" id="Start_Date" class="formControl" value="<?php echo $currentDate; ?>"required>
</div>
<div class="form-group">
    <label for="End_Date">End Date</label>
    <input type="date" name="End_Date" id="End_Date" class="formControl" value="<?php echo $currentDate; ?>" required>
</div>
<h4>On a scale of 1-4 where 1 is Strongly Disagree and 4 is Strongly Agree, please tick the most appropriate answer:</h4>
<br>
<!--select section-->
                    <div class="form-group">
                        <p  id="ques">A. The training curriculum was:</p>
                        <table>
                            <tr>
                                <td>
                                    <p  id="ques">Relevant</p>
                                </td>
                                 <td>
                        <label for="">
                             <input type="radio"checked
                            name="option1"
                            value="Strongly Disagree"
                            class="inputRadio"
                            >1
                        </label>
                                </td>
                                <td>
                        <label for="">
                                    <input type="radio"
                            name="option1"
                            value="Disagree"
                            class="inputRadio"
                            >2
                        </label>
                                </td>
                                <td>
                                <label for="">
                                   <input type="radio"
                            name="option1"
                            value="Strongly Agree"
                            class="inputRadio"
                            >3
                        </label>
                                </td>
                                <td>
                        <label for="">
                            <input type="radio"
                            name="option1"
                            value="Agree"
                            class="inputRadio"
                            > 4
                        </label>
                            </td>
                            </tr>
                            <tr>
                                <td>
                                    <p  id="ques">Comprehensive</p>
                                </td>
                                <td>
                        <label for="">
                            <input type="radio"checked
                            name="option2"
                            value="Strongly Disagree"
                            class="inputRadio"
                            >1
                        </label>

                                </td>
                                <td>
                        <label for="">
                            <input type="radio"
                            name="option2"
                            value="Disagree"
                            class="inputRadio"
                            >2
                        </label>
                                </td>
                                <td>
                        <label for="">
                                    <input type="radio"
                            name="option2"
                            value=" Strongly Agree"
                            class="inputRadio"
                            >3
                        </label>
                                </td>
                                <td>
                        <label for="">
                            <input type="radio"
                            name="option2"
                            value="Agree"
                            class="inputRadio"
                            >4
                        </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p id="ques">Easy to understand</p>
                                </td>
                                <td>
                         <label for="">
                            <input type="radio"checked
                            name="option3"
                            value=" Strongly Disagree"
                            class="inputRadio"
                            >1
                        </label>
                                </td>
                                <td>
                        <label for="">
                            <input type="radio"
                            name="option3"
                            value="Disagree"
                            class="inputRadio"
                            >2
                        </label>
                                </td>
                                <td>
                        <label for="">
                            <input type="radio"
                            name="option3"
                            value="Strongly Agree"
                            class="inputRadio"
                            >3
                        </label>
                                </td>
                                <td>
                        <label for="">
                            <input type="radio"
                            name="option3"
                            value="Agree"
                            class="inputRadio"
                            >4
                        </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p  id="ques">Overall usefulness</p>
                                </td>
                                <td>
                        <label for="">
                            <input type="radio"checked
                            name="option4"
                            value=" Strongly Disagree"
                            class="inputRadio"
                            >1
                        </label>
                                </td>
                                <td>
                        <label for="">
                            <input type="radio"
                            name="option4"
                            value="Disagree"
                            class="inputRadio"
                            >2
                        </label>  
                                 
                                </td>
                                <td>
                                
                        <label for="">
                            <input type="radio"
                            name="option4"
                            value="Strongly Agree"
                            class="inputRadio"
                            >3
                        </label>
                                </td>
                                <td>
                        <label for="">
                            <input type="radio"
                            name="option4"
                            value="Agree"
                            class="inputRadio"
                            >4
                        </label>
                                </td>
                            </tr>

                           
                        </table>
                        </div>
                        <div class="form-group">
                        <p  id="ques">Comments</p>
                        <textarea name="Comment"
                        id="Comment" cols="10" rows="3"
                        class="textarea">
                            
                        </textarea>
                     </div>

                    <div class="form-group">
                        <p id="ques">B. The training notes/e-contents were:</p>
                        <table>
                            <tr>
                                <td>
                                    <p id="ques">Supported presentation material</p>
                                </td>
                                <td>
                                    <label for="">
                            <input type="radio"checked
                            name="option5"
                            value="Strongly Disagree"
                            class="inputRadio"
                            >1
                        </label>
                                </td>
                                <td>
                                    <label for="">
                            <input type="radio"
                            name="option5"
                            value=" Disagree"
                            class="inputRadio"
                            >2
                        </label>
                                </td>
                                <td>
                                    <label for="">
                                    <input type="radio"
                            name="option5"
                            value="Strongly Agree"
                            class="inputRadio"
                            >3
                        </label>
                                </td>
                                <td>
                                      <label for="">
                            <input type="radio"
                            name="option5"
                            value="Agree"
                            class="inputRadio"
                            >4
                        </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p  id="ques">Provided additional useful information</p>
                                </td>
                                <td>
                                    <label for="">
                            <input type="radio"checked
                            name="option6"
                            value="Strongly Disagree"
                            class="inputRadio"
                            >1
                        </label>
                                </td>
                                <td>
                                    <label for="">
                            <input type="radio"
                            name="option6"
                             value="Disagree"
                            class="inputRadio"
                            >2
                        </label>
                                </td>
                                <td>
                                    <label for="">
                                    <input type="radio"
                            name="option6"
                            value="Strongly Agree"
                            class="inputRadio"
                            >3
                        </label>
                                </td>
                                <td>
                                      <label for="">
                            <input type="radio"
                            name="option6"
                            value="Agree"
                            class="inputRadio"
                            >4
                        </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p  id="ques">Clear and organised</p>
                                </td>
                                <td>
                                    <label for="">
                            <input type="radio"checked
                            name="option7"
                            value="Strongly Disagree"
                            class="inputRadio"
                            >1
                        </label>
                                </td>
                                <td>
                                    <label for="">
                                    <input type="radio"
                            name="option7"
                            value="Disagree"
                            class="inputRadio"
                            >2
                        </label>
                                </td>
                                <td>
                                    <label for="">
                                    <input type="radio"
                            name="option7"
                            value="Strongly Agree"
                            class="inputRadio"
                            > 3
                        </label>
                                </td>
                                <td>
                             <label for="">
                            <input type="radio"
                            name="option7"
                            value="Agree"
                            class="inputRadio"
                            >4
                        </label>
                                </td>
                            </tr>
                        </table>    
                    </div> 
                     
                     <div class="form-group">
                        <p  id="ques">Comments</p>
                        <textarea name="Comment_1"
                        id="Comment_1" cols="10" rows="3"
                        class="textarea">
                            
                        </textarea>
                     </div>
                     <div class="form-group">
                        <p id="ques">C.The training was:</p>
                        <table>
                            <tr>
                                <td>
                                    <p id="ques">Well paced</p>
                                </td>
                                <td>
                                    <label for="">
                            <input type="radio"checked
                            name="option8"
                            value=" Strongly Disagree"
                            class="inputRadio"
                            >1
                        </label>
                                </td>
                                <td>
                                    <label for="">
                            <input type="radio"
                            name="option8"
                            value=" Disagree"
                            class="inputRadio"
                            >2
                        </label>
                                </td>
                                <td>
                                    <label for="">
                                    <input type="radio"
                            name="option8"
                            value=" Strongly Agree"
                            class="inputRadio"
                            >3
                        </label>
                                </td>
                                <td>
                                      <label for="">
                            <input type="radio"
                            name="option8"
                            value="Agree"
                            class="inputRadio"
                            >4
                        </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p  id="ques">Breaks were sufficient</p>
                                </td>
                                <td>
                                    <label for="">
                            <input type="radio"checked
                            name="option9"
                            value="Strongly Disagree"
                            class="inputRadio"
                            >1
                        </label>
                                </td>
                                <td>
                                    <label for="">
                            <input type="radio"
                            name="option9"
                             value="Disagree"
                            class="inputRadio"
                            >2
                        </label>
                                </td>
                                <td>
                                    <label for="">
                                    <input type="radio"
                            name="option9"
                            value="Strongly Agree"
                            class="inputRadio"
                            >3
                        </label>
                                </td>
                                <td>
                                      <label for="">
                            <input type="radio"
                            name="option9"
                            value="Agree"
                            class="inputRadio"
                            >4
                        </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p  id="ques">A good mix between listening and activities</p>
                                </td>
                                <td>
                                    <label for="">
                            <input type="radio"checked
                            name="option10"
                            value="Strongly Disagree"
                            class="inputRadio"
                            >1
                        </label>
                                </td>
                                <td>
                                    <label for="">
                                    <input type="radio"
                            name="option10"
                            value="Disagree"
                            class="inputRadio"
                            >2
                        </label>
                                </td>
                                <td>
                                    <label for="">
                                    <input type="radio"
                            name="option10"
                            value="Strongly Agree"
                            class="inputRadio"
                            > 3
                        </label>
                                </td>
                                <td>
                             <label for="">
                            <input type="radio"
                            name="option10"
                            value="Agree"
                            class="inputRadio"
                            >4
                        </label>
                                </td>
                            </tr>
                        </table>    
                    </div> 
                     
                     <div class="form-group">
                        <p  id="ques">Comments:</p>
                        <textarea name="Comment_2"
                        id="Comment_2" cols="10" rows="3"
                        class="textarea">
                            
                        </textarea>
                     </div>
                     <div class="form-group">
                        <table>
                     <tr>
                                <td>
                                    <p  id="ques">D. The hands on session were useful learning experiences</p>
                                </td>
                                <td>
                                    <label for="">
                            <input type="radio"checked
                            name="option11"
                            value="Strongly Disagree"
                            class="inputRadio"
                            >1
                        </label>
                                </td>
                                <td>
                                    <label for="">
                                    <input type="radio"
                            name="option11"
                            value="Disagree"
                            class="inputRadio"
                            >2
                        </label>
                                </td>
                                <td>
                                    <label for="">
                                    <input type="radio"
                            name="option11"
                            value="Strongly Agree"
                            class="inputRadio"
                            > 3
                        </label>
                                </td>
                                <td>
                             <label for="">
                            <input type="radio"
                            name="option11"
                            value="Agree"
                            class="inputRadio"
                            >4
                        </label>
                                </td>
                            </tr>
                            </table>
                        </div>

                            
                     
                     
                     <div class="form-group">
                        <p  id="ques">Comments:</p>
                        <textarea name="Comment_3"
                        id="Comment_3" cols="10" rows="5"
                        class="textarea">
                            
                        </textarea>
                     </div>

                    <div class="form-group"> 
                    <table>
                    <tr>
                                <td>
                                    <p  id="ques">E. Teaching Faculty</p>
                                </td>
                                <td>
                                    <label for="">
                            <input type="radio"checked
                            name="option12"
                            value="Strongly Disagree"
                            class="inputRadio"
                            >1
                        </label>
                                </td>
                                <td>
                                    <label for="">
                                    <input type="radio"
                            name="option12"
                            value="Disagree"
                            class="inputRadio"
                            >2
                        </label>
                                </td>
                                <td>
                                    <label for="">
                                    <input type="radio"
                            name="option12"
                            value="Strongly Agree"
                            class="inputRadio"
                            > 3
                        </label>
                                </td>
                                <td>
                             <label for="">
                            <input type="radio"
                            name="option12"
                            value="Agree"
                            class="inputRadio"
                            >4
                        </label>
                                </td>
                            </tr>
                        </table>    
                    </div> 
                     
                     <div class="form-group">
                        <p  id="ques">Comments:</p>
                        <textarea name="Comment_4"
                        id="Comment_4" cols="10" rows="5"
                        class="textarea">
                            
                        </textarea>
                     </div>
                     <div class="form-group">
                        <table>
                    
                    <tr>
                                <td>
                                    <p  id="ques">F. Lab Faculty</p>
                                </td>
                                <td>
                                    <label for="">
                            <input type="radio"checked
                            name="option13"
                            value="Strongly Disagree"
                            class="inputRadio"
                            >1
                        </label>
                                </td>
                                <td>
                                    <label for="">
                                    <input type="radio"
                            name="option13"
                            value="Disagree"
                            class="inputRadio"
                            >2
                        </label>
                                </td>
                                <td>
                                    <label for="">
                                    <input type="radio"
                            name="option13"
                            value="Strongly Agree"
                            class="inputRadio"
                            > 3
                        </label>
                                </td>
                                <td>
                             <label for="">
                            <input type="radio"
                            name="option13"
                            value="Agree"
                            class="inputRadio"
                            >4
                        </label>
                                </td>
                            </tr>
                        </table>    
                    </div> 
                     
                     <div class="form-group">
                        <p  id="ques">Comments:</p>
                        <textarea name="Comment_5"
                        id="Comment_5" cols="10" rows="3"
                        class="textarea">
                            
                        </textarea>
                     </div>
                     <div class="form-group">
                        <p  id="ques">Mention your suggestion for improvement of the training:</p>
                        <textarea name="feedback"
                        id="feedback" cols="10" rows="5"
                        class="textarea">
                            
                        </textarea>
                     </div>
                     <div class="form-group">
                        <p  id="ques">General Observation:</p>
                        <textarea name="observation"
                        id="observation" cols="10" rows="5"
                        class="textarea">
                            
                        </textarea>
                     </div>

                   <div class="form-group" style="text-align: center;">
    <button type="submit" id="submit" class="btn" name="submit" onclick="redirectToNextPage()">Submit</button>
</div>
                     
                    









            </form>
        </div>
    </body>
    </html>
   