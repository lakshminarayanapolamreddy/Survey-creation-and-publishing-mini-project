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
$em = $_POST["emailid"];
$pasw = $_POST["passwords"];


$q = "UPDATE `user` SET `password`='$pasw' WHERE email='$em'";
if(mysqli_query($con,$q))
	echo"successfully updated";
else
	echo"udpadatind Unsuccessful".mysqli_error($con);

mysqli_close($con);
?>

