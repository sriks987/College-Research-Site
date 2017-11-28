<?php
  session_start();
  $servername = "localhost";
  $user = "root";
  $password = "sri@123";
  $username = $_SESSION["username"];
  $conn = new mysqli($servername, $user, $password);
  if ($conn->connect_error)
  {
    die("Connection failed: ".$conn->connect_error);
  }
  $myQ = "USE researchSite";
  $conn->query($myQ);
  $myQ = "SELECT * FROM users WHERE username = '$username'";
  $result = $conn->query($myQ);
  if($result->num_rows > 0)
    $row = $result->fetch_assoc();
  $myQ = "SELECT projectname FROM projectuser WHERE username='$username'";
  $result = $conn->query($myQ);
  $k=0;
  $list=[];
  if($result->num_rows > 0)
    while($record = $result->fetch_assoc()){
      $list[$k++] = $record["projectname"];
    }
  $conn->close();
?>

<html>
<head>
  <title>DashBoard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../CSS/dashBoard.css">
  <link rel="stylesheet" type="text/css" href="../CSS/nav-bar.css">
  <link rel="stylesheet" type="text/css" href="../CSS/nav-bar2.css">
  <link rel="stylesheet" type="text/css" href="../CSS/tablebuttons.css">
  <script>
  function inviteuser()
  {
    var name = prompt("Enter the username of the person you want to invite");
    var theform = document.getElementById("inviteform");
    var user = document.createElement("input");
    var project = document.createElement("input");
    project.setAttribute("type","text");
    project.setAttribute("name","project");
    project.setAttribute("value",this.parentNode.firstChild.textContent);
    user.setAttribute("type","text");
    user.setAttribute("name","uname");
    user.setAttribute("value",name);
    theform.appendChild(user);
    theform.appendChild(project);
    theform.submit();
  }
  function showProject(x)
    {
       var thetable = document.getElementById("projectlist");
       var row = document.createElement("tr");
       var data = document.createElement("td");
       var theform = document.getElementById("mainform");
       var choice = document.createElement("input");
       var invite = document.createElement("input");
       invite.setAttribute("type","button");
       invite.setAttribute("value","invite");
       invite.setAttribute("class","btn");
       invite.onclick = inviteuser;
       choice.setAttribute("type","hidden");
       choice.setAttribute("name","uname");
       choice.setAttribute("value",x);
       var sub = document.createElement("input");
       sub.setAttribute("type","submit");
       sub.setAttribute("value","open");
       sub.setAttribute("class","btn");
       var z = document.createElement("div");
       var a = document.createElement("h3");
       a.textContent = x;
       z.appendChild(a);
       theform.appendChild(choice);
       theform.appendChild(sub);
       z.appendChild(choice);
       z.appendChild(sub);
       z.appendChild(invite);
       data.appendChild(z);
       row.appendChild(data);
       thetable.appendChild(row);
     }
  </script>
</head>
<body class="dashBoard" background-color=black>
    <div>  <!--incomplete-->
    <ul>
        <li>
            <div class="dropdown">
              Projects
              <div class="dropdown-content">
                <a href="ai.php">AI</a>
                <a href="net.php">Networking</a>
                <a href="ds.php">Data Structures</a>
                <a href="bd.php">Big data</a>
              </div>
            </div>
        </li>
        <li><a href="users.php">Users</a></li>
        <li><div align=center onclick="location.href='signout.php'">signout</div></li>
    </ul>
  </div>
  <table width=100%>
  <tr>
    <td>
  <div class="card" style="text-align: center;" >
    <div class="container" width=400px>
      <div style="position: relative; top: 10px; left: 10px; width: 30%;">
        <img src="<?php echo $row['imagepath']; ?>" alt="No Image available" class="profilePic" width=175px height=200px>
        <div class="overlay" width=175px>
          <button class = "buttonDetails" onclick="location.href='dpChange.php'">update dp</button>
        </div>
      </div>
    </div>
    <div class="profile">
      <h2><?php echo $row["fullname"]; ?></h2>
      <p style="font-size:15;color:grey" >student at pes university</p>
      <p><button class="contact" onclick="location.href='resume.php'">Resume</button></p>
    </div>
  </div>
</td>
<td>
  <div class="myprojects" width=40% style="margin-left:0px;padding-left:0px;float:left;">
    <button class = "buttonDetails" onclick="location.href='editor.php'" style="float:right">new project</button>
    <br><br><br>
    <form method="post" id="mainform" action="projectmodify.php">
    <table id="projectlist">
       <script>
        var listy = <?php echo json_encode($list); ?>;
        for(var i=0;i<listy.length;i++)
           showProject(listy[i]);
       </script>
    </table>
  </form>
  </div>
</td>
</tr>
</table>
  <form method="post" id="inviteform" action="invite.php"></form>
</body>
</html>
