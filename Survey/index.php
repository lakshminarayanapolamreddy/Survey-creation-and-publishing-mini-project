<?php

session_start();

if(!$_SESSION['au']){
	header('location:Login.html');
}
else{
	echo "<h3 align = 'center'>Welcome</h3>";
	echo"click here to see the published surveys<a href = userside_published_surveys.php><button style = 'cursor:pointer'>Surveys</button>";
	
}


?>
