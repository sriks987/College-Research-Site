<?php
session_start();
echo $_SESSION["username"];
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
$query = "SELECT * FROM projectdetails WHERE projectname='$uname'";
$result = $conn->query($query);
$conn->close();
if ($result->num_rows > 0)
  $row = $result->fetch_assoc();
$path = $row["projectpath"];
$data = file_get_contents($path);
?>
<html>
    <head>
      <link rel="stylesheet" href="../CSS/editor.css">
      <script src="../scripts/editor.js">
      </script>
    </head>
    <body class="editor" onLoad="iFrameOn()" style="background-color:#2E1020;">
      <form action="../PHP/editor_store.php" name="myform" id="myform" method="post">
        <p>Enter Title:<input name="title" type="text" value="<?php echo $row['projectname'];?>" size="80" maxlength="80"/></p>
        <p>Enter Domain:<input name="domain" type="text" value="<?php echo $row['domain'];?>" size="80" maxlength="80"/></p>
        <p>Enter Description:<input name="description" type="text" value="<?php echo $row['description'];?>" size="80" maxlength="80"/></p>
        <p>Entry Body:<br>
          <div id="wysiwyg_cp" style="padding:8px; width:700px;">
            <input type="button" onClick="iBold()" value="B" class="myButton"> 
            <input type="button" onClick="iUnderline()" value="U" class="myButton">
            <input type="button" onClick="iItalic()" value="I" class="myButton">
            <input type="button" onClick="iFontSize()" value="Font Size" class="myButton">
            <input type="button" onClick="iFontColor()" value="Font Color" class="myButton">
            <input type="button" onClick="iHorizontalRule()" value="HR" class="myButton">
            <input type="button" onClick="iUnorderedList()" value="UL" class="myButton">
            <input type="button" onClick="iOrderedList()" value="OL" class="myButton">
            <input type="button" onClick="iLink()" value="Link" class="myButton">
            <input type="button" onClick="iUnLink()" value="UnLink" class="myButton">

          </div>
          <textarea style="display:none;" name="myTextArea" id="myTextArea" cols="100" rows="15"></textarea>
          <iframe name="richTextField" id="richTextField" src="<?php echo $path; ?>" style="border:#000DDD 1px solid;width:700px;height:300px;background-color:white"></iframe>
        </p>
        <br>
        <input name="myBtn" type="button" class="myB" value="Submit Data" onClick="javascript:submit_form();">
      </form>
    </body>
</html>
