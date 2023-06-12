<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'published';
$Conn = mysqli_connect($servername, $username, $password, $database);
$sql = "SHOW TABLES";
$result = $Conn->query($sql);

if ($result->num_rows > 0) {
	echo"<table style = 'border: 1px solid black;'>";
	echo"<tr style = 'border: 1px solid black;'><th style = 'border: 1px solid black;'>Survey name</th>";
	echo"<th style = 'border: 1px solid black;'>Published by</th>";
	
    while ($row = $result->fetch_assoc()) {
		echo"<form method = 'POST' action = 'redirect1.php'>";
        echo "<tr style = 'border: 1px solid black;'><td style = 'border: 1px solid black;'>" . $row['Tables_in_' . $database] . "</td>";
		echo"<td style = 'border: 1px solid black;'>Admin</td></tr>";
		
		echo"</form>";
    }
	echo"</table><br>";
} else {
    echo "<h4 style = 'color:red'>No surveys published  yet.</h4>";
}
echo"Click here to go to Home page<a href = 'Admin Home.html'><button style='cursor:pointer'>Home</button></a><br><br>";
echo"Click here to go to drafts page<a href = 'display_drafts.php'><button style='cursor:pointer'>Drafts</button></a>";


?>
