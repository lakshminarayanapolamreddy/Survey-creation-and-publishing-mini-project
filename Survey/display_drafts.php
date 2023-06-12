<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'drafts_db';
$Conn = mysqli_connect($servername, $username, $password, $database);
$sql = "SHOW TABLES";
$result = $Conn->query($sql);

if ($result->num_rows > 0) {
	echo"<table style = 'border: 1px solid black;'>";
	echo"<tr style = 'border: 1px solid black;'><th style = 'border: 1px solid black;'>Survey name</th>";
	echo"<th style = 'border: 1px solid black;'>Published by</th>";
	echo"<th style = 'border: 1px solid black;'>action</th></tr>";
    while ($row = $result->fetch_assoc()) {
		
		$dn = $row['Tables_in_' . $database];
		echo"<form method = 'POST' action = 'redirect1.php'>";
		
        echo "<tr style = 'border: 1px solid black;'><td style = 'border: 1px solid black;'>" . $dn. "</td>";
		echo"<td style = 'border: 1px solid black;'>Admin</td>";
		echo"<td style = 'border: 1px solid black;'><button style = 'cursor:pointer' type = 'submit' value = $dn name = 'Publish'>Publish Survey</button>";
		echo"<button style = 'cursor:pointer' type = 'submit' value = $dn name = 'Preview'>Publish Survey</button>";
		echo"<button style = 'cursor:pointer' type = 'submit' value = $dn name = 'Delete'>Delete draft</button><td></tr>";
		echo"</form>";
		
    }
	echo"</table><br>";
} else {
    echo "No tables found.";
}
echo"Click here to go to Home page<a href = 'Admin Home.html'><button style='cursor:pointer'>Home</button></a><br><br>";

?>
