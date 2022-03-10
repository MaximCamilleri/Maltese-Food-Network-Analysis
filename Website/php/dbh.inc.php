<?php
// server information 
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "maltese_food_analysis";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

//failsafe if the connection fails
if(!$conn){
    die("Connection failed: ". mysqli_connect_error());
}
   
?>