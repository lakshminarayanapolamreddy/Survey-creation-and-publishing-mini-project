<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'drafts_db';
$conn = mysqli_connect($servername, $username, $password, $database);
echo "<h3>Preview</h3>";
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$var = $_GET['data'];
echo $var;  
$sql = "SELECT * FROM $var";

$result = $conn->query($sql);


if ($result->num_rows > 0) 
{
	echo "<form method = 'post' action = 'publish_draft.php'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div style='display: flex; align-items: center; justify-content: space-between;'>";
        echo "<input type='hidden' name='question' value='" . $row['question'] . "'>";
        echo $row['question'];
        echo "<input type='hidden' name='type' value='" . $row['type'] . "'>";
        echo "</div>";
    }
	echo"<button type = 'submit'>Publish</button>";
	echo "</form>";
}

$conn->close();
?>