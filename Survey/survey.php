
<?php
header("refresh: 4;");

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'user_details';

echo "<h3>Preview</h3>";
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}



$sql = "SELECT * FROM questions";
$result = $conn->query($sql);


if ($result->num_rows > 0) 
{
    while ($row = $result->fetch_assoc()) {
        echo "<form method='post' action='delete_question.php'>";
        echo "<div style='display: flex; align-items: center; justify-content: space-between;'>";
        echo "<input type='hidden' name='question' value='" . $row['question'] . "'>";
        echo $row['question'];
        echo "<input type='hidden' name='type' value='" . $row['type'] . "'>";
        echo "<button class='submit' type='submit'>Delete</button>";
        echo "</div>";
        echo "</form>";

		
    }
}

$conn->close();
?>
