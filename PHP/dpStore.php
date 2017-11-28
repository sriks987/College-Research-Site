<?php
  session_start();
  $username = $_SESSION["username"];
  $target_dir = "../uploads/profilepics/";
  $target_file = $target_dir.$_FILES["dp"]["name"];
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"]))
  {
      $check = getimagesize($_FILES["dp"]["tmp_name"]);
      if($check !== false)
        {
          echo "File is an image - ".$check["mime"] . ".";
          $uploadOk = 1;
        }
        else
        {
          echo "File is not an image.";
          $uploadOk = 0;
        }
  }
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
  {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
  }
  else
  {
      if (move_uploaded_file($_FILES["dp"]["tmp_name"], $target_file))
      {
          echo "The file ". basename( $_FILES["dp"]["name"]). " has been uploaded.";
      }
      else
      {
          echo "Sorry, there was an error uploading your file.";
      }
  }
  $servername = "localhost";
	$user = "root";
	$pass = "sri@123";
  $conn = new mysqli($servername, $user, $pass);
	if ($conn->connect_error)
	{
    die("Connection failed: ".$conn->connect_error);
  }
  $path = $target_file;
	$query = "USE researchSite";
	$conn->query($query);
  $query = "UPDATE users SET imagepath='$path' WHERE username = '$username'";
  $conn->query($query);
  $conn->close();
  header("Location:dashBoard.php");
?>
