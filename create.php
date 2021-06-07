<?php
include "config.php";
	
	if(isset($_POST['submit'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$gender = $_POST['gender'];

		$sql = "INSERT INTO `users`(`firstname`,`lastname`,`email`,`password`,`gender`) values ('$firstname','$lastname','$email','$password','$gender')";

		$result = $conn->query($sql);

		if($result == TRUE){
			header('location: view.php');
		} else {
			echo "Error: " . $sql ."<br>". $conn->error;
		}
		$conn->close();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Create</title>
	<link rel="stylesheet" href="styles.css">
</head>
	<body>
	<h2>Profile Information</h2>
	<form action="" method="POST">
		<label for="firstname">First Name</label>
		<input type="text" name="firstname">

		<label for="lastname">Last Name</label>
		<input type="text" name="lastname">
		
		<label for="email">Email</label>
		<input type="text" name="email">

		<label for="password">Password</label>
		<input type="password" name="firstname">

		<label for="gender">Gender</label>
		<input type="radio" name="gender" value="male">Male
		<input type="radio" name="gender" value="female">Female
		
		<input type="submit" value="submit" name="submit">
		<a href="view.php">View Profiles</a>
	</form>

	</body>
</html>