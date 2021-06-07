<?php

include "config.php";
	if (isset($_GET['id'])) {
		$user_id = $_GET['id'];

		$sql = "DELETE FROM `users` WHERE `id`='$user_id'";

		$result = $conn->query($sql);

		if($result == TRUE){
			echo "Record Deleted!";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<a href="view.php">View Results</a>
</body>
</html>