<?php
	$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'user_details';


$connection = mysqli_connect($servername, $username, $password, $database);


if (!$connection) 
{
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT username FROM user";
$result = $connection->query($sql);
echo"<h3>Select user to publish the survey</h3>";
if ($result->num_rows > 0) {
	echo"<form method = 'POST' action = '#'>";
    while ($row = $result->fetch_assoc()) {
        echo "<input type = 'checkbox'>" . $row["username"] . "<br>";
    }
	echo"<button type = 'submit' value = 'submit'>Publish</button>";
	echo"</form>";
}
$connection->close();

?>