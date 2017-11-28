function iFrameOn()
{
    richTextField.document.designMode = 'On';

    //richTextField.document.innerHTML = x;
}
/*function iput(x)
{
    richTextField.document.body.innerHTML=x;
}*/
function iBold()
{
    richTextField.document.execCommand('bold',false,null);
}
function iUnderline()
{
    richTextField.document.execCommand('underline',false,null);
}
function iItalic()
{
    richTextField.document.execCommand('italic',false,null);
}
function iFontSize()
{
    var size = prompt('Enter a size 1 - 7', '');
    richTextField.document.execCommand('FontSize',false,size);
}
function iFontColor()
{
    var color = prompt('Define a basic color or apply a hexadecimal color code for advanced colors:', '');
    richTextField.document.execCommand('ForeColor',false,color);
}
function iHorizontalRule()
{
    richTextField.document.execCommand('inserthorizontalrule',false,null);
}
function iUnorderedList()
{
    richTextField.document.execCommand("InsertOrderedList", false,"newOL");
}
function iOrderedList()
{
    richTextField.document.execCommand("InsertUnorderedList", false,"newUL");
}
function iLink()
{
    var linkURL = prompt("Enter the URL for this link:", "http://");
    richTextField.document.execCommand("CreateLink", false, linkURL);
}
function iUnLink()
{
    richTextField.document.execCommand("Unlink", false, null);
}
function iImage()
{
    var imgSrc = prompt('Enter image location', '');
        richTextField.document.execCommand('insertimage', false, imgSrc);
}

function submit_form()
{
    var theForm = document.getElementById("myform");
    theForm.elements["myTextArea"].value = window.frames['richTextField'].document.body.innerHTML;
    theForm.submit();
}
