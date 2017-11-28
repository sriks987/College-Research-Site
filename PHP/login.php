<?php
	$servername = "localhost";
	$user = "root";
	$pass = "sri@123";
	extract($_POST);
	$username = test_input($username);
	$password = test_input($password);
	$conn = new mysqli($servername, $user, $pass);
	if ($conn->connect_error)
	{
    die("Connection failed: ".$conn->connect_error);
  }
	$query = "USE researchSite";
	$conn->query($query);
	$query = "SELECT password FROM users WHERE username='$username'";
	$result = $conn->query($query);
  $conn->close();
  if ($result->num_rows > 0)
  {
    $data = $result->fetch_assoc();
    if ($data['password'] == $password)
    {
      session_start();
  		$_SESSION["username"] = $username;
  		header("Location:dash2.php");
    }
  }
  else echo "invalid";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
?>
