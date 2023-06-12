<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["Publish"])) {
    $data = $_POST["Publish"];
    header("Location:publish_draft.php?data=" . urlencode($data) );
    exit;
  } 
  elseif (isset($_POST["Preview"])) {
    $data = $_POST["Preview"];
	header("Location:preview_draft.php?data=" . urlencode($data));
	exit;
  }
  elseif (isset($_POST["Delete"])) {
    $data = $_POST["Delete"];
	header("Location:delete_draft.php?data=" . urlencode($data));
	exit;
  }
}
?>
