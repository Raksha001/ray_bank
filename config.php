<?php 
header('Access-Control-Allow-Origin: *'); 
error_reporting(0); 
        $servername = "127.0.0.1"; 
        $username = "root"; 
        $password = "root"; 
        $dbname = "sparksbankingsystem"; 
        $conn = new mysqli($servername, $username, $password, $dbname); 


    if(!$conn){
        die("Unable to connect to the database due to the following error --> ".mysqli_connect_error());
    }
?>