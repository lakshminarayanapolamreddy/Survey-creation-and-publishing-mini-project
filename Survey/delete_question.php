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


$sql = "DELETE FROM questions WHERE question = ? AND type = ?";
$stmt = mysqli_prepare($conn, $sql);


mysqli_stmt_bind_param($stmt, "ss", $question, $type);
if (mysqli_stmt_execute($stmt)) 
{
    
    header('Location:survey.php');
}
else 
{
    
    echo "Error deleting the survey question.".mysqli_error($conn);
}


mysqli_close($conn);
?>