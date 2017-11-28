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
  $query = "SELECT username FROM users";
  $result = $conn->query($query);
  $k=0;
  if ($result->num_rows > 0)
  {
    while($row = $result->fetch_assoc()){
      $list[$k++] = $row["username"];
    }
  }
  $conn->close();
?>

<html>
    <head>
      	<title>Login Page</title>
    	<link rel="stylesheet" href="../CSS/users.css">
        <script>
                function showUser(x)
      {
         var theform = document.getElementById("mainform");
         var choice = document.createElement("input");
         choice.setAttribute("type","hidden");
         choice.setAttribute("name","uname");
         choice.setAttribute("value",x);
         var sub = document.createElement("input");
         sub.setAttribute("type","submit");
         sub.setAttribute("class","login_fields__submit");
         sub.setAttribute("value","show");
         theform.appendChild(choice);
         theform.appendChild(sub);
         var d1 = document.createElement("div")
         d1.setAttribute("class","login_fields__user")
         var p = document.querySelector(".login_fields")
         var user = document.createElement("p")
         user.innerHTML = x;
         d1.appendChild(user)
         d1.appendChild(sub)
         p.appendChild(d1)

       }
        </script>
    </head>
    <body>
    	<div class='login'>
    		<div class='login_title'>
    			<span><img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/user_icon_copy.png'>&nbsp&nbsp User List &nbsp</span>
    	  	</div>
                <form id="mainform" action="dashother.php" method="post">
                  	<div class='login_fields'>
	                  	<script>
                      var listy = <?php echo json_encode($list); ?>;
                      for(var i=0;i<listy.length;i++)
                         showUser(listy[i]);
                      </script>

                        </div>
                </form>
    	</div>
    </body>
</html>
