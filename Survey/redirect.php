<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$inputText = $_POST['title'];
	
  if (isset($_POST['Draft'])) {
    // Redirect to page 1
    header("Location: Drafts1.php?title=" . urlencode($inputText));
    exit;
  } elseif (isset($_POST['Survey'])) {
    
    header("Location: published.php?title=" . urlencode($inputText));
    exit;
  }
}
?>
