<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dname="feedback";

    $conn=mysqli_connect($servername,$username,$password,$dname);
    if($conn){
    	echo"connection ok";
    }
    else
    {
    	echo"connection fail".mysqli_connect_error();
    }
?>