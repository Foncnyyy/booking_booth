<?php
    session_start(); 
    date_default_timezone_set("Asia/Bangkok");
    $serverName = "localhost";
    $userName = "root";
    $userPassword = "";
    $dbName = "db_BookingBooth";

    $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName) or die("Error: " . mysqli_error($con));
            mysqli_query($conn, "SET NAMES 'utf8' "); 
?>