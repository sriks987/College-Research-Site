<?php
    session_start();
    $servername = "localhost";
    $user = "root";
    $pass = "sri@123";
    $dir = "../uploads/projects/";
    $username = $_SESSION["username"];
    extract($_POST);
    $target_path = $dir.$title.".php";
    $fptr = fopen("$target_path","w") or die("unable to open the file");
    fwrite($fptr, $myTextArea);
    fclose($fptr);
    $conn = new mysqli($servername, $user, $pass);
    if ($conn->connect_error)
    {
      die("Connection failed: ".$conn->connect_error);
    }
  	$query = "USE researchSite";
  	$conn->query($query);
    $query = "UPDATE users SET resumepath = '$target_path' WHERE username = '$username'";
    $conn->close();
    header('Location:dash2.php');
?>
