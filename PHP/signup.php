<?php
	$servername = "localhost";
	$user = "root";
	$pass = "sri@123";
	extract($_POST);
	$conn = new mysqli($servername, $user, $pass);
	if ($conn->connect_error)
	{
    die("Connection failed: ".$conn->connect_error);
  }
	$query = "USE researchSite";
	$conn->query($query);
	$result = $query = "SELECT email FROM users WHERE username = $username";
  if ($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();
		if ($row == $email)
		{
			$existserr = "Account already exists";
		}
		else
		$existserr = "This username is already taken";
		header("Location:../HTML/signup.html");
	}
	else
	{
		$query = "INSERT INTO users (username, email, fullname, password) VALUES ('$username','$email','$fullname','$password')";
		$conn->query($query);
		$conn->close();
		session_start();
		$_SESSION["username"] = $username;
		header("Location:dash2.php");
  }
?>
