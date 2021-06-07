<?php
	include "config.php";

	if(isset($_POST['update'])){
			$firstname = $_POST['firstname'];
			$user_id = $_POST['user_id'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$gender = $_POST['gender'];

			$sql = "UPDATE `users` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`password`='$password',`gender`='$gender' WHERE `id` = '$user_id'";

			$result = $conn->query($sql);

			if($result == TRUE){
				// echo "Record update successful!";
				header('location: view.php');
				die();
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	if (isset($_GET['id'])){
		$user_id = $_GET['id'];

		$sql = "SELECT * FROM `users` WHERE `id` = '$user_id'";

		$result = $conn->query($sql);

		if($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) {
				$firstname = $row['firstname'];
				$lastname = $row['lastname'];
				$email = $row['email'];
				$password = $row['password'];
				$gender = $row['gender'];
				$id = $row['id'];
			}
		?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="styles.css">
		<title>Update</title>
	</head>
		<body>
			<h2>Update user form</h2>
			<form action="" method="POST">
					<label for="firstname">First Name</label>
					<input type="text" name="firstname" value="<?php echo $firstname; ?>">
					<input type="hidden" name="user_id" value="<?php echo $id; ?>">

					<label for="lastname">Last Name</label>
					<input type="text" name="lastname" value="<?php echo $lastname; ?>">
					
					<label for="email">Email</label>
					<input type="text" name="email" value="<?php echo $email; ?>">

					<label for="password">Password</label>
					<input type="password" name="password" value="<?php echo $password; ?>">
					
					<label for="gender">Gender</label>
					<input type="radio" name="gender" value="male" <?php if($gender == 'male'){ echo "checked";} ?>>Male
					<input type="radio" name="gender" value="female" <?php if($gender == 'female'){ echo "checked";} ?>>Female
					
					<input type="submit" value="Update" name="update">
					<a href="view.php">View Profiles</a>
			</form>
		</body>
	</html>
	<?php 
				} else {
					header("Location: view.php");
				}
			}
	?>
