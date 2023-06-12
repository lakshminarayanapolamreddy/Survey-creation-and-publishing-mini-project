<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'user_details';
$Conn = mysqli_connect($servername, $username, $password, $database);
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'Drafts_db';
$Conn1 = mysqli_connect($servername, $username, $password, $database);
if (!$Conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
if (!$Conn1) 
{
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_GET['title'])) {
    $d = $_GET['title'];
	
}
$selectQuery = "SELECT * FROM questions";

$result = $Conn->query($selectQuery);
if (!$result) {
    die("Error selecting data from source table: " . $Conn->error);
}

$createTableQuery = "CREATE TABLE IF NOT EXISTS $d(question varchar(300), type varchar(20))";

if (!$Conn1->query($createTableQuery)) {
    die("Error creating destination table: " . $Conn1->error);
}

$selectQuery = "SELECT * FROM questions";

$result = $Conn->query($selectQuery);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $column1 = $row['question'];
        $column2 = $row['type'];
        

        $insertQuery = "INSERT INTO $d(question, type) VALUES ('$column1', '$column2')";

        $Conn1->query($insertQuery);
    }

    echo "Successfully saved to drafts";
} else {
    echo "Saved as draft. but no ques in the saved draft";
}


$Conn->close();
$Conn1->close();


?>
