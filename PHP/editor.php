<html>
    <head>
      <link rel="stylesheet" href="../CSS/editor.css">
      <script src="../scripts/editor.js">
      </script>
    </head>
    <body onLoad="iFrameOn()" style="background-color:#2E1020;">
      <form action="../PHP/editor_store.php" name="myform" id="myform" method="post">
        <p>Enter Title:<input name="title" type="text" size="80" maxlength="80"/></p>
        <p>Enter Domain:<input name="domain" type="text" size="80" maxlength="80"/></p>
        <p>Enter Description:<input name="description" type="text" size="80" maxlength="80"/></p>
        <p>Entry Body:<br>
          <div id="wysiwyg_cp" style="padding:8px; width:700px;">
            <input type="button" class="myButton" onClick="iBold()" value="B">
            <input type="button" class="myButton" onClick="iUnderline()" value="U">
            <input type="button" class="myButton" onClick="iItalic()" value="I">
            <input type="button" class="myButton" onClick="iFontSize()" value="Font Size">
            <input type="button" class="myButton" onClick="iFontColor()" value="Font Color">
            <input type="button" class="myButton" onClick="iHorizontalRule()" value="HR">
            <input type="button" class="myButton" onClick="iUnorderedList()" value="UL">
            <input type="button" class="myButton" onClick="iOrderedList()" value="OL">
            <input type="button" class="myButton" onClick="iLink()" value="Link">
            <input type="button" class="myButton" onClick="iUnLink()" value="UnLink">
          </div>
          <textarea style="display:none;" name="myTextArea" id="myTextArea" cols="100" rows="15" ></textarea>
          <iframe name="richTextField" id="richTextField" style="border:#000DDD 1px solid;width:700px;height:300px;background-color:white"></iframe>
        </p>
        <br>
        <input name="myBtn" type="button" class="myB" value="Submit Data" onClick="javascript:submit_form();">
      </form>
    </body>
</html>
