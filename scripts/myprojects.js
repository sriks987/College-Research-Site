function showProject2(x,y)
{
 document.write("<div>");
 document.write("<h3>hello</h3>");
 document.write("<p>bye</p>");
 document.write("</div>");
}

function showProject(x,y)
{
 var z = document.createElement("div");
 var a = document.createElement("h3");
 a.textContent = x;
 var b = document.createElement("p");
 b.textContent = y;
 z.appendChild(a);
 z.appendChild(b);
 document.body.appendChild(z);
}


