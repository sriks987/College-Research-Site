<?php
  session_start();
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
	$query = "SELECT resumepath FROM users WHERE username = 'check'";
  $result = $conn->query($query);
  $conn->close();
  if ($result->num_rows > 0)
    $row = $result->fetch_assoc();
  $path = $row["projectpath"];
?>

<html>
  <head>
    <title>Display</title>
  </head>
  <body style="background-image:url('../images/pro1.jpg')">
  <a href="dash2.php">HOME</a>
  <div>
    <p>
      <?php echo file_get_contents($path); ?>
    </p>
  </body>
</html>
