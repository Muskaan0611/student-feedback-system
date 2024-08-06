<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Dashboard</title>
    <style>
        /* Add your CSS styling here */
        body {
            font-family: Arial, sans-serif;
            margin: 0 50px;
            padding: 0;
            position: relative;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
            margin: 0 50px;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: red;
            color: black;
        }

        .logo {
            text-align: center;
            margin: 0 -80px;
        }

        .logo img {
            width: 87%;
            margin: 0 50px;
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
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            margin-left: auto;
            margin-right: auto;
            margin: 0 100px;
        }

        .container {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap; /* Allow boxes to wrap to the next line */
            gap: 100px 40px; /* Vertical gap between boxes, horizontal gap between horizontal boxes */
            margin-bottom: 20px;
        }


        .blurred-background {
            background-image: url('report.jpeg');
            position: fixed;
            top: 50px; /* Adjust to position the background below the navbar */
            left: 0;
            right: 0;
            bottom: 60px; /* Adjust to leave space for the footer */
            background-size: cover;
            background-position: center;
            filter: blur(4px); /* Adjust the blur intensity as needed */
            z-index: -1; /* Ensure it appears behind the content */
            margin: 0 100px;
        }

        .box {
            width: 300px; /* Increased box width */
            height: 150px; /* Fixed box height */
            background-color: #3498db;
            
            text-align: center;
            line-height: 150px; /* Adjusted line-height */
            font-size: 24px; /* Increased font size */
            color: black;
            transition: all 0.3s ease-in-out;
            cursor: pointer;
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px; /* Added margin-bottom for vertical spacing */
            font-weight: bold;
        }

        .box:hover:not(.no-hover-animation) {
            transform: scale(1.1);
        }

    </style>
</head>
<body>
    <div class="blurred-background"></div>
    <div class="navbar">
        <a href="dashboard1.php">Home</a>
    </div>
    <div class="logo">
        <img src="NielitHeader.jpg" alt="NIELIT Logo">
    </div>

    <div class="content">
        <h2>NIELIT Delhi Centre</h2>
    </div>
    <div class="container">
        <div class="box no-hover-animation">Student Report</div> <!-- Added class 'no-hover-animation' -->
    </div>
    <div class="container">
    <a href="faculty.php" class="box" style="background-color: lightskyblue;">Faculty-wise</a>
    <a href="coursewise.php" class="box" style="background-color: lightskyblue;">Course-wise</a>
    <a href="modulewise.php" class="box" style="background-color: lightskyblue;">Module-wise</a>
    
</div>


    <div class="footer">
        <p>राष्ट्रीय इलेक्ट्रॉनिकी एवं सूचना प्रौद्योगिकी संस्थान <br>
        National Institute of Electronics & Information Technology(NIELIT) <br>
        NIELIT Delhi Center, 2nd Floor, Parsvnath Metro Mall, Near Inderlok Metro Station, New Delhi, Delhi 110052, <br>
        Phone:- 91-11-2530 8300 Call Centre No.:- 011-25308303, Email:- contact[at]nielit[dot]gov[dot]in</p>
    </div>

</body>
</html>
