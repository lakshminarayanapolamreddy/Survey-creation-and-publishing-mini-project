<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'drafts_db';
$conn = mysqli_connect($servername, $username, $password, $database);
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'published';
$conn1 = mysqli_connect($servername, $username, $password, $database);
$var = $_GET['data'];
echo $var;  
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
if (!$conn1) 
{
    die("Connection failed: " . mysqli_connect_error());
}
$selectQuery = "SELECT * FROM $var";

$result = $conn->query($selectQuery);
if (!$result) {
    die("Error selecting data from source table: " . $Conn->error);
}

$createTableQuery = "CREATE TABLE IF NOT EXISTS $var(question varchar(300), type varchar(20))";

if (!$conn1->query($createTableQuery)) {
    die("Error creating destination table: " . $conn1->error);
}

$selectQuery = "SELECT * FROM $var";

// Execute the select query
$result = $conn->query($selectQuery);

// Check if there are rows returned
if ($result->num_rows > 0) {
    // Loop through each row of the result set
    while ($row = $result->fetch_assoc()) {
        // Extract the values from the row
        $column1 = $row['question'];
        $column2 = $row['type'];
        

        // SQL query to insert data into destination table
        $insertQuery = "INSERT INTO $var(question, type) VALUES ('$column1', '$column2')";

        // Execute the insert query
        $conn1->query($insertQuery);
    }

    echo "Survey Published Succesfully";
} else {
    echo "Publishing of survey failed";
}
$sql = "DROP table $var";
if ($conn->query($sql) === TRUE) {
    echo "Draft published to surveys successfully";
} else {
    echo "Publishing the draft to surveys failed " . $conn->error;
}


$conn->close();
$conn1->close();
?>