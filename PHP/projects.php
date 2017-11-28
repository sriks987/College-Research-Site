<?php
  session_start();
  $servername="localhost";
  $user = "root";
  $password = "sri@123";
  $username = $_SESSION["username"];
  echo $username;

  $conn = new mysqli($servername, $user, $password);
  if ($conn->connect_error)
  {
    die("Connection failed: ".$conn->connect_error);
  }
  $myQ = "USE researchSite";
  $conn->query($myQ);
  $myQ = "SELECT projectname FROM projectuser WHERE username='$username'";
  $result = $conn->query($myQ);
  //var_dump($conn->error);
  //var_dump($result);
  $k=0;
  $list=[];
  if($result->num_rows > 0)
    while($row = $result->fetch_assoc()){
      $list[$k++] = $row["projectname"];
      var_dump($row["projectname"]);
    }
      //var_dump($row["projectname"]);

  $conn->close();
?>


<html>
  <head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
    function showProject(x)
      {
         var theform = document.getElementById("mainform");
         var choice = document.createElement("input");
         choice.setAttribute("type","hidden");
         choice.setAttribute("name","uname");
         choice.setAttribute("value",x);
         var sub = document.createElement("input");
         sub.setAttribute("type","submit");
         var z = document.createElement("div");
         var a = document.createElement("h3");
         a.textContent = x;
         z.appendChild(a);
         theform.appendChild(choice);
         theform.appendChild(sub);
         z.appendChild(theform);
         document.body.appendChild(z);
       }
    </script>
  </head>
  <body>
     <form method="post" id="mainform" action="projectmodify.php">
      <script>
       var listy = <?php echo json_encode($list); ?>;
       for(var i=0;i<listy.length;i++)
          showProject(listy[i]);
      </script>
    </form>
  </body>
</html>
