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
$query = "SELECT question FROM questions";
$result = mysqli_query($connection, $query);
echo"<form method = 'post' action = 'responses.php'>";
 while ($row = mysqli_fetch_assoc($result)) {
    $questionText = $row['question'];
	echo "<div style='align-items: center; justify-content: space-between;'><br>";
	if($questionText === "What is the name of your mentor?"){
		echo"<label>$questionText</label><br>";
		echo"<input type = 'radio' name = 'ans'>Shirpi<br>";
		echo"<input type = 'radio' name = 'ans'>Danger<br>";
	}elseif($questionText ==='What is the name of your project?'){
		echo"<label>$questionText</label><br>";
		echo"<input type = 'text' name = 'ans' required / ><br>";
	}
	elseif($questionText ==='when did the project assign?'){
		echo"<label>$questionText</label><br>";
		echo"<input type = 'date' name = 'ans'><br>";
	}elseif($questionText ==='When is the due date for your project?'){
		echo"<label>$questionText</label><br>";
		echo"<input type = 'date' name = 'ans'><br>";
	}elseif($questionText ==='How many hours do you work in a day?'){
		echo"<label>$questionText</label><br>";
		echo"<input type = 'number' max = '24' name = 'ans'><br>";
	}elseif($questionText ==='Is your mentor conducting Scrum meetings thrice a week?'){
		echo"<label>$questionText</label><br>";
		echo"<input type = 'radio' name = 'ans'>Yes<br>";
		echo"<input type = 'radio' name = 'ans'>No<br>";
	}elseif($questionText ==='Did your mentor explained you what the project about?'){
		echo"<label>$questionText</label><br>";
		echo"<input type = 'radio' name = 'ans'>Yes<br>";
		echo"<input type = 'radio' name = 'ans'>No<br>";
	}elseif($questionText ==='Is your mentor solving your doubts in the scrum meetings?'){
		echo"<label>$questionText</label><br>";
		echo"<input type = 'radio' name = 'ans'>Yes<br>";
		echo"<input type = 'radio' name = 'ans'>No<br>";
	}elseif($questionText ==='How do you rate your mentor out of 10?'){
		echo"<label>$questionText</label><br>";
		echo"<input type = 'number' max = '10' name = 'ans'><br>";
	}elseif($questionText ==='Have you planned how to complete your project into different tasks?'){
		echo"<label>$questionText</label><br>";
		echo"<input type = 'radio' name = 'ans'>Yes<br>";
		echo"<input type = 'radio' name = 'ans'>No<br>";
	}elseif($questionText ==='How much percentage of project you have completed so far?'){
		echo"<label>$questionText</label><br>";
		echo"<input type = 'number' max = '100' name = 'ans'><br>";
	}elseif($questionText ==='3.when did the project assign?'){
		echo"<label>$questionText</label><br>";
		echo"<input type = 'date' name = 'ans'><br>";
	}elseif($questionText ==='Will you complete your project on or before the due date?'){
		echo"<label>$questionText</label><br>";
		echo"<input type = 'radio' name = 'ans'>Yes<br>";
		echo"<input type = 'radio' name = 'ans'>No<br>";
	}elseif($questionText ==='How many tasks does your project contain?'){
		echo"<label>$questionText</label><br>";
		echo"<input type = 'number' max = '50' name = 'ans'><br>";
	}elseif($questionText ==='How many days does it take to complete a single task?'){
		echo"<label>$questionText</label><br>";
		echo"<input type = 'number' name = 'ans'><br>";
	}elseif($questionText ==='Is the given time to complete your project is sufficient?'){
		echo"<label>$questionText</label><br>";
		echo"<input type = 'radio' name = 'ans'>Yes<br>";
		echo"<input type = 'radio' name = 'ans'>No<br>";
	}	
	echo"</div>";
	
}
echo"<button type = 'submit' value = 'Submit'>Submit</button>";
echo"</form>";
$connection->close();

?>