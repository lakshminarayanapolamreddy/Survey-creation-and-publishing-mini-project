<?php


$servername = "localhost";
$us = "root";
$ps = "";
$db = "user_details";
$con = mysqli_connect("$servername","$us","$ps","$db");
if($con == false)
	die("CONNECTION FAILED".mysqli_connect_error());
else
	echo"<h2>Successfully Connected</h2>";
$un = $_POST["usernames"];
$em = $_POST["emailid"];
$pasw = $_POST["passwords"];


$q = "INSERT INTO user(username, email, password) VALUES('$un','$em','$pasw')";
if(mysqli_query($con,$q))
	echo"Successfully Registered";
else
	echo"Registration Unsuccessful".mysqli_error($con);

mysqli_close($con);
?>

