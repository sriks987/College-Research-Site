<?php
  session_start();
  $uname = $_POST["uname"];
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
  $query = "INSERT INTO projectuser VALUES ('$uname','$project')";
  $conn->query($query);
  $conn->close();
  header('Location:dash2.php');
?>
