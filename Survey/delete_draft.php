<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'drafts_db';
$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$var1 = $_GET['data'];
echo $var1;  
$sql = "DROP TABLE $var1";

if ($conn->query($sql) === TRUE) {
    
	header('Location:display_drafts.php');
	echo "Draft deleted successfully";
} else {
    echo "Draft deletion failed " . $conn->error;
}
mysqli_close($conn);

?>