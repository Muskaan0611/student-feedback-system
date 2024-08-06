<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
   <link rel="stylesheet" href="login.css">
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
        <h2>Admin Login</h2>
        <div class="form-group">
            <label for="username">Admin:</label>
            <input type="text" id="username" name="username" required>
        </div>
         <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="button" onclick="login()">Login</button>
        
    </div>
    
    <script>
        function login() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            // Check if username and password match
            if (username === "admin" && password === "123") {
                window.location.href = "reportpage.php";
                // Redirect to dashboard or perform other actions
            } else {
                alert("Incorrect username or password. Please try again.");
            }
        }
         document.getElementById("password").addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                login();
            }
        });
    </script>
</body>
</html>
