<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_details";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$question = $_POST['question'];
$type = $_POST['type'];

$sql = "INSERT INTO questions(question, type) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "ss", $question, $type);
if (mysqli_stmt_execute($stmt)) 
{
    header('Location:Admin Home.html');
} 
else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>