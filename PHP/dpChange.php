<?php
    session_start();
?>

<html>

  <head>
  <style type='text/css'>
  %test 
{
  position: absolute;
	content: '';
	transition: all .5s;
}

	  .myButton {
		-moz-box-shadow:inset 0px 1px 0px 0px #a4e271;
		-webkit-box-shadow:inset 0px 1px 0px 0px #a4e271;
		box-shadow:inset 0px 1px 0px 0px #a4e271;
		background-color:transparent;
		-moz-border-radius:6px;
		-webkit-border-radius:6px;
		border-radius:6px;
		border:1px solid #74b807;
		display:inline-block;
		cursor:pointer;
		color:#ffffff;
		font-family:Arial;
		font-size:15px;
		font-weight:bold;
		padding:23px 43px;
		text-decoration:none;
		text-shadow:0px 1px 0px #528009;
	}
	.myButton:hover {
		background-color:#74b807;
	}
	.myButton:active {
		position:relative;
		top:1px;
	}




  </style>
  </head>
  <body style="background-color:#772953">
    <form method="post" action="dpStore.php" enctype="multipart/form-data">
      <input type="file" name="dp" id="dp" class="myButton" style="margin-left:500px;margin-top:100px">
	  &nbsp&nbsp&nbsp
      <input type="submit" value="confirm" name="submit" class="myButton" style="align:center;">
    </form>
  </body>
</html>
