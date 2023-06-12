<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'user_details';
$Conn = mysqli_connect($servername, $username, $password, $database);
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'published';
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

// Execute the select query
$result = $Conn->query($selectQuery);

// Check if there are rows returned
if ($result->num_rows > 0) {
    // Loop through each row of the result set
    while ($row = $result->fetch_assoc()) {
        // Extract the values from the row
        $column1 = $row['question'];
        $column2 = $row['type'];
        

        // SQL query to insert data into destination table
        $insertQuery = "INSERT INTO $d(question, type) VALUES ('$column1', '$column2')";

        // Execute the insert query
        $Conn1->query($insertQuery);
    }

    echo "Survey Published Succesfully";
} else {
    echo "Publishing of survey failed";
}


$Conn->close();
$Conn1->close();


?>
